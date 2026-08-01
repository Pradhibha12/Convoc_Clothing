<?php

use App\Http\Controllers\Admin\{AdminController, SalesController, PageBuilderController};
use App\Http\Controllers\{Updater};
use App\Http\Middleware\AdminMiddleware;
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
Route::prefix('admin/')->name('admin.')->middleware(['auth', AdminMiddleware::class])->controller(AdminController::class)->group(function () {

    // Dashboard
    Route::get('dashboard', 'dashboard')->name('dashboard');

    // Category
    Route::get('categories', 'categories')->name('categories');
    Route::get('category/add', 'category_add')->name('category.add');
    Route::post('category/store', 'category_store')->name('category.store');
    Route::get('category/edit/{id}', 'category_edit')->name('category.edit');
    Route::post('category/update/{id}', 'category_update')->name('category.update');
    Route::get('category/delete/{id}', 'category_delete')->name('category.delete');

    // Attributes types
    Route::get('attribute_types', 'attribute_types')->name('attribute_types');
    Route::get('attribute_type/add', 'attribute_type_add')->name('attribute_type.add');
    Route::post('attribute_type/store', 'attribute_type_store')->name('attribute_type.store');
    Route::get('attribute_type/edit/{id}', 'attribute_type_edit')->name('attribute_type.edit');
    Route::post('attribute_type/update/{id}', 'attribute_type_update')->name('attribute_type.update');
    Route::get('attribute_type/delete/{id}', 'attribute_type_delete')->name('attribute_type.delete');

    // Attributes
    Route::get('attributes', 'attributes')->name('attributes');
    Route::get('attribute/add', 'attribute_add')->name('attribute.add');
    Route::post('attribute/store', 'attribute_store')->name('attribute.store');
    Route::get('attribute/edit/{id}', 'attribute_edit')->name('attribute.edit');
    Route::post('attribute/update/{id}', 'attribute_update')->name('attribute.update');
    Route::get('attribute/delete/{id}', 'attribute_delete')->name('attribute.delete');

    // Customer
    Route::get('customers', 'customers')->name('customers');
    Route::get('customer/add', 'customer_add')->name('customer.add');
    Route::post('customer/store', 'customer_store')->name('customer.store');
    Route::get('customer/edit/{id}', 'customer_edit')->name('customer.edit');
    Route::post('customer/update/{id}', 'customer_update')->name('customer.update');
    Route::get('customer/delete/{id}', 'customer_delete')->name('customer.delete');

    // Staff
    Route::get('staffs', 'staffs')->name('staffs');
    Route::get('staff/add', 'staff_add')->name('staff.add');
    Route::post('staff/store', 'staff_store')->name('staff.store');
    Route::get('staff/edit/{id}', 'staff_edit')->name('staff.edit');
    Route::post('staff/update/{id}', 'staff_update')->name('staff.update');
    Route::get('staff/delete/{id}', 'staff_delete')->name('staff.delete');

    // User role
    Route::get('roles', 'roles')->name('roles');
    Route::get('role/add', 'role_add')->name('role.add');
    Route::post('role/store', 'role_store')->name('role.store');
    Route::get('role/edit/{id}', 'role_edit')->name('role.edit');
    Route::post('role/update/{id}', 'role_update')->name('role.update');
    Route::get('role/delete/{id}', 'role_delete')->name('role.delete');

    // Blog
    Route::get('blogs', 'blogs')->name('blogs');
    Route::get('blog/add', 'blog_add')->name('blog.add');
    Route::post('blog/store', 'blog_store')->name('blog.store');
    Route::get('blog/edit/{id}', 'blog_edit')->name('blog.edit');
    Route::post('blog/update/{id}', 'blog_update')->name('blog.update');
    Route::get('blog/delete/{id}', 'blog_delete')->name('blog.delete');

    Route::post('blog/seo_update/{id}', 'blog_seo_update')->name('blog.seo_update');


    // Blog category
    Route::get('blog/categories', 'blog_categories')->name('blog.categories');
    Route::get('blog/category/add', 'blog_category_add')->name('blog.category.add');
    Route::post('blog/category/store', 'blog_category_store')->name('blog.category.store');
    Route::get('blog/category/edit/{id}', 'blog_category_edit')->name('blog.category.edit');
    Route::post('blog/category/update/{id}', 'blog_category_update')->name('blog.category.update');
    Route::get('blog/category/delete/{id}', 'blog_category_delete')->name('blog.category.delete');

    // Product
    Route::get('products', 'products')->name('products');
    Route::get('product/add', 'product_add')->name('product.add');
    Route::post('product/store/{action_type}', 'product_store')->name('product.store');
    Route::get('product/edit/{id}', 'product_edit')->name('product.edit');
    Route::post('product/update/{id}', 'product_update')->name('product.update');
    Route::get('product/delete/{id}', 'product_delete')->name('product.delete');
    Route::get('product-image-delete/{id}/{image}', 'product_image_delete')->name('product.image.delete');

    Route::get('product_attribute/delete/{attribute_type_id}/{product_id}', 'product_attribute_delete')->name('product_attribute.delete');    

    // Message
    Route::get('messages/{thread_id?}', 'messages')->name('messages');
    Route::post('message/store', 'message_store')->name('message.store');
    Route::post('message/thread/store', 'message_thread_store')->name('message.thread.store');

    // Coupon
    Route::get('coupons', 'coupons')->name('coupons');
    Route::get('coupon/add', 'coupon_add')->name('coupon.add');
    Route::post('coupon/store', 'coupon_store')->name('coupon.store');
    Route::get('coupon/edit/{id}', 'coupon_edit')->name('coupon.edit');
    Route::post('coupon/update/{id}', 'coupon_update')->name('coupon.update');
    Route::get('coupon/delete/{id}', 'coupon_delete')->name('coupon.delete');

    // Brand
    Route::get('brands', 'brands')->name('brands');
    Route::get('brand/add', 'brand_add')->name('brand.add');
    Route::post('brand/store', 'brand_store')->name('brand.store');
    Route::get('brand/edit/{id}', 'brand_edit')->name('brand.edit');
    Route::post('brand/update/{id}', 'brand_update')->name('brand.update');
    Route::get('brand/delete/{id}', 'brand_delete')->name('brand.delete');

    // Store
    Route::get('stores', 'stores')->name('stores');
    Route::get('store/add', 'store_add')->name('store.add');
    Route::post('store/store', 'store_store')->name('store.store');
    Route::get('store/edit/{id}', 'store_edit')->name('store.edit');
    Route::post('store/update/{id}', 'store_update')->name('store.update'); 
    Route::get('store/delete/{id}', 'store_delete')->name('store.delete');

    // Store application
    Route::get('vendor-application', 'vendor_application')->name('vendor.application');
    Route::get('vendor-application/approve/{id}', 'vendor_application_approve')->name('vendor.application.approve');
    Route::get('vendor-application/delete/{id}', 'vendor_application_delete')->name('vendor.application.delete');

    // Store settings
    Route::get('store/settings', 'store_settings')->name('store.settings');
    Route::post('store/settings/update/{id}', 'store_settings_update')->name('store.settings.update');
    Route::get('store/profile', 'store_profile')->name('store.profile');
    Route::post('store/profile/update', 'store_profile_update')->name('store.profile.update');

    // Country
    Route::get('countries', 'countries')->name('countries');

    // State
    Route::get('states', 'states')->name('states');
    Route::get('state/add', 'state_add')->name('state.add');
    Route::post('state/store', 'state_store')->name('state.store');
    Route::get('state/edit/{id}', 'state_edit')->name('state.edit');
    Route::post('state/update/{id}', 'state_update')->name('state.update');
    Route::get('state/delete/{id}', 'state_delete')->name('state.delete');

    // City
    Route::get('cities', 'cities')->name('cities');
    Route::get('city/add', 'city_add')->name('city.add');
    Route::post('city/store', 'city_store')->name('city.store');
    Route::get('city/edit/{id}', 'city_edit')->name('city.edit');
    Route::post('city/update/{id}', 'city_update')->name('city.update');
    Route::get('city/delete/{id}', 'city_delete')->name('city.delete');

    // Product
    Route::get('pages', 'pages')->name('pages');
    Route::get('page/add', 'page_add')->name('page.add');
    Route::post('page/store', 'page_store')->name('page.store');
    Route::get('page/edit/{id}', 'page_edit')->name('page.edit');
    Route::post('page/update/{id}', 'page_update')->name('page.update');
    Route::get('page/delete/{id}', 'page_delete')->name('page.delete');

    // Event
    Route::get('events', 'events')->name('events');
    Route::get('event/add', 'event_add')->name('event.add');
    Route::post('event/store', 'event_store')->name('event.store');
    Route::get('event/edit/{id}', 'event_edit')->name('event.edit');
    Route::post('event/update/{id}', 'event_update')->name('event.update');
    Route::get('event/delete/{id}', 'event_delete')->name('event.delete');

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

    // Order statuses
    Route::get('order-statuses', 'order_statuses')->name('order.statuses');
    Route::post('admin/order-status/sort', 'order_status_sort')->name('order.status_sort');
    Route::get('order-status/add', 'order_status_add')->name('order.status_add');
    Route::post('order-status/store', 'order_status_store')->name('order.status_store');
    Route::get('order-status/edit/{id}', 'order_status_edit')->name('order.status_edit');
    Route::post('order-status/update/{id}', 'order_status_update')->name('order.status_update');
    Route::get('order-status/delete/{id}', 'order_status_delete')->name('order.status_delete');

    Route::get('order/invoice/{id}', 'download_invoice')->name('order.invoice');

    //Payments
    Route::get('payments', 'payments')->name('payments');
    Route::post('payment/store', 'payment_store')->name('payment.store');
    Route::get('payment/delete/{id}', 'payment_delete')->name('payment.delete');
    Route::get('payment/invoice/{id}', 'payment_invoice')->name('payment.invoice');
    Route::get('payments/offline-request', 'payments_offline_request')->name('payments.offline_request');
    Route::get('payment/offline/status-update/{id}', 'payment_offline_status')->name('payment.offline_status');

    //Shipping zones
    Route::get('shipping_zones', 'shipping_zones')->name('shipping_zones');
    Route::get('shipping_zone/add', 'shipping_zone_add')->name('shipping_zone.add');
    Route::post('shipping_zone/store', 'shipping_zone_store')->name('shipping_zone.store');
    Route::get('shipping_zone/edit/{id}', 'shipping_zone_edit')->name('shipping_zone.edit');
    Route::post('shipping_zone/update/{id}', 'shipping_zone_update')->name('shipping_zone.update');
    Route::get('shipping_zone/delete/{id}', 'shipping_zone_delete')->name('shipping_zone.delete');

    //Shipping rules
    Route::get('shipping_rules', 'shipping_rules')->name('shipping_rules');
    Route::get('shipping_rule/add', 'shipping_rule_add')->name('shipping_rule.add');
    Route::post('shipping_rule/store', 'shipping_rule_store')->name('shipping_rule.store');
    Route::get('shipping_rule/edit/{id}', 'shipping_rule_edit')->name('shipping_rule.edit');
    Route::post('shipping_rule/update/{id}', 'shipping_rule_update')->name('shipping_rule.update');
    Route::get('shipping_rule/delete/{id}', 'shipping_rule_delete')->name('shipping_rule.delete');

    //Shipping carriers
    Route::get('shipping-carriers', 'shipping_carriers')->name('shipping_carriers');
    Route::get('shipping-carriers/add', 'shipping_carrier_add')->name('shipping_carrier.add');
    Route::post('shipping-carriers/store', 'shipping_carrier_store')->name('shipping_carrier.store');
    Route::get('shipping-carriers/edit/{id}', 'shipping_carrier_edit')->name('shipping_carrier.edit');
    Route::post('shipping-carriers/update/{id}', 'shipping_carrier_update')->name('shipping_carrier.update');
    Route::get('shipping-carriers/delete/{id}', 'shipping_carrier_delete')->name('shipping_carrier.delete');

    // Contact us
    Route::get('contacts', 'contacts')->name('contacts');
    Route::get('contact/delete/{id}', 'contact_delete')->name('contact.delete');

    // Contact settings
    Route::get('contact-settings', 'contact_settings')->name('contact.settings');
    Route::post('contact-settings/update', 'contact_settings_update')->name('contact.settings.update');

    
    // Language
    Route::get('languages', 'languages')->name('languages');
    Route::get('language/add', 'language_add')->name('language.add');
    Route::post('language/store', 'language_store')->name('language.store');
    Route::get('language/edit/{id}', 'language_edit')->name('language.edit');
    Route::post('language/update/{id}', 'language_update')->name('language.update');
    Route::get('language/delete/{id}', 'language_delete')->name('language.delete');
    Route::get('language/phrases/{id}', 'language_phrases')->name('language.phrases');
    Route::get('language/phrases/edit/{id}', 'language_phrases_edit')->name('language.phrases.edit');
    Route::post('language/phrase/update/{id?}', 'language_phrase_update')->name('language.phrase.update');

    // System Settings
    Route::get('system/settings', 'system_settings')->name('system.settings');
    Route::post('system/settings/update', 'system_settings_update')->name('system.settings.update');

    // Website settings
    Route::get('website/settings', 'website_settings')->name('website.settings');
    Route::post('website/settings/update', 'website_settings_update')->name('website.settings.update');
    Route::post('website/settings/logo/update', 'website_settings_logo_update')->name('website.settings.logo.update');
    Route::post('website/policies/update', 'website_policies_update')->name('website.policies.update');

    // Theme
    Route::get('themes', 'themes')->name('themes');
    Route::get('theme/edit/{id}', 'theme_edit')->name('theme.edit');
    Route::post('theme/update/{id}', 'theme_update')->name('theme.update');
    Route::get('theme/status/{id}', 'theme_status')->name('theme.status');

    // SMTP settings
    Route::get('smtp/settings', 'smtp_settings')->name('smtp.settings');
    Route::post('smtp/settings/update', 'smtp_settings_update')->name('smtp.settings.update');

    // SEO Settings
    Route::get('seo/settings/{active_tab?}', 'seo_settings')->name('seo.settings');
    Route::post('seo/settings/update/{id}', 'seo_settings_update')->name('seo.settings.update');

    // About settings
    Route::get('about', 'about')->name('about');
    Route::any('about/save_valid_purchase_code/{action_type?}', 'save_valid_purchase_code')->name('save_valid_purchase_code');

    // Profile
    Route::get('profile', 'profile')->name('profile');
    Route::post('profile/update', 'profile_update')->name('profile.update');
    Route::post('profile_password/update', 'profile_password_update')->name('profile_password.update');

    //payment settings
    Route::get('payment-settings', 'payment_settings')->name('payment.settings');
    Route::post('payment-settings/update', 'payment_settings_update')->name('payment.settings.update');

  //Vendors
    Route::get('vendor/settings', 'vendor_settings')->name('vendor.settings');
    Route::post('vendor/settings/update', 'vendor_settings_update')->name('vendor.settings.update');

    Route::get('vendor/payout', 'vendor_payout')->name('vendor.payout');
    Route::get('vendor/payout/filter', 'vendor_payout_filter')->name('vendor.payout.filter');
    Route::post('vendor/payment', 'vendor_payment')->name('vendor.payment');


    



});

