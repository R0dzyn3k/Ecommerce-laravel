<?php

namespace Database\Seeders;


use App\Drivers\Shipping\{Courier, SelfCollection};
use App\Models\ShippingMethod;
use Illuminate\Database\Seeder;


class ShippingMethodSeeder extends Seeder
{
    public function run(): void
    {
        ShippingMethod::create([
            'is_active' => true,
            'name' => 'Odbiór osobisty',
            'driver' => SelfCollection::key(),
        ]);

        ShippingMethod::create([
            'is_active' => true,
            'name' => 'Kurier',
            'driver' => Courier::key(),
            'cost' => '10.00',
        ]);
    }
}
