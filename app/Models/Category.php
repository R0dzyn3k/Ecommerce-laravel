<?php

namespace App\Models;


use App\Traits\SingleImageMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Wireable;
use Spatie\MediaLibrary\HasMedia;


class Category extends BaseModel implements Wireable, HasMedia
{
    use SingleImageMedia;


    protected $fillable = [
        'is_active',
        'title',
        'description',
    ];


    public static function fromLivewire($value)
    {
        $brand = isset($value['id']) ? self::find($value['id']) : new self();

        $brand->fill([
            'title' => $value['title'] ?? $brand->title,
            'description' => $value['description'] ?? $brand->description,
            'is_active' => $value['is_active'] ?? $brand->is_active,
        ]);

        return $brand;
    }


    public static function mapForSelect(): Collection
    {
        return DB::table('categories')
            ->where('is_active', 1)
            ->pluck('title', 'id');
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
