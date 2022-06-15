<?php

namespace App\Http\Controllers;

use App\Models\libros;
use App\Models\prestamos;
use Illuminate\Http\Request;

class prestamosController extends Controller
{
    public function listarPrestamos()
    {
        $listado = prestamos::where("estado", 1)->paginate(25);
        return view("listadoprestamos")->with("prestamos", $listado);
    }
}
