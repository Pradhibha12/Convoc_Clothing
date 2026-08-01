<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\Frontend\{ContactUsController, HomeController, ProductController, ProductsController, NewsletterController, BlogController, EventController, StoreController};
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Frontend Routes
|--------------------------------------------------------------------------
|
| Here you can write any type of frontend related routes.
|
*/


// Home
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/customer-feedback', 'customer_feedback')->name('customer_feedback');
    Route::get('/switch-language', 'switch_language')->name('home.switch_language');

    Route::get('/track-order', 'track_order')->name('order.track');
    Route::get('/track_order', 'track_order');
    Route::get('/zipcode-lookup/{zip_code}', 'zipcode_lookup')->name('zipcode.lookup');
    Route::post('/wishlist/toggle', 'wishlist_toggle')->name('wishlist.toggle');
});

// Product details
Route::controller(ProductController::class)->group(function () {
    Route::get('product/{slug}', 'index')->name('product');
});

Route::controller(BlogController::class)->group(function () {
    Route::get('/blog', 'index')->name('blog');
    Route::get('/blog-details/{slug}', 'blog_details')->name('blog_details');
});

Route::controller(EventController::class)->group(function () {
    Route::get('/events', 'index')->name('events');
    Route::get('/event-details/{slug}', 'event_details')->name('event_details');
});

Route::controller(StoreController::class)->group(function () {
    Route::get('/store', 'index')->name('store');
    Route::get('/store-details/{slug}', 'store_details')->name('store_details');
    Route::get('/store-location/{slug}', 'store_location')->name('store_location');
});

// Newsletter subscription
Route::controller(NewsletterController::class)->group(function () {
    Route::post('newsletter/subscription/update', 'update')->name('newsletter.subscription.update');
});

// Contact us
Route::controller(ContactUsController::class)->group(function () {
    Route::get('contact', 'contact_us')->name('contact');
    Route::get('contact-us', 'contact_us')->name('contact_us');
    Route::post('contact-us/store', 'contact_us_store')->name('contact_us.store');
    Route::post('contact/store', 'contact_us_store')->name('contact.store');
});

//Website policies
Route::controller(CommonController::class)->group(function () {
    // Route::get('about-us', function () {
    //     return app(CommonController::class)->website_policies('about_us');
    // })->name('about_us');

    Route::get('terms-and-conditions', function () {
        return app(CommonController::class)->website_policies('terms_and_conditions');
    })->name('terms_and_conditions');

    Route::get('privacy-policy', function () {
        return app(CommonController::class)->website_policies('privacy_policy');
    })->name('privacy_policy');

    Route::get('refund-policy', function () {
        return app(CommonController::class)->website_policies('refund_policy');
    })->name('refund_policy');

    Route::get('shipping-policy', function () {
        return app(CommonController::class)->website_policies('shipping_policy');
    })->name('shipping_policy');

    Route::get('about-us', 'about_us')->name('about_us');

    // Product filtering
    Route::controller(ProductsController::class)->group(function () {
        Route::get('products', 'index')->name('all_products');
        Route::get('{category?}/{sub_category?}/{sub_sub_category?}/{sub_sub_sub_category?}', 'index')->name('products');

        Route::post('/filter/search', 'filter_search')->name('filter.search');
    });
});


