<?php

namespace App\Models;


use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;


class Admin extends User
{
    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(UserType::admin(), static function (Builder $builder) {
            $builder->where('role', UserType::ADMIN);
        });
    }


    protected static function booted(): void
    {
        parent::booted();

        static::creating(static function (self $model) {
            $model->role = UserType::admin();
        });
    }


    public function guardName(): string
    {
        return 'admin';
    }
}
