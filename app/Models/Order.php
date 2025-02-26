<?php

namespace App\Models;


use App\Enums\OrderStatus;


class Order extends BaseModel
{
    protected $fillable = [
        'customer_id',
        'status',
        'email',
        'items_net',
        'items_tax',
        'items_gross',
        'total_net',
        'total_tax',
        'total_gross',
        'discount_gross',
        'shipping_gross',
        'shipping_method',
        'billing_method',
        'customer_note',
        'ordered_at',
        'realization_at',
    ];


    protected function casts(): array
    {
        return [
            'status' => OrderStatus::class,
            'items_net' => 'decimal:4',
            'items_tax' => 'decimal:4',
            'items_gross' => 'decimal:4',
            'total_net' => 'decimal:4',
            'total_tax' => 'decimal:4',
            'total_gross' => 'decimal:4',
            'discount_gross' => 'decimal:4',
            'shipping_gross' => 'decimal:4',
            'ordered_at' => 'date',
            'realization_at' => 'date',
        ];
    }
}
