<?php

namespace App\Drivers\Billing;


use App\Abstracts\AbstractDriver;
use App\Contracts\BillingInterface;
use App\Contracts\DriverInterface;


class Cash extends AbstractDriver implements DriverInterface, BillingInterface
{
    protected string $label = 'Gotówka';


    public function getValidationRules(): array
    {
        return [];
    }


    public function getViewPathForm(): string
    {
        return 'drivers.billing.cash-form';
    }


    public function hasFilledData(?array $billing_data): bool
    {
        return true;
    }
}
