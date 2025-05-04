<?php

namespace App\Contracts;


interface ShippingInterface
{
    public function getValidationRules(): array;

    public function getViewPathDetails(): string;

    public function getViewPathForm(): string;

    public function hasFilledData(?array $shipping_data): bool;
}
