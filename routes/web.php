<?php


use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomepageController;
use App\Livewire\Admin\Customers\{CustomerForm, Customers};
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Profile\{ProfileEdit, ProfileSecurity};
use App\Livewire\Admin\Settings\Administrators\{AdministratorForm, Administrators};
use App\Livewire\Admin\Settings\Newsletter\NewsletterTable;
use App\Livewire\Admin\Settings\SettingsTiles;
use App\Livewire\Admin\Settings\Taxes\{TaxForm, TaxTable};
use App\Livewire\Admin\Warehouse\Brands\BrandForm;
use App\Livewire\Admin\Warehouse\Brands\BrandTable;
use App\Livewire\Admin\Warehouse\Categories\CategoryForm;
use App\Livewire\Admin\Warehouse\Categories\CategoryTable;
use App\Livewire\Admin\Warehouse\Products\ProductForm;
use App\Livewire\Admin\Warehouse\Products\ProductTable;
use App\Livewire\Admin\Warehouse\WarehouseTiles;
use App\Livewire\Web\Profile\Profile;
use App\Livewire\Web\Profile\Security;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;


Route::middleware(['web'])->as('web.')->group(function (Router $router) {
    $router->get('/', [HomepageController::class, 'index'])->name('homepage');
    $router->get('products', [HomepageController::class, 'index'])->name('products');
    $router->get('categories', [HomepageController::class, 'index'])->name('categories');
    $router->get('brands', [HomepageController::class, 'index'])->name('brands');
    $router->get('contact', [ContactController::class, 'index'])->name('contact');

    $router->get('cart', [HomepageController::class, 'index'])->name('cart');

    $router->as('profile.')->middleware('verified:web.verify-email')->prefix('profile')->group(function (Router $router) {
        $router->get('/', Profile::class)->name('edit');
        $router->get('security', Security::class)->name('security');
    });

});

Route::middleware(['auth:admin'])->prefix('admin')->name('admin.')->group(function (Router $router) {
    $router->get('dashboard', Dashboard::class)->name('dashboard');
    $router->get('sales', Dashboard::class)->name('sales');
    $router->get('warehouse', Dashboard::class)->name('warehouse');

    $router->as('warehouse.')->prefix('warehouse')->group(function (Router $router) {
        $router->get('/', WarehouseTiles::class)->name('index');

        $router->as('products.')->prefix('products')->group(function (Router $router) {
            $router->get('/', ProductTable::class)->name('index');
            $router->get('create', ProductForm::class)->name('create');
            $router->get('{product}', ProductForm::class)->name('show');
        });

        $router->as('categories.')->prefix('categories')->group(function (Router $router) {
            $router->get('/', CategoryTable::class)->name('index');
            $router->get('create', CategoryForm::class)->name('create');
            $router->get('{category}', CategoryForm::class)->name('show');
        });

        $router->as('brands.')->prefix('brands')->group(function (Router $router) {
            $router->get('/', BrandTable::class)->name('index');
            $router->get('create', BrandForm::class)->name('create');
            $router->get('{brand}', BrandForm::class)->name('show');
        });
    });

    $router->get('discounts', Dashboard::class)->name('discounts');

    $router->as('customers.')->prefix('customers')->group(function (Router $router) {
        $router->get('/', Customers::class)->name('index');
        $router->get('create', CustomerForm::class)->name('create');
        $router->get('{customer}', CustomerForm::class)->name('show');
    });

    $router->as('profile.')->prefix('profile')->group(function (Router $router) {
        $router->get('/', ProfileEdit::class)->name('edit');
        $router->get('security', ProfileSecurity::class)->name('security');
    });

    $router->as('settings.')->prefix('settings')->group(function (Router $router) {
        $router->get('/', SettingsTiles::class)->name('index');

        $router->as('administrators.')->prefix('administrators')->group(function (Router $router) {
            $router->get('/', Administrators::class)->name('index');
            $router->get('create', AdministratorForm::class)->name('create');
            $router->get('{admin}', AdministratorForm::class)->name('show');
        });

        $router->as('taxes.')->prefix('taxes')->group(function (Router $router) {
            $router->get('/', TaxTable::class)->name('index');
            $router->get('create', TaxForm::class)->name('create');
            $router->get('{tax}', TaxForm::class)->name('show');
        });

        $router->as('newsletter.')->prefix('newsletter')->group(function (Router $router) {
            $router->get('/', NewsletterTable::class)->name('index');
            $router->get('create', BrandForm::class)->name('create');
            $router->get('{brand}', BrandForm::class)->name('show');
        });
    });
});

require __DIR__ . '/auth.php';
