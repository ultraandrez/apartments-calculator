<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ApartmentMortgage>
 */
class ApartmentMortgageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'apartment_id' => $this->faker->numberBetween(1, 10),
            'mortgage_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
