<?php

namespace Database\Seeders;

use App\Models\estudiantes;
use App\Models\usuarios;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        usuarios::factory()->create([
            "nombre" => "miguel",
            "apellidos" => "berrio",
            "usuario" => "m@m",
            "password" => Hash::make("123"),
        ]);

        usuarios::factory()->create([
            "nombre" => "luis",
            "apellidos" => "zapata",
            "usuario" => "l@l",
            "cargo" => "admin",
            "password" => Hash::make("123"),
        ]);

        estudiantes::factory(100)->create();

    }
}
