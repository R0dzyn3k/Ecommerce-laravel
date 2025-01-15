<?php

namespace Database\Seeders;


use App\Models\Tax;
use Illuminate\Database\Seeder;


class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $taxes = [
            ['percentage' => 0],
            ['percentage' => 5],
            ['percentage' => 8],
            ['percentage' => 23],
        ];

        foreach ($taxes as $tax) {
            Tax::create(['percentage' => $tax['percentage']]);
        }
    }
}
