<?php

use App\Http\Controllers\Customer\{CustomerController, BecomeVendorController, PaymentController, OrderController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
|
| Here you can write any type of frontend customer related routes.
|
*/



//
Route::prefix('customer/')->name('customer.')->middleware(['auth','verified'])->controller(CustomerController::class)->group(function () {

    // Profile
    Route::get('profile', 'profile')->name('profile');
    Route::post('profile/update', 'profile_update')->name('profile.update');

    // Profile
    Route::get('shipping-addresses', 'shipping_addresses')->name('shipping_addresses');
    Route::post('shipping-address/store', 'shipping_address_store')->name('shipping_address.store');
    Route::post('shipping-address/update/{id}', 'shipping_address_update')->name('shipping_address.update');
    Route::get('shipping-address/primary/{id}', 'shipping_address_primary')->name('shipping_address.primary');
    Route::get('shipping-address/delete/{id}', 'shipping_address_delete')->name('shipping_address.delete');

    // Account
    Route::get('account', 'account')->name('account');
    Route::post('account/update', 'account_update')->name('account.update');
    
    // Product wishlist
    Route::get('wishlist-items', 'wishlist_items')->name('wishlist_items');
    Route::any('wishlist_item/update/{product_id}', 'wishlist_item_update')->name('wishlist_item.update');
    Route::get('wishlist_item/delete/{product_id}', 'wishlist_item_delete')->name('wishlist_item.delete');

    // Product cart
    Route::get('cart-items', 'cart_items')->name('cart_items');
    Route::post('cart_item/store/{product_id}', 'cart_item_store')->name('cart_item.store');
    Route::post('cart_item/update/{product_id}', 'cart_item_update')->name('cart_item.update');
    Route::post('cart_item_quantity/update/{cart_item_id}/{sign}', 'cart_item_quantity_update')->name('cart_item_quantity.update');
    Route::get('cart_item/delete/{product_id}', 'cart_item_delete')->name('cart_item.delete');

    // Product buy now
    Route::post('buy-now/{product_id}', 'buy_now')->name('buy_now');

    // Coupon
    Route::post('coupon-applied', 'coupon_applied')->name('coupon.applied');



    // Product review
    Route::post('product-review/store', 'product_review_store')->name('product.review.store');
    Route::post('product-review/update/{review_id}', 'product_review_update')->name('product.review.update');
    Route::get('product-review/helpful', 'product_review_helpful')->name('product.review.helpful');

    // Payments
    Route::get('payments', 'payments')->name('payments');
    Route::get('payment/invoice/{payment_id}', 'payment_invoice')->name('payment.invoice');

    // Orders
    Route::get('orders', 'orders')->name('orders');
    Route::get('order/{order_id}', 'order')->name('order');
    Route::post('orders/cancel-request/{order_id}', 'order_cancel_request')->name('order.cancel_request');

    // Messages
    Route::get('/messages/{id?}/{thread_id?}', 'user_messages')->name('messages');
    Route::post('/message-send/{thread_id?}', 'send_message')->name('message.send');
});


//Payment
Route::controller(PaymentController::class)->middleware([ 'auth'])->group(function () { 
    Route::get('proceed-to-checkout', 'proceed_to_checkout')->name('proceed.to.checkout');
    Route::get('payment', 'payment')->name('payment');
    Route::any('payment/create/{identifier}', 'payment_create')->name('payment.create');
    Route::any('payment/success/{identifier?}', 'payment_success')->name('payment.success');
    Route::get('payment/set_shipping_address/{shipping_address_id?}', 'set_shipping_address')->name('payment.set_shipping_address');
    Route::any('payment/notify/{identifier}', 'payment_success')->name('payment.notify');

    // paytm pay
    Route::post('payment/make/order/paytm', 'payment_paytm')->name('make.order');
    Route::get('payment/make/paytm/status', 'paytm_paymentCallback')->name('payment.status');

    // razor pay
    Route::post('payment/{identifier}/order', 'payment_razorpay')->name('razorpay.order');
});

Route::prefix('customer/')->name('customer.')->middleware(['auth'])->controller(OrderController::class)->group(function () {
    Route::get('order-return/requests', 'order_return_requests')->name('order.return_requests');
    Route::get('order-return/details/{id}', 'order_return_details')->name('order.return_details');
});

// become instructor
Route::prefix('customer/')->name('customer.')->middleware(['auth'])->controller(BecomeVendorController::class)->group(function () {
    Route::get('/become-vendor', 'index')->name('become.vendor');
    Route::post('/become-vendor/store', 'store')->name('become.vendor.store');
});