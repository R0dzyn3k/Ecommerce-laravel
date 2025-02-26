<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\BelongsTo;


class ProductPriceHistories extends BaseModel
{
    protected $casts = [
        'date' => 'datetime',
        'price' => 'decimal:4',
        'discount_price' => 'decimal:4',
    ];


    protected $fillable = [
        'product_id',
        'tax_id',
        'price',
        'discount_price',
    ];


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }
}
