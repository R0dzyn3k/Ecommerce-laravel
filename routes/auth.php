<?php

use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Web\Auth\CustomerLogoutController;
use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Web\Auth\ForgotPassword;
use App\Livewire\Web\Auth\Login as CustomerLogin;
use App\Livewire\Web\Auth\Register;
use App\Livewire\Web\Auth\ResetPassword;
use App\Livewire\Web\Auth\VerifyEmail;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:web')->name('web.')->group(function (Router $router) {
    $router->get('login', CustomerLogin::class)->name('login');
    $router->get('register', Register::class)->name('register');

    $router->get('forgot-password', ForgotPassword::class)->name('forgot-password');
    $router->get('reset-password/{token}', ResetPassword::class)->name('reset-password');
});


Route::middleware(['web', 'guest:admin'])->prefix('/admin')->name('admin.auth.')->group(function (Router $router) {
    $router->get('/', fn() => Redirect::route('admin.auth.login'));
    $router->get('login', AdminLogin::class)->name('login');
});

Route::middleware(['auth:admin'])->prefix('/admin')->name('admin.auth.')->group(function (Router $router) {
    $router->get('logout', [AdminLogoutController::class, 'index'])->name('logout');
});

Route::middleware(['auth:web'])->name('web.')->group(function (Router $router) {
    $router->get('logout', [CustomerLogoutController::class, 'index'])->name('logout');
});

Route::get('verify-email', VerifyEmail::class)->name('web.verify-email');



//Route::middleware('guest')->group(function () {
//    Volt::route('register', 'pages.auth.register')
//        ->name('register');
//
//    Volt::route('login', 'pages.auth.login')
//        ->name('login');
//
//    Volt::route('forgot-password', 'pages.auth.forgot-password')
//        ->name('password.request');
//
//    Volt::route('reset-password/{token}', 'pages.auth.reset-password')
//        ->name('password.reset');
//});
//
//Route::middleware('auth')->group(function () {
//    Volt::route('verify-email', 'pages.auth.verify-email')
//        ->name('verification.notice');
//
//    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
//        ->middleware(['signed', 'throttle:6,1'])
//        ->name('verification.verify');
//
//    Volt::route('confirm-password', 'pages.auth.confirm-password')
//        ->name('password.confirm');
//});
