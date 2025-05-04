<?php

namespace Database\Seeders;


use App\Drivers\Billing\{BankTransfer, Cash};
use App\Models\BillingMethod;
use Illuminate\Database\Seeder;


class BillingMethodSeeder extends Seeder
{
    public function run(): void
    {
        BillingMethod::create([
            'is_active' => true,
            'name' => 'Płatność przy odbiorze',
            'driver' => Cash::key(),
        ]);


        BillingMethod::create([
            'is_active' => true,
            'name' => 'Przelew bankowy',
            'driver' => BankTransfer::key(),
        ]);
    }
}
