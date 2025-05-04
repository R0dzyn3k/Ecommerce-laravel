<?php

namespace App\Drivers\Shipping;


use App\Abstracts\AbstractDriver;
use App\Contracts\DriverInterface;
use App\Contracts\ShippingInterface;


class Courier extends AbstractDriver implements DriverInterface, ShippingInterface
{
    protected string $label = 'Kurier';


    public function getValidationRules(): array
    {
        return [
            'cart.shipping_data.street' => ['required', 'string', 'max:100'],
            'cart.shipping_data.building_nr' => ['required', 'string', 'max:30'],
            'cart.shipping_data.apartment_nr' => ['sometimes', 'nullable', 'string', 'max:30'],
            'cart.shipping_data.postcode' => ['required', 'string', 'max:20'],
            'cart.shipping_data.city' => ['required', 'string', 'max:100'],
            'cart.shipping_data.region' => ['required', 'string', 'max:100'],
            'cart.shipping_data.first_line' => ['sometimes', 'nullable', 'string', 'max:255'],
            'cart.shipping_data.second_line' => ['sometimes', 'nullable', 'string', 'max:255'],
            'cart.shipping_data.email' => ['required', 'email', 'max:254'],
            'cart.shipping_data.phone' => ['required', 'string', 'max:20'],
        ];
    }


    public function getViewPathDetails(): string
    {
        return 'drivers.shipping.courier-details';
    }


    public function getViewPathForm(): string
    {
        return 'drivers.shipping.courier-form';
    }


    public function hasFilledData(?array $shipping_data): bool
    {
        return ! empty($shipping_data)
            && isset(
                $shipping_data['street'],
                $shipping_data['building_nr'],
                $shipping_data['postcode'],
                $shipping_data['city'],
                $shipping_data['region'],
                $shipping_data['email'],
                $shipping_data['phone']);
    }
}
