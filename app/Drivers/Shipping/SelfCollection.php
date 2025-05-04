<?php

namespace App\Drivers\Shipping;


use App\Abstracts\AbstractDriver;
use App\Contracts\DriverInterface;
use App\Contracts\ShippingInterface;


class SelfCollection extends AbstractDriver implements DriverInterface, ShippingInterface
{
    protected string $label = 'Odbiór osobisty';


    public function getValidationRules(): array
    {
        return [
            'cart.shipping_data.email' => ['required', 'email', 'max:254'],
            'cart.shipping_data.phone' => ['required', 'string', 'max:20'],
        ];
    }


    public function getViewPathDetails(): string
    {
        return 'drivers.shipping.self-collect-details';
    }


    public function getViewPathForm(): string
    {
        return 'drivers.shipping.self-collect-form';
    }


    public function hasFilledData(?array $shipping_data): bool
    {
        return ! empty($shipping_data) && isset($shipping_data['email'], $shipping_data['phone']);
    }
}
