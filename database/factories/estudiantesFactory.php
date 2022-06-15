<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\estudiantes>
 */
class estudiantesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "codigo_estudiante" => $this->faker->unique()->numberBetween(10000, 99999),
            "nombre" => $this->faker->name,
            "carrera" => $this->faker->randomElement(["Ing. sistemas", "Administracion", "Ing. ambiental", "Ing. electronica", "Ing. mecanica"]),
        ];
    }
}
