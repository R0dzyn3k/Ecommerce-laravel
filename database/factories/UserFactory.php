<?php

namespace Database\Factories;


use App\Enums\UserType;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static string $password = 'admin';


    protected $model = Admin::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'role' => UserType::customer(),
            'email_verified_at' => now(),
            'password' => static::$password,
            'remember_token' => Str::random(10),
        ];
    }
}
