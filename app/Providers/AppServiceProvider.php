<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * PERMANENT FIX for Cloudflare Tunnel / reverse-proxy asset URL generation:
     *
     * Problem: artisan serve sets SERVER_NAME=127.0.0.1, so request()->getHost()
     * always returns "127.0.0.1" even when the real HTTP_HOST is a public tunnel
     * domain. This causes asset() to generate http://localhost:8000/... URLs which
     * the browser blocks as mixed-content when the page is served over HTTPS.
     *
     * Fix: Read HTTP_HOST and HTTP_X_FORWARDED_PROTO directly from $_SERVER,
     * which always contains the correct values passed by Cloudflare Tunnel.
     * This works for ANY tunnel URL without hardcoding anything.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if (!app()->runningInConsole()) {
            // Read directly from $_SERVER — not request()->getHost() which uses
            // SERVER_NAME (always 127.0.0.1 under artisan serve + Cloudflare Tunnel)
            $httpHost      = $_SERVER['HTTP_HOST'] ?? null;
            $forwardedProto = $_SERVER['HTTP_X_FORWARDED_PROTO'] ?? null;

            if ($httpHost && $forwardedProto) {
                // Cloudflare Tunnel / any reverse proxy: use forwarded scheme + HTTP_HOST
                // Handles: trycloudflare.com, custom domains, any future tunnel URL
                $rootUrl = rtrim($forwardedProto, '/') . '://' . $httpHost;
                \Illuminate\Support\Facades\URL::forceRootUrl($rootUrl);
                if ($forwardedProto === 'https') {
                    \Illuminate\Support\Facades\URL::forceScheme('https');
                }
            } elseif ($httpHost && $httpHost !== '127.0.0.1' && $httpHost !== 'localhost'
                && !str_starts_with($httpHost, '127.')
                && !str_starts_with($httpHost, 'localhost:')) {
                // Direct public access without forwarding headers (e.g. staging server or public tunnel)
                // Always force HTTPS to ensure assets load properly over HTTPS tunnels
                $scheme = 'https';
                $rootUrl = 'https://' . $httpHost;
                \Illuminate\Support\Facades\URL::forceRootUrl($rootUrl);
                \Illuminate\Support\Facades\URL::forceScheme('https');
            } else {
                // Local development fallback — use APP_URL from .env
                $appUrl = config('app.url', 'http://localhost:8000');
                \Illuminate\Support\Facades\URL::forceRootUrl($appUrl);
                if (str_starts_with($appUrl, 'https://')) {
                    \Illuminate\Support\Facades\URL::forceScheme('https');
                }
            }
        }

        view()->composer('*', function ($view) {
            static $categories = null;
            if ($categories === null) {
                try {
                    if (\Illuminate\Support\Facades\Schema::hasTable('categories')) {
                        $categories = \App\Models\Category::where('parent_id', '=', 0)
                            ->orderBy('sort', 'asc')
                            ->orderBy('title', 'asc')
                            ->get();
                    } else {
                        $categories = collect();
                    }
                } catch (\Exception $e) {
                    $categories = collect();
                }
            }
            $view->with('categories', $categories);
        });
    }
}
