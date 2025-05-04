<?php

namespace App\Providers;


use App\Drivers\Billing\BankTransfer;
use App\Drivers\Billing\Cash;
use App\Drivers\Shipping\Courier;
use App\Drivers\Shipping\SelfCollection;
use App\Services\BillingManager;
use App\Services\CartManager;
use App\Services\OrderStatusService;
use App\Services\ShippingManager;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->bootRedirect();
        $this->configPasswordRules();
    }


    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerManagers();
    }


    private function bootRedirect(): void
    {
        Paginator::useTailwind();

        RedirectIfAuthenticated::redirectUsing(static function () {
            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard');
            }

            return route('web.homepage');
        });
    }


    private function configPasswordRules(): void
    {
        Password::defaults(static function () {
            if (app()->isProduction()) {
                return Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised();
            }

            return Password::min(3);
        });
    }


    private function registerManagers(): void
    {
        $this->app->singleton(CartManager::class, static function ($app) {
            return new CartManager($app->make(OrderStatusService::class));
        });


        $this->app->singleton(ShippingManager::class, fn() => tap(
            new ShippingManager(),
            function (ShippingManager $manager) {
                $manager->register($this->app, SelfCollection::class);
                $manager->register($this->app, Courier::class);
            })
        );

        $this->app->singleton(BillingManager::class, fn() => tap(
            new BillingManager(),
            function (BillingManager $manager) {
                $manager->register($this->app, Cash::class);
                $manager->register($this->app, BankTransfer::class);
            })
        );
    }
}
