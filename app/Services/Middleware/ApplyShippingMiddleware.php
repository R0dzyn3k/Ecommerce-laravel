<?php

namespace App\Services\Middleware;


use App\Models\Order;
use App\Models\OrderItem;
use Closure;


class ApplyShippingMiddleware
{
    public function handle(Order $order, Closure $next)
    {
        if (! $order->shipping_method_id) {
            $this->clearShippingDetails($order);

            return $next($order);
        }

        $shippingMethod = $order->shippingMethod;
        $shippingCost = $shippingMethod->cost;

        $order->shipping_cost = $shippingCost;

        if ($shippingCost == '0') {
            return $next($order);
        }

        $this->applyShippingCost($order, $shippingCost);

        return $next($order);
    }


    private function applyShippingCost(Order $order, float $shippingCost)
    {
        $totalGross = 0;
        $totalNet = 0;
        $totalTax = 0;

        /** @var OrderItem $item */
        foreach ($order->items as $item) {
            $quota = $item->total_price_gross / $order->items_gross;
            $gross = $shippingCost * $quota;


            $totalGross += $gross;
            $totalNet += $net = $gross / ($item->tax_rate_value + 1);
            $totalTax += $tax = $net * $item->tax_rate_value;

            $item->unit_final_price_gross += $gross;
            $item->unit_final_price_net += $net;
            $item->unit_final_price_tax += $tax;

            $item->save();
        }

        $order->total_net += round($totalNet,2);
        $order->total_tax += round($totalTax,2);
        $order->total_gross += round($totalGross, 2);

        $order->save();
    }


    private function clearShippingDetails(Order $order): void
    {
        $order->shipping_cost = 0;
        $order->shipping_data = [];
        $order->shipping_driver = null;
    }
}
