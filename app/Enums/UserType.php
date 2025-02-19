<?php

namespace App\Enums;


enum UserType: string
{
    case ADMIN = 'admin';
    case CUSTOMER = 'customer';


    public static function admin(): string
    {
        return self::ADMIN->value;
    }


    public static function customer(): string
    {
        return self::CUSTOMER->value;
    }


    public function isAdmin(): bool
    {
        return $this === self::ADMIN;
    }


    public function isCustomer(): bool
    {
        return $this === self::CUSTOMER;
    }
}
