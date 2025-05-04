<?php

namespace App\Models;


use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
        'shipping_cost',
        'customer_note',
        'ordered_at',
        'realization_at',
        'shipping_driver',
        'shipping_data',
        'billing_driver',
        'billing_data',
    ];


    protected static function booted(): void
    {
        parent::booted();

        self::addGlobalScope('cart', static function (Builder $builder) {
            $builder->where('status', '!=', OrderStatus::CART);
        });
    }


    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }


    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }


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
            'shipping_cost' => 'decimal:4',
            'ordered_at' => 'date',
            'realization_at' => 'date',
            'shipping_data' => 'json',
            'billing_data' => 'json',
        ];
    }
}
