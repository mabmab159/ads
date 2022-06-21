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
})->name("inicio")->middleware("verificar");

Route::post("/inicio", [librosController::class, "filtrarLibros"])->name("filtrarLibros")->middleware("verificar");

Route::get("/prestamos", [prestamosController::class, "listarPrestamos"])->name("listarPrestamos")->middleware("verificar");

Route::post("/devolverLibro/{libros}", [librosController::class, "devolverLibro"])->name("devolverLibro")->middleware("verificar");

Route::post("/prestamos", [librosController::class, "filtrarLibrosPrestamos"])->name("filtrarLibrosPrestamos")->middleware("verificar");

Route::get("/logout", [login::class, "logout"])->name("logout");

Route::get("/registrarPrestamo", [prestamosController::class, "formularioPrestamos"])->name("formularioPrestamos")->middleware("verificar");

Route::post("/registrarPrestamo", [prestamosController::class, "registrarPrestamo"])->name("registrarPrestamo")->middleware("verificar");

Route::get("/validarISBN", [librosController::class, "formularioLibroISBN"])->name("formularioLibroISBN")->middleware("verificar");

Route::get("/validarEliminarISBN", [librosController::class, "formularioEliminarLibroISBN"])->name("formularioEliminarLibroISBN")->middleware("verificar");

Route::get("/registrarLibro", [librosController::class, "formularioLibro"])->name("formularioLibro")->middleware("verificar");

Route::post("/registrarLibro", [librosController::class, "registrarLibro"])->name("registrarLibro")->middleware("verificar");

Route::get("/eliminarLibro", [librosController::class, "formularioEliminarLibro"])->name("formularioEliminarLibro")->middleware("verificar");

Route::post("/eliminarLibro", [librosController::class, "eliminarLibro"])->name("eliminarLibro")->middleware("verificar");
