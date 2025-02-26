<?php


use App\Http\Controllers\Web\BlogController;
use App\Http\Controllers\Web\BrandController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\ContactController;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\PageController;
use App\Http\Controllers\Web\ProductController;
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
    $router->get('koszyk', [CartController::class, 'show'])->name('cart');

    $router->as('products.')->prefix('produkty')->group(function (Router $router) {
        $router->get('/', [ProductController::class, 'index'])->name('index');
        $router->get('/{slug}', [ProductController::class, 'show'])->name('show');
    });

    $router->as('categories.')->prefix('kategorie')->group(function (Router $router) {
        $router->get('/', [CategoryController::class, 'index'])->name('index');
        $router->get('/{slug}', [CategoryController::class, 'show'])->name('show');
    });

    $router->as('brands.')->prefix('marki')->group(function (Router $router) {
        $router->get('/', [BrandController::class, 'index'])->name('index');
        $router->get('/{slug}', [BrandController::class, 'show'])->name('show');
    });

    $router->as('profile.')->middleware('verified:web.verify-email')->prefix('profil')->group(function (Router $router) {
        $router->get('/', Profile::class)->name('edit');
        $router->get('bezpieczenstwo', Security::class)->name('security');
    });

    $router->middleware('cache')->group(function (Router $router) {
        $router->get('/', [HomepageController::class, 'index'])->name('homepage');

        $router->get('kontakt', [ContactController::class, 'index'])->name('contact');

        $router->get('regulamin', [PageController::class, 'terms'])->name('terms');
        $router->get('polityka-prywatnosci', [PageController::class, 'privacy'])->name('privacy');
        $router->get('polityka-cookies', [PageController::class, 'cookies'])->name('cookies');

        $router->as('blog.')->prefix('blog')->group(function (Router $router) {
            $router->get('/', [BlogController::class, 'index'])->name('index');
            $router->get('/{slug}', [BlogController::class, 'show'])->name('show');
        });
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
