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
    set_time_limit(300);

    // 1. Get raw PDO connections
    try {
        $sqlitePdo = \Illuminate\Support\Facades\DB::connection('sqlite')->getPdo();
        $pgsqlPdo  = \Illuminate\Support\Facades\DB::connection('pgsql')->getPdo();
    } catch (\Exception $e) {
        return 'Connection failed: ' . $e->getMessage();
    }

    // 2. Rollback any open transaction on pgsql
    try { $pgsqlPdo->exec('ROLLBACK'); } catch (\Exception $e) {}

    // 3. Drop all existing tables using CASCADE (raw PDO, no transactions)
    $tablesResult = $pgsqlPdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema='public'");
    $tables = $tablesResult->fetchAll(PDO::FETCH_COLUMN);
    foreach ($tables as $table) {
        $pgsqlPdo->exec("DROP TABLE IF EXISTS \"{$table}\" CASCADE");
    }

    // 4. Run migrations using Artisan (creates fresh schema)
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--database' => 'pgsql', '--force' => true]);
    } catch (\Exception $ex) {
        return 'Migration failed: ' . $ex->getMessage() . "\n\nOutput:\n" . \Illuminate\Support\Facades\Artisan::output();
    }

    // 5. Sync data from SQLite to PostgreSQL in dependency order
    $orderedTables = [
        'users', 'brands', 'categories', 'attribute_types', 'stores', 'languages', 'pages',
        'blog_categories', 'coupons', 'shipping_carriers', 'shipping_zones', 'cities',
        'countries', 'states', 'contacts', 'applications', 'currencies', 'frontend_settings',
        'settings', 'themes',
        'attributes', 'attribute_type_category', 'language_phrases', 'theme_settings',
        'store_settings', 'products', 'shipping_zone_regions', 'blogs', 'message_threads',
        'product_attributes', 'reviews', 'wishlist_items', 'cart_items', 'blog_comments',
        'messages', 'shipping_rules', 'orders',
        'order_items', 'order_updates', 'order_returns', 'payments',
        'payouts'
    ];

    $logOutput = "Sync log:\n";
    foreach ($orderedTables as $table) {
        // Check table exists in SQLite
        $check = $sqlitePdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='{$table}'")->fetch();
        if (!$check) continue;

        $rows = $sqlitePdo->query("SELECT * FROM \"{$table}\"")->fetchAll(PDO::FETCH_ASSOC);
        if (empty($rows)) continue;

        // Build insert SQL for PostgreSQL
        $cols = array_keys($rows[0]);
        $colList = implode(', ', array_map(fn($c) => "\"{$c}\"", $cols));
        $placeholders = implode(', ', array_fill(0, count($cols), '?'));
        $sql = "INSERT INTO \"{$table}\" ({$colList}) VALUES ({$placeholders}) ON CONFLICT DO NOTHING";
        $stmt = $pgsqlPdo->prepare($sql);

        $count = 0;
        foreach ($rows as $row) {
            try {
                $stmt->execute(array_values($row));
                $count++;
            } catch (\Exception $ex) {
                $logOutput .= "  [WARN] Row insert failed in '{$table}': " . $ex->getMessage() . "\n";
            }
        }
        $logOutput .= "- Synced table '{$table}' ({$count} rows)\n";
    }

    return nl2br($logOutput . "\nDatabase synchronization completed successfully!");
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