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


    protected static function booted(): void
    {
        parent::booted();

        static::saving(static function (self $model) {
            $model->recalculateAndUpdate();
        });
    }


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


    public function recalculateAndUpdate(): self
    {
        $product = $this->product;

        $taxRate = $product->tax->value;
        $amount = $this->amount;

        $unitPriceGross = $product->discount_price ?? $product->price_gross;
        $unitPriceNet = round($unitPriceGross / (1 + $taxRate), 2);
        $unitPriceTax = round($unitPriceGross - $unitPriceNet, 2);

        $discount = $product->discount_price ? round($product->price_gross - $product->discount_price, 2) : 0;

        $unitFinalPriceGross = round($unitPriceGross - $discount);
        $unitFinalPriceNet = round($unitFinalPriceGross / (1 + $taxRate), 2);
        $unitFinalPriceTax = round($unitFinalPriceGross - $unitFinalPriceNet, 2);

        $this->fill([
            'product_title' => $product->title,
            'tax_id' => $product->tax_id,
            'tax_rate_value' => $taxRate,
            'unit_price_gross' => $unitPriceGross,
            'unit_price_net' => $unitPriceNet,
            'unit_price_tax' => $unitPriceTax,
            'discount_gross' => round($discount * $amount, 2),
            'unit_final_price_gross' => $unitFinalPriceGross,
            'unit_final_price_net ' => $unitFinalPriceNet,
            'unit_final_price_tax' => $unitFinalPriceTax,
            'total_price_gross' => round($unitPriceGross * $amount),
            'total_price_net' => round($unitPriceNet * $amount),
            'total_price_tax' => round($unitPriceTax * $amount),
        ]);

        return $this;
    }
}
