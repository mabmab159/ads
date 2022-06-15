<?php

namespace App\Http\Controllers;

use App\Models\libros;
use App\Models\prestamos;
use Illuminate\Http\Request;

class prestamosController extends Controller
{
    public function listarPrestamos()
    {
        $listado = prestamos::all()->where("estado", 1);
        $libro = libros::where("");
        $estudiante =
        return view("listadoprestamos")->with("prestamos", $listado)->with("libro", $libro)->with("prestamo", $estudiante);
    }
}
