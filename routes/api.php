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