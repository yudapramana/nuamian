<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'number' => 'ELM-' . fake()->unique()->numberBetween(0,999999999),
            'address' => fake()->streetAddress() . ', '. fake()->city,
            'gender' => fake()->randomElement(['male', 'female']),
            'date_of_birth' => fake()->dateTime(),
        ];
    }
}
