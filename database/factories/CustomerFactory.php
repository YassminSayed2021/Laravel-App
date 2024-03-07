<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Customer_name' => fake()->name(),
            'Email' => fake()->unique()->safeEmail(),
            'Birth_Date' => fake()->date(),
            'gender' => fake()->randomElement(['male', 'female']),
            'password' => fake()->password()
        ];
    }
}
