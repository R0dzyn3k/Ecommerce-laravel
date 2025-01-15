<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Wireable;


class Category extends BaseModel implements Wireable
{
    protected $fillable = [
        'is_active',
        'title',
        'description',
        'photo',
    ];


    public static function fromLivewire($value)
    {
        $brand = isset($value['id']) ? self::find($value['id']) : new self();

        $brand->fill([
            'title' => $value['title'] ?? $brand->title,
            'description' => $value['description'] ?? $brand->description,
            'photo' => $value['photo'] ?? $brand->photo,
            'is_active' => $value['is_active'] ?? $brand->is_active,
        ]);

        return $brand;
    }


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }


    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description ?? '',
            'photo' => $this->photo,
            'is_active' => $this->is_active,
        ];
    }


    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

}
