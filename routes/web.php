<?php

use App\Http\Controllers\librosController;
use App\Http\Controllers\login;
use App\Models\libros;
use http\Env\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
})->name("login");

Route::post("/", [login::class, "login"])->name("validarUsuario");

Route::get("/inicio", function () {
    return view("inicio")->with("libros", libros::paginate(25));
})->name("inicio");

Route::post("/inicio", [librosController::class, "filtrarLibros"])->name("filtrarLibros");


Route::get("/prestamos", [\App\Http\Controllers\prestamosController::class, "listarPrestamos"])->name("listarPrestamos");
