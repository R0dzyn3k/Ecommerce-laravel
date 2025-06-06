<?php

use App\Http\Controllers\Admin\Auth\AdminLogoutController;
use App\Http\Controllers\Web\Auth\CustomerLogoutController;
use App\Livewire\Admin\Login as AdminLogin;
use App\Livewire\Web\Auth\ForgotPassword;
use App\Livewire\Web\Auth\Login as CustomerLogin;
use App\Livewire\Web\Auth\Register;
use App\Livewire\Web\Auth\ResetPassword;
use App\Livewire\Web\Auth\VerifiedEmail;
use App\Livewire\Web\Auth\VerifyEmail;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


Route::name('web.')->group(function (Router $router) {
    $router->middleware('guest:web')->group(function (Router $router) {
        $router->get('login', CustomerLogin::class)->name('login');
        $router->get('register', Register::class)->name('register');

        $router->get('forgot-password', ForgotPassword::class)->name('forgot-password');
        $router->get('reset-password/{token}', ResetPassword::class)->name('reset-password');
    });

    $router->middleware(['auth:web'])->group(function (Router $router) {
        $router->get('logout', [CustomerLogoutController::class, 'index'])->name('logout');
    });

    $router->get('verify-email', VerifyEmail::class)->name('verify-email');
    $router->get('verified-email/{customer}', VerifiedEmail::class)->name('verified-email');
});


// Admin
Route::middleware(['web', 'guest:admin'])->prefix('/admin')->name('admin.auth.')->group(function (Router $router) {
    $router->get('/', fn() => Redirect::route('admin.auth.login'));
    $router->get('login', AdminLogin::class)->name('login');
});

Route::middleware(['auth:admin'])->prefix('/admin')->name('admin.auth.')->group(function (Router $router) {
    $router->get('logout', [AdminLogoutController::class, 'index'])->name('logout');
});
