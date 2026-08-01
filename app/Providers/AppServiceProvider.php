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
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        if (config('app.url')) {
            \Illuminate\Support\Facades\URL::forceRootUrl(config('app.url'));
            if (str_starts_with(config('app.url'), 'https://')) {
                \Illuminate\Support\Facades\URL::forceScheme('https');
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
