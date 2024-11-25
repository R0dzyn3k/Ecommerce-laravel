<?php

namespace App\Models;


use App\Enums\UserType;
use App\Models\Notifications\CustomerVerifyEmail;
use Illuminate\Database\Eloquent\Builder;


class Customer extends User
{
    protected static function boot(): void
    {
        parent::boot();


        static::addGlobalScope('admins', static function (Builder $builder) {
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
