<?php

namespace App\Models;


use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Wireable;


final class Cart extends Order implements Wireable
{
    protected $table = 'orders';


    public static function fromLivewire($value): static
    {
        $cart = \App\Facades\Cart::getPersistentCart();

        $cart->fill([
            'shipping_driver' => $value['shipping_driver'],
            'shipping_data' => $value['shipping_data'],
            'billing_driver' => $value['billing_driver'],
            'billing_data' => $value['billing_data'],
            'customer_note' => $value['customer_note'],
        ]);

        return $cart;
    }


    protected static function booted(): void
    {
        parent::booted();

        self::addGlobalScope('cart', static function (Builder $builder) {
            $builder->where('status', OrderStatus::CART);
        });
    }


    public function toLivewire(): array
    {
        return [
            'status' => $this->status,
            'email' => $this->email,
            'items_net' => $this->items_net,
            'items_tax' => $this->items_tax,
            'items_gross' => $this->items_gross,
            'total_net' => $this->total_net,
            'total_tax' => $this->total_tax,
            'total_gross' => $this->total_gross,
            'discount_gross' => $this->discount_gross,
            'shipping_cost' => $this->shipping_cost,
            'shipping_driver' => $this->shipping_driver,
            'ordered_at' => $this->ordered_at,
            'realization_at' => $this->realization_at,

            'shipping_data' => $this->shipping_data ?? [],
            'billing_driver' => $this->billing_driver,
            'billing_data' => $this->billing_data ?? [],
            'customer_note' => $this->customer_note,
        ];
    }
}
