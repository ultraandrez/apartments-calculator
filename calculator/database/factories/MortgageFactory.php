<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mortgage>
 */
class MortgageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'rate' => $this->faker->numberBetween(1, 100),
            'max_years' => $this->faker->numberBetween(1, 20),
            'initial_fee' => $this->faker->numberBetween(1, 100)
        ];
    }
}
