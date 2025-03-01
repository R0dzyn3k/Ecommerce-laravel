<?php

namespace App\Models;


use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Builder;


final class Cart extends Order
{
    protected $table = 'orders';


    protected static function booted(): void
    {
        parent::booted();

        self::addGlobalScope('cart', static function (Builder $builder) {
            $builder->where('status', OrderStatus::CART);
        });
    }
}
