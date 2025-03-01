<?php

namespace App\Providers;


use App\Models\OrderItem;
use App\Observers\OrderItemObserver;
use Illuminate\Support\ServiceProvider;


class EventServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        OrderItem::observe(OrderItemObserver::class);
    }
}
