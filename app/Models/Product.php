<?php

namespace App\Models;


use App\Traits\SingleImageMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Livewire\Wireable;
use Spatie\MediaLibrary\HasMedia;


class Product extends BaseModel implements Wireable, HasMedia
{
    use SingleImageMedia;


    protected $fillable = [
        'is_active',
        'title',
        'description',
        'ean',
        'sku',
        'mpn',
        'category_id',
        'tax_id',
        'brand_id',
        'price',
        'discount_price',
        'stock',
        'reviews_average',
        'reviews_count',
    ];


    public static function fromLivewire($value)
    {
        $product = isset($value['id']) ? self::find($value['id']) : new self();

        $product->fill([
            'is_active' => $value['is_active'] ?? $product->is_active,
            'title' => $value['title'] ?? $product->title,
            'description' => $value['description'] ?? $product->description,
            'ean' => $value['ean'] ?? $product->ean,
            'sku' => $value['sku'] ?? $product->sku,
            'mpn' => $value['mpn'] ?? $product->mpn,
            'category_id' => $value['category_id'] ?? $product->category_id,
            'tax_id' => $value['tax_id'] ?? $product->tax_id,
            'brand_id' => $value['brand_id'] ?? $product->brand_id,
            'price' => $value['price'] ?? $product->price,
            'discount_price' => $value['discount_price'] ?? $product->discount_price,
            'stock' => $value['stock'] ?? $product->stock,
        ]);

        return $product;
    }


    protected static function booted(): void
    {
        static::saved(static function (self $product) {
            if ($product->isDirty('price')
                || $product->isDirty('discount_price')
                || $product->isDirty('tax_id')
            ) {
                $product->pricesHistory()->create([
                    'price' => $product->price,
                    'discount_price' => $product->discount_price,
                    'tax_id' => $product->tax_id,
                ]);
            }
        });
    }


    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }


    public function pricesHistory(): HasMany
    {
        return $this->hasMany(ProductPriceHistories::class);
    }


    public function tax(): BelongsTo
    {
        return $this->belongsTo(Tax::class);
    }


    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'is_active' => $this->is_active,
            'title' => $this->title,
            'description' => $this->description,
            'ean' => $this->ean,
            'sku' => $this->sku,
            'mpn' => $this->mpn,
            'category_id' => $this->category_id,
            'tax_id' => $this->tax_id,
            'brand_id' => $this->brand_id,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'stock' => $this->stock,
        ];
    }


    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'price' => 'decimal:4',
            'discount_price' => 'decimal:4',
            'stock' => 'integer',
            'reviews_count' => 'integer',
            'reviews_average' => 'decimal:2',
        ];
    }
}
