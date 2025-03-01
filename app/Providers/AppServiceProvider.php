<?php

namespace App\Providers;


use App\Services\CartManager;
use App\Services\OrderStatusService;
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
        $this->app->singleton(CartManager::class, static function ($app) {
            return new CartManager($app->make(OrderStatusService::class));
        });
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
}
