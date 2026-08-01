<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Session;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        $message = get_phrase('Welcome back ____');
        $message = str_replace('____', user('name'), $message);
        Session::flash('success', $message);

        if (auth()->user()->user_type == 'admin') {
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } else {
            return redirect()->intended(route('home', absolute: false));
        }
    }

    /**
     * Display the admin login view.
     */
    public function admin_login_create(): View
    {
        return view('auth.admin_login');
    }

    /**
     * Handle an incoming admin authentication request.
     */
    public function admin_login_store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        $user = auth()->user();

        if ($user->user_type == 'admin') {
            $message = get_phrase('Welcome back ____');
            $message = str_replace('____', $user->name, $message);
            Session::flash('success', $message);
            return redirect()->intended(route('admin.dashboard', absolute: false));
        } else {
            Auth::guard('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect(route('admin.login'))->withErrors([
                'email' => 'Access Denied: You do not have admin privileges.'
            ]);
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function send_otp(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $phone = $request->phone;
        $cleanPhone = preg_replace('/[^\d+]/', '', $phone);
        if (!\Illuminate\Support\Str::startsWith($cleanPhone, '+')) {
            $cleanPhone = '+91' . preg_replace('/[^\d]/', '', $phone); // Default prefix
        }

        $otp = rand(100000, 999999);

        // Store OTP in session
        Session::put('otp_code', $otp);
        Session::put('otp_phone', $cleanPhone);
        Session::put('otp_expiry', time() + 300); // 5 mins expiry

        $gateway = get_settings('sms_gateway') ?? 'mock';

        if ($gateway == 'custom') {
            $apiUrl = get_settings('custom_sms_url');
            if ($apiUrl) {
                // Remove leading + for phone parameter in case SMS provider doesn't support + prefix
                $rawNumber = preg_replace('/[^\d]/', '', $cleanPhone);
                
                // Replace placeholders
                $url = str_replace(['PHONE', 'OTP'], [$rawNumber, $otp], $apiUrl);
                
                try {
                    \Illuminate\Support\Facades\Http::get($url);
                } catch (\Exception $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'SMS Gateway Error: ' . $e->getMessage()
                    ]);
                }
            }
        }

        if ($gateway == 'whatsapp') {
            $apiUrl = get_settings('whatsapp_api_url');
            $instance = get_settings('whatsapp_instance');
            $apiKey = get_settings('whatsapp_api_key');

            if ($apiUrl && $instance) {
                $rawNumber = preg_replace('/[^\d]/', '', $cleanPhone);
                $postUrl = rtrim($apiUrl, '/') . '/message/sendText/' . $instance;
                $messageText = "Your verification code is " . $otp;

                try {
                    \Illuminate\Support\Facades\Http::withHeaders([
                        'apikey' => $apiKey,
                        'Content-Type' => 'application/json'
                    ])->post($postUrl, [
                        'number' => $rawNumber,
                        'options' => [
                            'delay' => 1200,
                            'presence' => 'composing',
                            'linkPreview' => false
                        ],
                        'textMessage' => [
                            'text' => $messageText
                        ]
                    ]);
                } catch (\Exception $e) {
                    return response()->json([
                        'status' => false,
                        'message' => 'WhatsApp Gateway Error: ' . $e->getMessage()
                    ]);
                }
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'OTP sent successfully!'
        ]);
    }

    public function login_with_otp(Request $request)
    {
        $request->validate([
            'phone' => 'required'
        ]);

        $phone = $request->phone;
        $cleanPhone = preg_replace('/[^\d+]/', '', $phone);
        if (!\Illuminate\Support\Str::startsWith($cleanPhone, '+')) {
            $cleanPhone = '+91' . preg_replace('/[^\d]/', '', $phone);
        }

        $gateway = get_settings('sms_gateway') ?? 'mock';

        if ($gateway == 'custom' || $gateway == 'mock') {
            $request->validate([
                'otp_code' => 'required'
            ]);

            $sessionOtp = Session::get('otp_code');
            $sessionPhone = Session::get('otp_phone');
            $sessionExpiry = Session::get('otp_expiry');

            if ($gateway == 'mock' && $request->otp_code == '123456') {
                // Allow bypass
            } else {
                if (!$sessionOtp || $sessionPhone != $cleanPhone || time() > $sessionExpiry || $request->otp_code != $sessionOtp) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Invalid or expired verification code!'
                    ]);
                }
            }

            // Clear session OTP
            Session::forget(['otp_code', 'otp_phone', 'otp_expiry']);
        }

        // Find user by phone number
        $user = \App\Models\User::where('phone', $cleanPhone)->first();

        if (!$user) {
            // Check if there is a user with default email matching this phone
            $defaultEmail = $cleanPhone . '@convoc.com';
            $user = \App\Models\User::where('email', $defaultEmail)->first();
        }

        if (!$user) {
            // Auto register a new customer user
            $user = \App\Models\User::create([
                'name' => 'User ' . substr($cleanPhone, -4),
                'email' => $cleanPhone . '@convoc.com',
                'phone' => $cleanPhone,
                'user_type' => 'customer',
                'status' => 1,
                'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(16)),
                'email_verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
            ]);
        }

        Auth::login($user, true);
        $request->session()->regenerate();

        $message = get_phrase('Welcome back ____');
        $message = str_replace('____', $user->name, $message);
        Session::flash('success', $message);

        return response()->json([
            'status' => true,
            'redirect' => route('home')
        ]);
    }
}
