<?php

namespace App\Events;


use App\Models\Order;


class OrderCanceledEvent
{
    public function __construct(
        public Order $order
    ) {
    }
}
