<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Middleware\AuthenticateAdmin;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->as('web.')->group(function (Router $router) {
    $router->get('/', [HomepageController::class, 'index'])->name('homepage.index');

//    $router->resource('locale', LocaleController::class)->only(['store']);


});

Route::middleware(AuthenticateAdmin::class)->prefix('/admin')->name('admin.')->group(function (Router $router) {
    $router->get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
});

//
//
//Route::view('/', 'home');
//
//Route::view('dashboard', 'dashboard')
//    ->middleware(['auth', 'verified'])
//    ->name('dashboard');
//
//Route::view('profile', 'profile')
//    ->middleware(['auth'])
//    ->name('profile');

require __DIR__.'/auth.php';
