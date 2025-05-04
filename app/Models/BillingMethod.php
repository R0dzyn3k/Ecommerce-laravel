<?php

namespace App\Models;


use Illuminate\Support\Collection;
use Livewire\Wireable;


class BillingMethod extends BaseModel implements Wireable
{
    protected $casts = [
        'is_active' => 'boolean',
    ];


    protected $fillable = [
        'is_active',
        'name',
        'driver',
    ];


    public static function fromLivewire($value)
    {
        $billing = isset($value['id']) ? self::find($value['id']) : new self();

        $billing->fill([
            'is_active' => $value['is_active'] ?? $billing->is_active,
            'driver' => $value['driver'] ?? $billing->driver,
            'name' => $value['name'] ?? $billing->name,
        ]);

        return $billing;
    }


    public static function mapForRadio(): Collection
    {
        return self::where('is_active', true)
            ->get()
            ->map(fn($item) => [
                'id' => $item->id,
                'name' => $item->name,
            ]);
    }


    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'is_active' => $this->is_active,
            'driver' => $this->driver,
            'name' => $this->name,
        ];
    }
}
