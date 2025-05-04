<?php

namespace App\Services;


use App\Abstracts\AbstractDriverManager;
use App\Contracts\BillingInterface;


class BillingManager extends AbstractDriverManager
{
    public function getBillingMethodForm(string $driver): string
    {
        return $this->getDriver($driver)->getViewPathForm();
    }


    protected function isValidDriver(mixed $driver): bool
    {
        return parent::isValidDriver($driver) && $driver instanceof BillingInterface;
    }
}
