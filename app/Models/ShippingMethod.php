<?php

namespace App\Models;


use Illuminate\Support\Collection;
use Livewire\Wireable;


class ShippingMethod extends BaseModel implements Wireable
{
    protected $casts = [
        'is_active' => 'boolean',
        'cost' => 'decimal:2',
    ];


    protected $fillable = [
        'is_active',
        'cost',
        'name',
        'driver',
    ];


    public static function fromLivewire($value)
    {
        $billing = isset($value['id']) ? self::find($value['id']) : new self();

        $billing->fill([
            'is_active' => $value['is_active'] ?? $billing->is_active,
            'driver' => $value['driver'] ?? $billing->driver,
            'cost' => $value['cost'] ?? $billing->cost,
            'name' => $value['name'] ?? $billing->name,
        ]);

        return $billing;
    }


    public static function mapForSelect(): Collection
    {
        return self::all()->pluck('name', 'id');
    }


    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'is_active' => $this->is_active,
            'driver' => $this->driver,
            'cost' => $this->cost,
            'name' => $this->name,
        ];
    }
}
