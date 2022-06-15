<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up()
    {
        Schema::create("prestamos", function (Blueprint $table) {
            $table->id();
            $table->integer("ISBN");
            $table->integer("codigo_estudiante");
            $table->integer("estado"); //0 ya devuelto, 1 en prestamo
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists("prestamos");
    }
};
