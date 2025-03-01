<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class OrderItem extends Model
{
    protected $fillable = [
        'tax_id',
        'order_id',
        'product_id',
        'product_title',
        'amount',
        'tax_rate_value',
        'unit_price_net',
        'unit_price_tax',
        'unit_price_gross',
        'unit_final_price_net',
        'unit_final_price_tax',
        'unit_final_price_gross',
        'total_price_net',
        'total_price_tax',
        'total_price_gross',
        'total_final_net',
        'total_final_tax',
        'total_final_gross',
        'discount_gross',
    ];


    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }


    protected function casts(): array
    {
        return [
            'amount' => 'integer',
            'tax_rate_value' => 'decimal:2',
            'unit_price_net' => 'decimal:4',
            'unit_price_tax' => 'decimal:4',
            'unit_price_gross' => 'decimal:4',
            'unit_final_price_net' => 'decimal:4',
            'unit_final_price_tax' => 'decimal:4',
            'unit_final_price_gross' => 'decimal:4',
            'total_price_net' => 'decimal:4',
            'total_price_tax' => 'decimal:4',
            'total_price_gross' => 'decimal:4',
            'total_final_net' => 'decimal:4',
            'total_final_tax' => 'decimal:4',
            'total_final_gross' => 'decimal:4',
            'discount_gross' => 'decimal:4',
        ];
    }
}
