<?php

namespace App\Events;


use App\Models\Order;


class OrderNewEvent
{
    public function __construct(
        public Order $order
    ) {
    }
}
