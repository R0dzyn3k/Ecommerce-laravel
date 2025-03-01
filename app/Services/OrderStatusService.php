<?php

namespace App\Services;


use App\Enums\OrderStatus;
use App\Events\OrderNewEvent;
use App\Exceptions\InvalidOrderStatusTransitionException;
use App\Models\Order;
use Illuminate\Support\Facades\Event;


class OrderStatusService
{
    private array $transitions = [
        OrderStatus::CART->value => [OrderStatus::NEW_ORDER->value],
        OrderStatus::NEW_ORDER->value => [OrderStatus::PAYMENT_PENDING->value, OrderStatus::CANCELLED->value],
        OrderStatus::PAYMENT_ON_HOLD->value => [OrderStatus::CANCELLED->value],
        OrderStatus::PAYMENT_PENDING->value => [OrderStatus::PAYMENT_PAID->value, OrderStatus::PAYMENT_FAILED->value, OrderStatus::CANCELLED->value],
        OrderStatus::PAYMENT_PAID->value => [OrderStatus::COMPLETED->value],
    ];


    public function newOrder(Order $order, $sendEmail = true): Order
    {
        $this->assertCanTransition($order->status, OrderStatus::NEW_ORDER);

        $order->update(['status' => OrderStatus::NEW_ORDER]);

        if ($sendEmail) {
            // Send email to customer
        }

        Event::dispatch(new OrderNewEvent($order));


        return $order;
    }


    /**
     * @throws InvalidOrderStatusTransitionException
     */
    private function assertCanTransition(OrderStatus $from, OrderStatus $to): void
    {
        if (! in_array($to->value, $this->transitions[$from->value] ?? [], true)) {
            throw new InvalidOrderStatusTransitionException($from, $to);
        }
    }
}
