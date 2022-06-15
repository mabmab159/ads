<?php

namespace Database\Seeders;

use App\Models\estudiantes;
use App\Models\libros;
use App\Models\prestamos;
use App\Models\usuarios;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder2 extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        prestamos::factory(100)->create();

        libros::factory(100)->create();
    }
}
