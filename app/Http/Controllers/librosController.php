<?php

namespace App\Http\Controllers;

use App\Models\libros;
use App\Models\prestamos;
use Illuminate\Http\Request;

class librosController extends Controller
{
    public function filtrarLibros(Request $request)
    {
        $request->validate([
            "filtrado" => "required"
        ]);
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
        $prestamo->delete();
        $libro = libros::all()->where("ISBN", "=", $prestamo->ISBN)->first();
        $libro->stock = $libro->stock + 1;
        $libro->save();
        return redirect(route("listarPrestamos"));
    }

    public function filtrarLibrosPrestamos(Request $request)
    {
        // Agregar campos requeridos
        $request->validate([
            "filtrado" => "required"
        ]);
        if ($request->opcionFiltro == "ISBN") {
            $texto = "%" . $request->filtrado . "%";
            return view("listadoprestamos")->with("prestamos", prestamos::where("ISBN", "like", $texto)->paginate(25));
        } else {
            $texto = "%" . $request->filtrado . "%";
            return view("listadoprestamos")->with("prestamos", prestamos::where("codigo_estudiante", "like", $texto)->paginate(25));
        }
    }

    public function formularioLibro()
    {
        return view("agregarlibros")->with("libro", null)->with("ISBN", null);
    }

    public function formularioLibroISBN(Request $request)
    {
        $request->validate([
            "ISBN" => "required"
        ]);
        $libro = libros::all()->where("ISBN", "=", $request->ISBN)->first();
        return view("agregarlibros")->with("libro", $libro)->with("ISBN", $request->ISBN);
    }

    public function formularioEliminarLibroISBN(Request $request)
    {
        $request->validate([
            "ISBN" => "required"
        ]);
        $libro = libros::all()->where("ISBN", "=", $request->ISBN)->first();
        return view("eliminarlibros")->with("libro", $libro)->with("ISBN", $request->ISBN);
    }

    public function formularioEliminarLibro()
    {
        return view("eliminarlibros")->with("libro", null)->with("ISBN", null);
    }

    public function registrarLibro(Request $request)
    {
        $request->validate([
            "ISBN" => "required",
            "titulo" => "required",
            "autor" => "required",
            "ano_publicacion" => "required",
            "editorial" => "required",
            "numero_edicion" => "required",
            "stock" => "required",
        ]);
        $libro = libros::all()->where("ISBN", "=", $request->ISBN)->first();
        if (is_null($libro)) {
            $libro = new libros();
            $libro->ISBN = $request->ISBN;
            $libro->titulo = $request->titulo;
            $libro->autor = $request->autor;
            $libro->ano_publicacion = $request->ano_publicacion;
            $libro->editorial = $request->editorial;
            $libro->numero_edicion = $request->numero_edicion;
            $libro->stock = $request->stock;
            $libro->save();
            return redirect(route("inicio"))->with("libros", libros::paginate(25));
        }
        $libro->stock = $libro->stock + $request->stock;
        $libro->save();
        return redirect(route("inicio"))->with("libros", libros::paginate(25));
    }


    public function eliminarLibro(Request $request)
    {
        $libro = libros::all()->where("ISBN", "=", $request->ISBN)->first();
        $libro->stock = $libro->stock - $request->stock;
        $libro->save();
        return redirect(route("inicio"))->with("libros", libros::paginate(25));
    }
}
