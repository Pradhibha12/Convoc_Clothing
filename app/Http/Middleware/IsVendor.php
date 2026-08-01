<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsVendor
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_vendor == 1) {
            return $next($request);
        }

        abort(403, 'Unauthorized access. Vendors only.');
    }
}
