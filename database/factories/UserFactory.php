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


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'lang' => 'pl',
            'role' => UserType::customer(),
            'email_verified_at' => now(),
            'password' => static::$password,
            'remember_token' => Str::random(10),
        ];
    }


    public function admin(): static
    {
        return $this->state( fn(array $attributes) => [
            'role' => UserType::admin(),
        ]);
    }
}
