<?php

namespace App\Models;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Wireable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Blog extends BaseModel implements Wireable, HasMedia
{
    use InteractsWithMedia;


    protected $fillable = [
        'title',
        'slug',
        'content',
    ];


    public static function fromLivewire($value)
    {
        $brand = isset($value['id']) ? self::find($value['id']) : new self();

        $brand->fill([
            'title' => $value['title'] ?? $brand->title,
            'content' => $value['content'] ?? $brand->content,
        ]);

        return $brand;
    }


    public static function mapForSelect(): Collection
    {
        return DB::table('blogs')->pluck('title', 'id');
    }


    protected static function booted(): void
    {
        static::saving(static function (self $blog) {
            if (empty($blog->slug) || $blog->isDirty('title')) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(Str::lower(class_basename(static::class)) . '_photo')->singleFile();
    }


    public function toLivewire()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content ?? '',
        ];
    }


    protected function casts(): array
    {
        return [
            'content' => 'string',
        ];
    }
}
