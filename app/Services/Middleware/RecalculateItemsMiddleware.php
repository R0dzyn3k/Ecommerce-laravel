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

            $this->recalculateUnitPrice($item);

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


    private function recalculateUnitPrice(OrderItem $item): void
    {
        $product = $item->product;
        $taxRate = $product->tax->value;
        $discountPrice = $product->discount_price ? round($product->price_gross - $product->discount_price, 2) : 0;

        $unitPriceGross = $product->discount_price ?? $product->price_gross;
        $unitPriceNet = round($unitPriceGross / (1 + $taxRate), 2);
        $unitPriceTax = round($unitPriceGross - $unitPriceNet, 2);

        $item->fill([
            'product_title' => $product->title,
            'tax_id' => $product->tax_id,
            'discount_gross' => $discountPrice,
            'tax_rate_value' => $taxRate,
            'unit_price_gross' => $unitPriceGross,
            'unit_price_net' => $unitPriceNet,
            'unit_price_tax' => $unitPriceTax,
            'unit_final_price_gross' => $unitPriceGross,
            'unit_final_price_net' => $unitPriceNet,
            'unit_final_price_tax' => $unitPriceTax,
        ]);
    }
}
