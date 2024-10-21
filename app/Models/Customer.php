<?php

namespace App\Models;


use App\Enums\UserType;
use App\Models\Notifications\CustomerVerifyEmail;
use Illuminate\Database\Eloquent\Builder;


class Customer extends User
{
    protected static function booted(): void
    {
        parent::booted();

        static::addGlobalScope('admins', function (Builder $builder) {
            $builder->where('role', UserType::CUSTOMER);
        });

        static::creating(function (self $customer) {
            $customer->role = UserType::customer();
        });

        static::created(function (self $model) {
            $model->notifications()->create();
        });
    }


    public function guardName(): string
    {
        return 'users';
    }


    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new CustomerVerifyEmail());
    }
}
