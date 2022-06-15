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
        //Validar que los campos sean requeridos
        $request->validate([
            'ISBN' => 'required',
            'codigo_estudiante' => 'required',
        ]);
        $prestamo = new prestamos();
        $prestamo->ISBN = $request->ISBN;
        $prestamo->codigo_estudiante = $request->codigo_estudiante;
        $prestamo->estado = 1;
        $prestamo->save();
        $libro = libros::all()->where("ISBN", "=", $request->ISBN)->first();
        $libro->stock = $libro->stock - 1;
        $libro->save();
        return redirect(route("listarPrestamos"))->with("prestamos", prestamos::where("estado", 1)->paginate(25));
    }
}
