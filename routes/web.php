<?php

use App\Http\Controllers\librosController;
use App\Http\Controllers\login;
use App\Http\Controllers\prestamosController;
use App\Models\libros;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name("login");

Route::post("/", [login::class, "login"])->name("validarUsuario");

Route::get("/inicio", function () {
    return view("inicio")->with("libros", libros::paginate(25));
})->name("inicio");

Route::post("/inicio", [librosController::class, "filtrarLibros"])->name("filtrarLibros");

Route::get("/prestamos", [prestamosController::class, "listarPrestamos"])->name("listarPrestamos");

Route::post("/devolverLibro/{libros}", [librosController::class, "devolverLibro"])->name("devolverLibro");

Route::post("/prestamos", [librosController::class, "filtrarLibrosPrestamos"])->name("filtrarLibrosPrestamos");

Route::get("/logout", [login::class, "logout"])->name("logout");

Route::get("/registrarPrestamo", [prestamosController::class, "formularioPrestamos"])->name("formularioPrestamos");

Route::post("/registrarPrestamo", [prestamosController::class, "registrarPrestamo"])->name("registrarPrestamo");

Route::get("/validarISBN", [librosController::class, "formularioLibroISBN"])->name("formularioLibroISBN");

Route::get("/validarEliminarISBN", [librosController::class, "formularioEliminarLibroISBN"])->name("formularioEliminarLibroISBN");

Route::get("/registrarLibro", [librosController::class, "formularioLibro"])->name("formularioLibro");

Route::post("/registrarLibro", [librosController::class, "registrarLibro"])->name("registrarLibro");

Route::get("/eliminarLibro", [librosController::class, "formularioEliminarLibro"])->name("formularioEliminarLibro");

Route::post("/eliminarLibro", [librosController::class, "eliminarLibro"])->name("eliminarLibro");
