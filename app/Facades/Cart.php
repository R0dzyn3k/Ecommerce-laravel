<?php

namespace App\Facades;


use App\Services\CartManager;
use Illuminate\Support\Facades\Facade;


/**
 * @see CartManager
 */
class Cart extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CartManager::class;
    }
}
