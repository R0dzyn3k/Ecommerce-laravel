<?php

namespace App\Services\Middleware;


use App\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Services\OrderStatusService;
use Closure;


class RecalculateItemsMiddleware
{
    public function handle(Order $order, Closure $next)
    {
        if (app(OrderStatusService::class)->shouldNotRecalculateItems($order)) {
            return $next($order);
        }

        $order->items->each(function (OrderItem $item) {

            if (! $this->ifProductActive($item)) {
                return;
            }

            if (! $this->isStockAvailable($item)) {
                return;
            }

            $item->save();
        });

        return $next($order);
    }


    private function ifProductActive(OrderItem $item): bool
    {
        if ($item->product?->is_active) {
            return true;
        }

        Cart::getChangesBag()->push("Produkt: $item->product_title, nie jest już dostępny.");

        $item->delete();

        return false;
    }


    private function isStockAvailable(OrderItem $item): bool
    {
        $stock = $item->product->stock;

        if ($item->amount <= $stock) {
            return true;
        }

        if ($stock > 0) {
            Cart::getChangesBag()->push("Produkt: $item->product_title, nie jest już dostępny w tej ilości. Zmieniono ilość na: $stock.");

            $item->amount = $stock;

            return true;
        }
        Cart::getChangesBag()->push("Produkt: $item->product_title, nie jest już dostępny.");

        $item->delete();

        return false;

    }
}
