<?php

namespace App\Http\Controllers;

use App\Models\libros;
use App\Models\prestamos;
use Illuminate\Http\Request;

class librosController extends Controller
{
    public function filtrarLibros(Request $request)
    {
        if ($request->opcionFiltro == "titulo") {
            $texto = "%" . $request->filtrado . "%";
            return view("inicio")->with("libros", libros::where("titulo", "like", $texto)->paginate(25));
        } else if ($request->opcionFiltro == "ISBN") {
            $texto = "%" . $request->filtrado . "%";
            return view("inicio")->with("libros", libros::where("ISBN", "like", $texto)->paginate(25));
        } else {
            $texto = "%" . $request->filtrado . "%";
            return view("inicio")->with("libros", libros::where("autor", "like", $texto)->paginate(25));
        }
    }

    public function devolverLibro($id)
    {
        $prestamo = prestamos::all()->where("id", $id)->first();
        $prestamo->estado = 0;
        $prestamo->save();
        return redirect(route("listarPrestamos"));
    }

    public function filtrarLibrosPrestamos(Request $request)
    {
        if ($request->opcionFiltro == "ISBN") {
            $texto = "%" . $request->filtrado . "%";
            return view("listadoprestamos")->with("prestamos", prestamos::where("ISBN", "like", $texto)->paginate(25));
        } else {
            $texto = "%" . $request->filtrado . "%";
            return view("listadoprestamos")->with("prestamos", prestamos::where("codigo_estudiante", "like", $texto)->paginate(25));
        }
    }
}
