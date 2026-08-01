<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class CustomerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    // public function handle(Request $request, Closure $next): Response
    // {
    //     // If user not logged in
    //     if (!empty($request->get('i')) && Auth::check() != 1) {
    //         $payment_info = $request->get('i');

    //         if ($payment_info) {
    //             $payment_info = str_replace('...', '', $payment_info);

    //             $user = User::where('temp', 'LIKE', '%' . $payment_info . '%')->first();

    //             if ($user) {
    //                 $decoded = base64_decode($user->temp);
    //                 $payment_info = json_decode($decoded, true);

    //                 Auth::login($user);

    //                 session(['payment_details' => $payment_info[1]]);
    //             }
    //         }
    //     }

    //     $auth = auth()->user();

    //     if($auth && $auth->user_type == 'customer'){
    //         return $next($request);
    //     }elseif($auth){
    //         return redirect(route('home'));
    //     }else{
    //         return redirect(route('login'));
    //     }

    // }


   public function handle(Request $request, Closure $next): Response
{
    // Auto login from temp payment link
    if (!empty($request->get('i')) && !Auth::check()) {

        $payment_info = str_replace('...', '', $request->get('i'));

        $user = User::where('temp', 'LIKE', '%' . $payment_info . '%')->first();

        if ($user) {
            $decoded = base64_decode($user->temp);
            $payment_info = json_decode($decoded, true);

            Auth::login($user);

            session(['payment_details' => $payment_info[1]]);
        }
    }

    $auth = auth()->user();

    if (!$auth) {
        return redirect()->route('login');
    }
    if ($auth->user_type != 'customer') {
        return redirect()->route('home');
    }
    // Email verification check enabled?
    if (get_settings('signup_email_verification') == 1) {
        if (!$auth->email_verified_at) {
            return redirect()->route('verification.notice');
        }
    }
    return $next($request);
}



}
