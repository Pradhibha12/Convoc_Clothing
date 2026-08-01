<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $auth = auth()->user();
        if($auth && $auth->user_type == 'admin'){
            return $next($request);
        }elseif($auth){
            return redirect(route('dashboard'));
        }else{
            return redirect(route('admin.login'));
        }
    }
}
