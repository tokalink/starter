<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Tokalink\Starter\Controllers\LoginController;
use Tokalink\Starter\Controllers\ModuleController;
use Tokalink\Starter\Controllers\UserController;
use Tokalink\Starter\Helpers\CBToka;

Route::middleware(['web'])->prefix(config('tokalink.admin_prefix'))->group(function () {
    // login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login_post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

// Route::get('/test', function () {
//     return 'home test';
// })->name('test');

// prefix: admin
Route::group(['middleware' => ['web', 'auth'], 'as' => 'tokalink.', 'prefix' => config('tokalink.admin_prefix')], function () {
    // dashboard
    Route::get('/', function () {
        return view('AdminLayout::dashboard');
    })->name('dashboard');

    // module
    Route::get('module', [ModuleController::class, 'index'])->name('module');


    // route dari table module url by slug
    Route::get('page/{slug}/{metod?}/{id?}', function ($slug, $metod = 'custom', $id = null) {
        $module = DB::table('modules')->where('slug', $slug)->first();
        if (!$module) {
            return "Module not found";
        }
        $controller_path = 'App\\Http\\Controllers\\' . ucfirst($module->controller) . 'Controller';
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\' . ucfirst($module->controller) . 'Controller';
        }
        if (!class_exists($controller_path)) {
            $controller_path = '\\Tokalink\\Starter\\Controllers\\CustomController';
        }
        $controller = new $controller_path();

        return $controller->custom($module, $metod, $id);
    })->name('custom_controller_by_slug');

    // custom controller & view & data
    Route::any('{menu}/{method?}/{id?}', function ($menu, $method = 'index', $id = null) {
        $controller = new Tokalink\Starter\Controllers\CustomController();
        return $controller->$method($menu, $id);
    })->name('custom_controller');
});

// Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
