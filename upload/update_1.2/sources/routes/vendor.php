<?php

use App\Http\Controllers\Vendor\{VendorController};
use App\Http\Controllers\Vendor\{PayoutController};
use App\Http\Controllers\{Updater};
use App\Http\Middleware\IsVendor;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//
Route::prefix('vendor/')->name('vendor.')->middleware(['auth', IsVendor::class])->controller(VendorController::class)->group(function () {

    // Dashboard
    Route::get('dashboard', 'dashboard')->name('dashboard');

    // Product
    Route::get('products', 'products')->name('products');
    Route::get('product/add', 'product_add')->name('product.add');
    Route::post('product/store/{action_type}', 'product_store')->name('product.store');
    Route::get('product/edit/{id}', 'product_edit')->name('product.edit');
    Route::post('product/update/{id}', 'product_update')->name('product.update');
    Route::get('product/delete/{id}', 'product_delete')->name('product.delete');
    Route::get('product-image-delete/{id}/{image}', 'product_image_delete')->name('product.image.delete');

    Route::get('product_attribute/delete/{attribute_type_id}/{product_id}', 'product_attribute_delete')->name('product_attribute.delete');

    // Order
    Route::get('orders', 'orders')->name('orders');
    Route::get('order/add', 'order_add')->name('order.add');
    Route::post('order/store', 'order_store')->name('order.store');
    Route::get('order/edit/{id}', 'order_edit')->name('order.edit');
    Route::get('order/details/{id}', 'order_details')->name('order.details');
    Route::post('order/update/{id}', 'order_update')->name('order.update');
    Route::post('order/timeline_update/{id}', 'order_timeline_update')->name('order.timeline_update');
    Route::get('order/timeline/remove/{id}', 'order_timeline_remove')->name('order.timeline_remove');
    Route::get('order/delete/{id}', 'order_delete')->name('order.delete');

    Route::get('order/return-requests', 'order_return_requests')->name('order.return_requests');
    Route::get('order/return-details/{id}', 'order_return_details')->name('order.return_details');
    Route::post('order/return-refund/{id}', 'order_return_refund')->name('order.return.refund');
    Route::get('order/return-request/cancel/{id}', 'order_return_request_cancel')->name('order.return.cancel');

    Route::get('order/invoice/{id}', 'download_invoice')->name('order.invoice');
 
    // Coupon
    Route::get('coupons', 'coupons')->name('coupons');
    Route::get('coupon/add', 'coupon_add')->name('coupon.add');
    Route::post('coupon/store', 'coupon_store')->name('coupon.store');
    Route::get('coupon/edit/{id}', 'coupon_edit')->name('coupon.edit');
    Route::post('coupon/update/{id}', 'coupon_update')->name('coupon.update');
    Route::get('coupon/delete/{id}', 'coupon_delete')->name('coupon.delete');

    // Message
    Route::get('messages/{thread_id?}', 'messages')->name('messages');
    Route::post('message/store', 'message_store')->name('message.store');
    Route::post('message/thread/store', 'message_thread_store')->name('message.thread.store');

    //Payments
    Route::get('payments', 'payments')->name('payments');
    Route::post('payment/store', 'payment_store')->name('payment.store');
    Route::get('payment/delete/{id}', 'payment_delete')->name('payment.delete');
    Route::get('payment/invoice/{id}', 'payment_invoice')->name('payment.invoice');
    Route::get('payments/offline-request', 'payments_offline_request')->name('payments.offline_request');
    Route::get('payment/offline/status-update/{id}', 'payment_offline_status')->name('payment.offline_status');

    // System Settings
    Route::get('vendor/settings', 'vendor_settings')->name('settings');
    Route::post('vendor/settings/update/{id}', 'vendor_settings_update')->name('settings.update');
    Route::get('vendor/profile', 'profile_settings')->name('profile');
    Route::post('vendor/profile/update', 'profile_settings_update')->name('profile.update');

    // payout route
      


});

Route::prefix('vendor/')->name('vendor.')->middleware(['auth', IsVendor::class])->controller(PayoutController::class)->group(function () {

        // payout route
      Route::get('payout-reports', 'payout_reports')->name('payout.reports');
      Route::post('payout/request', 'payout_reports_store')->name('payout.request');
      Route::get('payout/request/delete/{id}', 'payout_delete')->name('payout.delete');

      Route::get('payout-reports/withdrawal', 'payout_withdrawal')->name('payout.reports.withdrawal');

      Route::get('payout_setting', 'payout_setting')->name('payout.setting');
     Route::post('payout_setting/store', 'payout_setting_store')->name('payout.setting.store');


});