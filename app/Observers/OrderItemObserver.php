<?php

namespace App\Observers;


use App\Models\OrderItem;


class OrderItemObserver
{
    public function saving(OrderItem $orderItem): void
    {
        $orderItem->total_price_net    = $orderItem->unit_price_net * $orderItem->amount;
        $orderItem->total_price_tax    = $orderItem->unit_price_tax * $orderItem->amount;
        $orderItem->total_price_gross  = $orderItem->unit_price_gross * $orderItem->amount;

        $orderItem->total_final_net    = $orderItem->total_price_net;
        $orderItem->total_final_tax    = $orderItem->total_price_tax;
        $orderItem->total_final_gross  = $orderItem->total_price_gross;
    }
}
