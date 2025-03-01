<?php

namespace App\Exceptions;


use App\Enums\OrderStatus;
use LogicException;


class InvalidOrderStatusTransitionException extends LogicException
{
    public function __construct(OrderStatus $from, OrderStatus $to)
    {
        parent::__construct("Nie można zmienić statusu zamówienia z '$from->value' na '$to->value'.");
    }
}
