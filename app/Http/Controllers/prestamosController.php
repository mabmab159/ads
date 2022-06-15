<?php

namespace App\Http\Controllers;

use App\Models\estudiantes;
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

    public function formularioPrestamos()
    {
        return view("formularioprestamos")->with("libros", libros::all()->where("stock", ">", 0))->with("estudiantes", estudiantes::all());
    }

    public function registrarPrestamo(Request $request)
    {
        $prestamo = new prestamos();
        $prestamo->ISBN = $request->ISBN;
        $prestamo->codigo_estudiante = $request->codigo_estudiante;
        $prestamo->estado = 1;
        $prestamo->save();
        //Hace falta reducir en uno el stock del libro
        return redirect(route("listarPrestamos"))->with("prestamos", prestamos::where("estado", 1)->paginate(25));
    }
}
