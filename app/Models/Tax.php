<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Wireable;


class Tax extends BaseModel implements Wireable
{
    protected $casts = [
        'value' => 'decimal:2',
    ];


    protected $fillable = [
        'percentage',
    ];


    public static function fromLivewire($value)
    {
        $tax = isset($value['id']) ? self::find($value['id']) : new self();

        $tax->fill([
            'percentage' => $value['percentage'] ?? $tax->percentage,
        ]);

        return $tax;
    }


    protected static function booted(): void
    {
        static::saving(static function (self $model) {
            $model->name = $model->percentage . '%';
            $model->value = $model->percentage / 100;
        });
    }


    public function discountsHistory(): HasMany
    {
        return $this->hasMany(ProductDiscountHistory::class);
    }


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'percentage' => $this->percentage,
        ];
    }
}
