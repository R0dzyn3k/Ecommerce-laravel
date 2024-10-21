<?php

namespace App\Models;


use App\Enums\UserType;
use Illuminate\Database\Eloquent\Builder;


class Admin extends User
{
    protected static function booted(): void
    {
        parent::booted();

        static::addGlobalScope('admins', function (Builder $builder) {
            $builder->where('role', UserType::ADMIN);
        });

        static::creating(function (self $customer) {
            $customer->role = UserType::admin();
        });
    }


    public function guardName(): string
    {
        return 'admin';
    }
}
