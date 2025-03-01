<?php

namespace App\Events;


use App\Models\Order;


class OrderCompletedEvent
{
    public function __construct(
        public Order $order
    ) {
    }
}
