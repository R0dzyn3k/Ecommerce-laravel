<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::middleware(['web', 'guest:admin'])->prefix('/admin')->name('admin.auth.')->group(function (Router $router) {
    $router->resource('login', AdminLoginController::class)->only(['index', 'store'])->names('login');
});

Route::middleware(['auth:admin'])->prefix('/admin')->name('admin.auth.')->group(function (Router $router) {
    $router->resource('logout', AdminLogoutController::class)->only(['index', 'destroy'])->names('logout');
});

//
//
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
