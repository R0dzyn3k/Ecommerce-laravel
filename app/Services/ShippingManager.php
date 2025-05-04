<?php

namespace App\Services;


use App\Abstracts\AbstractDriverManager;
use App\Contracts\ShippingInterface;


class ShippingManager extends AbstractDriverManager
{
    public function getShippingMethodForm(string $driver): string
    {
        return $this->getDriver($driver)->getViewPathForm();
    }


    protected function isValidDriver(mixed $driver): bool
    {
        return parent::isValidDriver($driver) && $driver instanceof ShippingInterface;
    }
}
