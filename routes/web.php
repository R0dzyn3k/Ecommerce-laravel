<?php


use App\Http\Controllers\Web\HomepageController;
use App\Livewire\Admin\Administrators;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Profile;
use App\Livewire\Admin\Settings;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->as('web.')->group(function (Router $router) {
    $router->get('/', [HomepageController::class, 'index'])->name('homepage.index');

//    $router->resource('locale', LocaleController::class)->only(['store']);


});

Route::middleware(['auth:admin'])->prefix('/admin')->name('admin.')->group(function (Router $router) {
    $router->get('dashboard', Dashboard::class)->name('dashboard');
    $router->get('profile', Profile::class)->name('profile');
    $router->get('settings', Settings::class)->name('settings');

    $router->as('settings.')->prefix('settings')->group(function (Router $router) {
        $router->get('administrators', Administrators::class)->name('administrators');
    });


    $router->get('sales', Dashboard::class)->name('sales');
    $router->get('warehouse', Dashboard::class)->name('warehouse');
    $router->get('discounts', Dashboard::class)->name('discounts');
    $router->get('customers', Dashboard::class)->name('customers');
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

require __DIR__ . '/auth.php';
