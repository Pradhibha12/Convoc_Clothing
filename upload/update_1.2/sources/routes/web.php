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
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return 'Application cache cleared';
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
    Route::get('/', 'index')->name('install');
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