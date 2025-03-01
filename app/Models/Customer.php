<?php

namespace App\Models;


use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


class Customer extends User
{
    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(UserType::customer(), static function (Builder $builder) {
            $builder->where('role', UserType::CUSTOMER);
        });
    }


    protected static function booted(): void
    {
        parent::booted();

        static::creating(static function (self $model) {
            $model->role = UserType::customer();
        });

        static::created(static function (self $model) {
            $model->notifications()->create();
        });
    }


    public function cart(): HasOne
    {
        return $this->hasOne(Cart::class);
    }


    public function newsletters(): HasMany
    {
        return $this->hasMany(Newsletter::class, 'user_id');
    }


    public function subscribedNewsletter(): bool
    {
        return $this->newsletters()->exists();
    }
}
