<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\WebConfig;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CustomerMiddleware;
use App\Http\Middleware\PreventBackHistory;
use App\Http\Middleware\IsVendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        commands: __DIR__ . '/../routes/console.php',
        api: __DIR__.'/../routes/api.php',
        health: '/up',
        then: function () {
            // Check database connection
            try {
                DB::connection()->getPdo();
                $dbConnected = true;
            } catch (\Exception $e) {
                $dbConnected = false;
            }

            if ($dbConnected) {
                // Normal app routes (protected by web middleware)
                
                Route::middleware(['web','PreventBackHistory'])
                    ->group(base_path('routes/web.php'))
                    ->group(base_path('routes/admin.php'))
                    ->group(base_path('routes/customer.php'))
                    ->group(base_path('routes/vendor.php'))
                    ->group(base_path('routes/frontend.php'));
            } else {
                // Installation routes only (NO middleware)
                Route::middleware(['web'])->group(function () {
                    require base_path('routes/web.php');
                });
            }
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->trustProxies(at: '*');

        $middleware->append(WebConfig::class);

        $middleware->redirectGuestsTo(fn (\Illuminate\Http\Request $request) => 
            $request->is('admin') || $request->is('admin/*') ? route('admin.login') : route('login')
        );

        $middleware->alias([
            'admin' => AdminMiddleware::class,
            'customer' => CustomerMiddleware::class,
            'vendor' => IsVendor::class,
            'PreventBackHistory' => PreventBackHistory::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
