<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Session;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     if(User::first()){
    //         $data['user_type'] = 'customer';
    //     }else{
    //         $data['user_type'] = 'admin';
    //         $data['email_verified_at'] = date('Y-m-d H:i:s');
    //     }

    //     $data['name'] = $request->name;
    //     $data['email'] = $request->email;
    //     $data['password'] = Hash::make($request->password);
    //     $data['status'] = 1;

    //     $user = User::create($data);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     return redirect(route('dashboard', absolute: false));
    // }
    public function store(Request $request): RedirectResponse
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);

            // Set user type
            if(User::first()){
                $data['user_type'] = 'customer';
            } else {
                $data['user_type'] = 'admin';
                $data['email_verified_at'] = now();
            }

            // User data
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password);
            $data['status'] = 1;

            // Create user FIRST (you forgot this!)
            $user = User::create($data);

            // Email verification check
            if (get_settings('signup_email_verification') == 1) {
                event(new Registered($user));  // send verify email
                Auth::login($user);
                Session::flash('success', get_phrase('Registered successfully!'));
                return redirect(route('verification.notice'));

            } else {
                // Auto verify email
                $user->email_verified_at = now();
                $user->save();
                Session::flash('success', get_phrase('Registered successfully!'));
                return redirect(route('login'));
            }
        }

}
