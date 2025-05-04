<?php

namespace App\Contracts;


use App\Models\Cart;


interface BillingInterface
{
    public function getValidationRules(): array;


    public function getViewPathForm(): string;


    public function hasFilledData(?array $billing_data): bool;
}
