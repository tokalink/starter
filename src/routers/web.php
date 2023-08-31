<?php

use Illuminate\Support\Facades\Route;
use Tokalink\Starter\Controllers\LoginController;
use Tokalink\Starter\Controllers\UserController;
use Tokalink\Starter\Helpers\CBToka;

Route::middleware(['web'])->prefix(config('tokalink.admin_prefix'))->group(function () {
    // login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login_post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// prefix: admin
Route::group(['middleware' => ['web','auth'],'as'=>'tokalink.', 'prefix' => config('tokalink.admin_prefix')], function () {
    // dashboard
    Route::get('/', function () {
       return view('tokalink::dashboard');
    })->name('dashboard');

    // custom controller & view & data
    Route::get('{controller}/{method?}/{id?}', function ($controller, $method = 'index', $id = null) {
        $controller_path = 'App\\Http\\Controllers\\' . ucfirst($controller) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($controller) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            return "Controller not found";
        }
        $controller = new $controller_path();
        if (!method_exists($controller, $method)) {
            return CBToka::index($controller->init());
        }
    })->name('custom_controller');
});

