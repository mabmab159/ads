<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\prestamos>
 */
class prestamosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "ISBN" => $this->faker->numberBetween(10000, 10100),
            "codigo_estudiante" => $this->faker->numberBetween(10000, 10100),
            "estado" => $this->faker->randomElement([0, 1]),
        ];
    }
}
