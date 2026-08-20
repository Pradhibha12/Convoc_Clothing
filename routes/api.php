<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [ApiController::class, 'login']);
Route::post('/signup', [ApiController::class, 'signup']);
Route::post('/forgot_password', [ApiController::class, 'forgot_password']);

Route::get('/test/{id}', [ApiController::class, 'test']);
Route::get('/home', [ApiController::class, 'home']);
Route::get('/all-products', [ApiController::class, 'all_products']);
Route::get('/featured-products', [ApiController::class, 'featured_products']);
Route::get('/filters', [ApiController::class, 'get_filters']);
Route::get('/find-products', [ApiController::class, 'find_products']);
Route::get('/product-details/{id}', [ApiController::class, 'productDetails']);
Route::get('/faqs', [ApiController::class, 'get_faq']);

Route::group(['middleware', ['auth:sanctum']], function () {

    Route::get('/user-details', [ApiController::class, 'userDetails']);
    Route::post('/profile-update', [ApiController::class, 'profileUpdate']);

    Route::get('/my-wishlist', [ApiController::class, 'my_wishlist']);
    Route::get('/toggle-wishlist-items', [ApiController::class, 'toggle_wishlist_items']);

    Route::get('/my-orders', [ApiController::class, 'my_orders']);
    Route::get('/my-order-details/{id}', [ApiController::class, 'my_order_details']);
    Route::get('/order/track/{order_id}', [ApiController::class, 'track_order']);

    Route::post('/update_password', [ApiController::class, 'update_password']);

    Route::get('/review/product', [ApiController::class, 'review_product']);
    Route::post('/submit_review', [ApiController::class, 'submit_review']);

    Route::post('/cart/add', [ApiController::class, 'add_to_cart']);
    Route::get('/my_cart', [ApiController::class, 'my_cart']);

    Route::get('/shipping_addresses', [ApiController::class, 'shipping_addresses']);
    Route::post('/mark_as_primary_address/{id}', [ApiController::class, 'mark_as_primary_address']);

    Route::get('/payment_history', [ApiController::class, 'payment_history']);
    Route::get('/payment_invoice', [ApiController::class, 'payment_invoice']);

    Route::post('/buy_now', [ApiController::class, 'buy_now']);
    Route::get('/order_summary', [ApiController::class, 'order_summary']);
    Route::post('/checkout', [ApiController::class, 'checkout']);
});

// ─── DB Utility Routes (no session middleware) ───────────────────────────────

Route::get('/debug', function () {
    return response()->json([
        'php'            => PHP_VERSION,
        'session_driver' => config('session.driver'),
        'db_connection'  => config('database.default'),
        'db_host'        => config('database.connections.pgsql.host'),
        'db_name'        => config('database.connections.pgsql.database'),
        'app_env'        => config('app.env'),
    ]);
});

Route::withoutMiddleware(['throttle:api'])->get('/run-migrate', function () {
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--database' => 'pgsql', '--force' => true]);
        return response()->json(['status' => 'ok', 'output' => \Illuminate\Support\Facades\Artisan::output()]);
    } catch (\Throwable $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage(), 'output' => \Illuminate\Support\Facades\Artisan::output()]);
    }
});

Route::withoutMiddleware(['throttle:api'])->get('/sync-db', function () {
    try {
        set_time_limit(300);
        $sqlitePdo = \Illuminate\Support\Facades\DB::connection('sqlite')->getPdo();
        $pgsqlPdo  = \Illuminate\Support\Facades\DB::connection('pgsql')->getPdo();

        try { $pgsqlPdo->exec('ROLLBACK'); } catch (\Throwable $e) {}

        $tablesResult = $pgsqlPdo->query("SELECT table_name FROM information_schema.tables WHERE table_schema='public'");
        $tables = $tablesResult->fetchAll(PDO::FETCH_COLUMN);
        foreach ($tables as $table) {
            try { $pgsqlPdo->exec("DROP TABLE IF EXISTS \"{$table}\" CASCADE"); } catch (\Throwable $e) {}
        }

        $artisanOutput = '';
        try {
            \Illuminate\Support\Facades\Artisan::call('migrate', ['--database' => 'pgsql', '--force' => true]);
            $artisanOutput = \Illuminate\Support\Facades\Artisan::output();
        } catch (\Throwable $ex) {
            return response()->json(['status' => 'migration_failed', 'message' => $ex->getMessage(), 'output' => \Illuminate\Support\Facades\Artisan::output()]);
        }

        $check = $pgsqlPdo->query("SELECT to_regclass('public.users')")->fetchColumn();
        if (!$check) {
            return response()->json(['status' => 'migration_incomplete', 'output' => $artisanOutput]);
        }

        $orderedTables = [
            'users','brands','categories','attribute_types','stores','languages','pages',
            'blog_categories','coupons','shipping_carriers','shipping_zones','cities',
            'countries','states','contacts','applications','currencies','frontend_settings',
            'settings','themes','attributes','attribute_type_category','language_phrases',
            'theme_settings','store_settings','products','shipping_zone_regions','blogs',
            'message_threads','product_attributes','reviews','wishlist_items','cart_items',
            'blog_comments','messages','shipping_rules','orders','order_items','order_updates',
            'order_returns','payments','payouts'
        ];

        $syncLog = [];
        foreach ($orderedTables as $table) {
            $chk = $sqlitePdo->query("SELECT name FROM sqlite_master WHERE type='table' AND name='{$table}'")->fetch();
            if (!$chk) continue;
            $rows = $sqlitePdo->query("SELECT * FROM \"{$table}\"")->fetchAll(PDO::FETCH_ASSOC);
            if (empty($rows)) { $syncLog[$table] = '0 rows'; continue; }
            $cols = array_keys($rows[0]);
            $colList = implode(', ', array_map(fn($c) => "\"{$c}\"", $cols));
            $placeholders = implode(', ', array_fill(0, count($cols), '?'));
            $stmt = $pgsqlPdo->prepare("INSERT INTO \"{$table}\" ({$colList}) VALUES ({$placeholders}) ON CONFLICT DO NOTHING");
            $count = 0; $errors = [];
            foreach ($rows as $row) {
                try { $stmt->execute(array_values($row)); $count++; }
                catch (\Throwable $ex) { $errors[] = substr($ex->getMessage(), 0, 100); }
            }
            $syncLog[$table] = "{$count} rows" . (count($errors) ? ", " . count($errors) . " errors: " . implode('; ', array_slice($errors, 0, 2)) : "");
        }

        return response()->json(['status' => 'success', 'migration' => $artisanOutput, 'sync' => $syncLog]);

    } catch (\Throwable $e) {
        return response()->json(['status' => 'fatal', 'message' => $e->getMessage(), 'file' => $e->getFile(), 'line' => $e->getLine()]);
    }
});