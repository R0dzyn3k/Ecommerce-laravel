<?php

namespace Database\Seeders;


use App\Models\Admin;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Admin::factory()->create([
            'name' => 'Root',
            'email' => 'root@admin',
        ]);

        Admin::factory(3)->create();
    }
}
