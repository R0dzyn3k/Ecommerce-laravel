<?php

namespace App\Providers;


use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RedirectIfAuthenticated::redirectUsing(static function () {
            if (Auth::guard('admin')->check()) {
                return route('admin.dashboard');
            }

            return route('web.homepage.index');
        });
    }


    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }
}
