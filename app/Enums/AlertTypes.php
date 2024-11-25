<?php

namespace App\Enums;


enum AlertTypes: string
{
    case ERROR = 'error';
    case INFO = 'info';
    case SUCCESS = 'success';
    case WARNING = 'warning';


    public static function Error(): string
    {
        return self::ERROR->value;
    }


    public static function Info(): string
    {
        return self::INFO->value;
    }


    public static function Success(): string
    {
        return self::SUCCESS->value;
    }


    public static function Warning(): string
    {
        return self::WARNING->value;
    }
}