//Page Builder

     Route::prefix('admin/')->name('admin.')->middleware(['auth', AdminMiddleware::class])->controller(PageBuilderController::class)->group(function () {
        // Route::get('pages', 'page_list')->name('pages'); 
        // Route::get('page/create', 'page_create')->name('page.create');
        // Route::post('page/store', 'page_store')->name('page.store');
        // Route::get('page/edit/{id}', 'page_edit')->name('page.edit');
        // Route::post('page/update/{id}', 'page_update')->name('page.update');
        // Route::get('page/delete/{id}', 'page_delete')->name('page.delete');
        // Route::get('page/status/{id}', 'page_status')->name('page.status');

        //return developer file content
        Route::any('page/all-builder-developer-file', 'developer_file_content')->name('page.all.builder.developer.file');

        Route::get('page/layout/edit/{id}', 'page_layout_edit')->name('page.layout.edit');
        Route::any('page/layout/update/{id}', 'page_layout_update')->name('page.layout.update');
        Route::post('page/layout/image/update', 'page_layout_image_update')->name('page.layout.image.update');
        Route::get('page/preview/{page_id}', 'preview')->name('page.preview');
    });




Route::prefix('admin/')->name('admin.')->middleware(['auth', AdminMiddleware::class])->controller(Updater::class)->group(function () {
    // System Settings
    Route::post('setting/version/update', 'update')->name('setting.version.update');
});


Route::prefix('admin/')->name('admin.')->middleware(['auth', AdminMiddleware::class])->controller(SalesController::class)->group(function () {

    Route::get('pos/sales/index', 'index')->name('pos.sales.index');
    Route::get('pos/sales/category', 'category_view')->name('pos.sales.category');

    Route::get('pos/product/barcode/search', 'barcode_search')->name('pos.product.barcode.search');

    Route::get('pos/sales/category/search', 'category_search')->name('pos.sales.category.search');
    Route::get('pos/sales/category/filter', 'category_filter')->name('pos.sales.category.filter');

    Route::get('pos/sales/product/view/{id}', 'product_view')->name('pos.sales.product.view');
    Route::get('pos/sales/product/search/{tile_id}', 'product_search')->name('pos.sales.product.search');

    Route::post('pos/order/store', 'order_store')->name('pos.order.store');
});