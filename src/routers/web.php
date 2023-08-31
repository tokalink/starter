<?php
use Tokalink\Starter\Controllers\LoginController;


// login
// Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');

// prefix: admin
Route::prefix(config('tokalink.admin_prefix'))->group(function () {
    // login
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login_post');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/', function () {
    return view('tokalink::dashboard');
})->name('dashboard');

// auth middleware & prefix: admin
// Route::group(['middleware' => ['auth:web', 'is_admin_tokalink'], 'prefix' => config('tokalink.admin_prefix')], function () {
//     // dashboard
//     Route::get('/', function () {
//        dd('dashboard', auth()->user());
//     })->name('dashboard');
// });