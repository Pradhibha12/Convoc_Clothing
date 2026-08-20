<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\InstallController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/dashboard', function () {
    if(auth()->user() && auth()->user()->user_type == 'admin'){
        return redirect(route('admin.dashboard'));
    }elseif(auth()->user()->user_type == 'customer'){
        return redirect(route('products'));
    }
})->name('dashboard');

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    \Illuminate\Support\Facades\Artisan::call('config:clear');
    \Illuminate\Support\Facades\Artisan::call('route:clear');
    \Illuminate\Support\Facades\Artisan::call('view:clear');
    return 'Application cache cleared';
});

Route::get('/recover-db', function () {
    try {
        $sqlite = \Illuminate\Support\Facades\DB::connection('sqlite');
        $pgsql = \Illuminate\Support\Facades\DB::connection('pgsql');
        $pgsql->getPdo();
    } catch (\Exception $e) {
        return 'Connection check failed: ' . $e->getMessage() . '. Please verify Render environment variables (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD) are set correctly.';
    }

    try {
        $sqlite->statement('PRAGMA foreign_keys = OFF');
        $tables = $sqlite->select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");
        foreach ($tables as $table) {
            $sqlite->statement("DROP TABLE IF EXISTS \"{$table->name}\"");
        }

        \Illuminate\Support\Facades\Artisan::call('migrate', ['--database' => 'sqlite', '--force' => true]);

        $pgsqlTables = $pgsql->select("SELECT table_name FROM information_schema.tables WHERE table_schema='public'");
        foreach ($pgsqlTables as $tableObj) {
            $tableName = $tableObj->table_name;
            if ($tableName === 'migrations') {
                continue;
            }

            $rows = $pgsql->table($tableName)->get();
            if ($rows->isEmpty()) {
                continue;
            }

            $insertData = [];
            foreach ($rows as $row) {
                $insertData[] = (array)$row;
            }

            $chunks = array_chunk($insertData, 100);
            foreach ($chunks as $chunk) {
                $sqlite->table($tableName)->insert($chunk);
            }
        }

        $sqlite->statement('PRAGMA foreign_keys = ON');

        return response()->download(database_path('database.sqlite'), 'database.sqlite');
    } catch (\Exception $e) {
        return 'Error during recovery: ' . $e->getMessage();
    }
});

Route::get('/sync-sqlite-to-pgsql', function () {
    try {
        $sqlite = \Illuminate\Support\Facades\DB::connection('sqlite');
        $pgsql = \Illuminate\Support\Facades\DB::connection('pgsql');
        $pgsql->getPdo();
    } catch (\Exception $e) {
        return 'PostgreSQL connection check failed: ' . $e->getMessage();
    }

    try {
        echo "Wiping and migrating PostgreSQL database...\n";
        \Illuminate\Support\Facades\Artisan::call('migrate:fresh', ['--database' => 'pgsql', '--force' => true]);

        // Dependency ordered tables list
        $orderedTables = [
            // Tier 1 (no dependencies)
            'users', 'brands', 'categories', 'attribute_types', 'stores', 'languages', 'pages', 
            'blog_categories', 'coupons', 'shipping_carriers', 'shipping_zones', 'cities', 
            'countries', 'states', 'contacts', 'applications', 'currencies', 'frontend_settings', 
            'settings', 'themes',
            
            // Tier 2 (depends on Tier 1)
            'attributes', 'attribute_type_category', 'language_phrases', 'theme_settings', 
            'store_settings', 'products', 'shipping_zone_regions', 'blogs', 'message_threads',
            
            // Tier 3 (depends on Tier 2)
            'product_attributes', 'reviews', 'wishlist_items', 'cart_items', 'blog_comments', 
            'messages', 'shipping_rules', 'orders',
            
            // Tier 4 (depends on Tier 3)
            'order_items', 'order_updates', 'order_returns', 'payments',
            
            // Tier 5 (depends on Tier 4)
            'payouts'
        ];

        $logOutput = "Sync log:\n";
        foreach ($orderedTables as $table) {
            // Check if table exists in SQLite
            $tableExists = $sqlite->select("SELECT name FROM sqlite_master WHERE type='table' AND name = ?", [$table]);
            if (empty($tableExists)) {
                continue;
            }

            $rows = $sqlite->table($table)->get();
            if ($rows->isEmpty()) {
                continue;
            }

            $insertData = [];
            foreach ($rows as $row) {
                $insertData[] = (array)$row;
            }

            $chunks = array_chunk($insertData, 50);
            foreach ($chunks as $chunk) {
                $pgsql->table($table)->insert($chunk);
            }
            $logOutput .= "- Synced table '{$table}' (" . count($insertData) . " rows)\n";
        }

        return nl2br($logOutput . "\nDatabase synchronization completed successfully! All products copied to PostgreSQL.");
    } catch (\Exception $e) {
        return 'Error during sync: ' . $e->getMessage() . ' at line ' . $e->getLine();
    }
});

Route::get('/logout', function (Request $request) {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect(route('home'));
});
//Common Modal
Route::get('modal/{view_path}', [ModalController::class, 'common_view_function'])->name('modal'); 

Route::get('page/{slug}', [CommonController::class, 'page'])->name('page');
Route::get('view/{path}', [CommonController::class, 'rendered_view'])->name('view');

require __DIR__.'/auth.php';

//Installation routes
Route::controller(InstallController::class)->group(function () {
    Route::get('/install_ended', 'index')->name('install');
    Route::get('install/step0', 'step0')->name('step0');
    Route::get('install/step1', 'step1')->name('step1');
    Route::get('install/step2', 'step2')->name('step2');
    Route::any('install/step3', 'step3')->name('step3');
    Route::get('install/step4', 'step4')->name('step4');
    Route::get('install/step4/{confirm_import}', 'confirmImport')->name('step4.confirm_import');
    Route::get('install/step5', 'step5')->name('step5');
    Route::get('install/install', 'confirmInstall')->name('confirm_install');
    Route::post('install/validate', 'validatePurchaseCode')->name('install.validate');
    Route::any('install/finalizing_setup', 'finalizingSetup')->name('finalizing_setup');
    Route::get('install/success', 'success')->name('success');
});
//Installation routes