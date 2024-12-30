<?php


use App\Http\Controllers\Web\HomepageController;
use App\Livewire\Admin\CustomerForm;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Profile\ProfileEdit;
use App\Livewire\Admin\Profile\ProfileSecurity;
use App\Livewire\Admin\Settings;
use App\Livewire\Admin\UserTable;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->as('web.')->group(function (Router $router) {
    $router->get('/', [HomepageController::class, 'index'])->name('homepage.index');

//    $router->resource('locale', LocaleController::class)->only(['store']);


});

Route::middleware(['auth:admin'])->prefix('/admin')->name('admin.')->group(function (Router $router) {
    $router->get('dashboard', Dashboard::class)->name('dashboard');
    $router->get('sales', Dashboard::class)->name('sales');
    $router->get('warehouse', Dashboard::class)->name('warehouse');
    $router->get('discounts', Dashboard::class)->name('discounts');


    $router->as('customers.')->prefix('customers')->group(function (Router $router) {
        $router->get('/', UserTable::class)->name('list')->defaults('modelClass', Customer::class);
        $router->get('create', CustomerForm::class)->name('create');
        $router->get('{id}/edit', CustomerForm::class)->name('edit');
        $router->delete('create', CustomerForm::class)->name('create');
    });

    $router->as('profile.')->prefix('profile')->group(function (Router $router) {
        $router->get('/', ProfileEdit::class)->name('edit');
        $router->get('security', ProfileSecurity::class)->name('security');

    });


    $router->get('settings', Settings::class)->name('settings');

    $router->as('settings.')->prefix('settings')->group(function (Router $router) {
        $router->as('administrators.')->prefix('administrators')->group(function (Router $router) {
            $router->get('/', UserTable::class)->name('list')->defaults('modelClass', Admin::class);
            $router->get('create', CustomerForm::class)->name('create');
            $router->get('{id}/edit', CustomerForm::class)->name('edit');
            $router->delete('create', CustomerForm::class)->name('create');
        });

    });
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
