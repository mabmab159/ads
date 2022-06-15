<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\libros>
 */
class librosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "titulo" => $this->faker->name,
            "ISBN" => $this->faker->unique()->numberBetween(10000, 99999),
            "autor" => $this->faker->name,
            "ano_publicacion" => $this->faker->year,
            "editorial" => $this->faker->randomElement(["ANAYA MULTIMEDIA",
                "PRENTICE-HALL INTERNATIONAL EDITION",
                "Universidad de Castilla La Mancha",
                "PEGUIN RANDOM HOUSE GRUPO S.A ",
                "CRC Press"]),
            "numero_edicion" => $this->faker->numberBetween(1, 10),
            "stock" => $this->faker->numberBetween(1, 10),
        ];
    }
}
