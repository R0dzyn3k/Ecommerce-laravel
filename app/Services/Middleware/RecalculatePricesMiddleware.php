<?php

namespace App\Services\Middleware;


use App\Models\Order;
use Closure;


class RecalculatePricesMiddleware
{
    public function handle(Order $order, Closure $next)
    {
        $order->items_gross = $order->items->sum('total_price_gross');
        $order->items_net = $order->items->sum('total_price_net');
        $order->items_tax = $order->items->sum('total_price_tax');

        $order->total_gross = $order->items_gross;
        $order->total_net = $order->items_net;
        $order->total_tax = $order->items_tax;

        return $next($order);
    }
}
