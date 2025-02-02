<?php

namespace App\Traits;


use Illuminate\Support\Str;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


trait SingleImageMedia
{
    use InteractsWithMedia;


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(Str::lower(class_basename(static::class)) . '_photo')->singleFile();
    }


    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumbnail')
            ->width(450)
            ->height(450)
            ->format('webp')
            ->quality(80)
            ->nonQueued();

        $this->addMediaConversion('webp')
            ->format('webp')
            ->quality(90)
            ->nonQueued();
    }
}
