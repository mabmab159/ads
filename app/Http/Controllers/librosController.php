<?php

namespace App\Http\Controllers;

use App\Models\libros;
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
    }//
}
