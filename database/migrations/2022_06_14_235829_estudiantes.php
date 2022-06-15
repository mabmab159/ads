<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create("estudiantes", function (Blueprint $table) {
            $table->id();
            $table->integer("codigo_estudiante");
            $table->string("nombre");
            $table->string("carrera");
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists("estudiantes");
    }
};
