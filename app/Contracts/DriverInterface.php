<?php

namespace App\Contracts;


interface DriverInterface
{
    public function getLabel(): string;


    public static function key(): string;
}
