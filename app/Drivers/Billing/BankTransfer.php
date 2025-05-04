<?php

namespace App\Drivers\Billing;


use App\Abstracts\AbstractDriver;
use App\Contracts\BillingInterface;
use App\Contracts\DriverInterface;


class BankTransfer extends AbstractDriver implements DriverInterface, BillingInterface
{
    protected string $label = 'Przelew bankowy';


    public function getValidationRules(): array
    {
        return [];
    }


    public function getViewPathForm(): string
    {
        return 'drivers.billing.bank-transfer-form';
    }


    public function hasFilledData(?array $billing_data): bool
    {
        return true;
    }
}
