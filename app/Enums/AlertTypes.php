<?php

namespace App\Enums;


enum AlertTypes: string
{
    case ERROR = 'error';
    case INFO = 'info';
    case SUCCESS = 'success';
    case WARNING = 'warning';


    public static function Warning(): string
    {
        return self::WARNING->value;
    }


    public static function error(): string
    {
        return self::ERROR->value;
    }


    public static function info(): string
    {
        return self::INFO->value;
    }


    public static function success(): string
    {
        return self::SUCCESS->value;
    }
}
