<?php

namespace Database\Seeders;


use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'email' => 'root@admin',
        ]);

        User::factory(3)->admin()->create();

        User::factory(15)->create();
    }
}
