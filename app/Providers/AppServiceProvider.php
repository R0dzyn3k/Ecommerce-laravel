<?php

namespace App\Providers;


use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
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
        //
    }


    private function bootRedirect(): void
    {
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
