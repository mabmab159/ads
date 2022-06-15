@extends("plantillas.plantilla")
@section("inicio")
    <div class="m-4">
        <div class="my-4">
            <form action="{{route("filtrarLibros")}}" method="POST">
                @csrf
                <select class="w-32 border-2 border-emerald-500" name="opcionFiltro">
                    <option value="titulo">Titulo</option>
                    <option value="ISBN">ISBN</option>
                    <option value="autor">Autor</option>
                </select>
                <input class="w-64 border-b-2 border-b-emerald-500" name="filtrado">
                @foreach ($errors->all() as $error)
                    <span class="text-red-500">{{ $error }}</span>
                @endforeach
                <button type="submit"
                        class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-64 py-2 rounded-full font-bold">
                    Buscar
                </button>
            </form>
        </div>
        <div class="my-4">
            {{$libros->links()}}
        </div>

        <table class="border-collapse border border-slate-500 w-full text-center">
            <thead>
            <tr class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white">
                <th class="border border-slate-600 p-2">Id</th>
                <th class="border border-slate-600 p-2">Titulo</th>
                <th class="border border-slate-600 p-2">ISBN</th>
                <th class="border border-slate-600 p-2">Autor</th>
                <th class="border border-slate-600 p-2">Año de publicación</th>
                <th class="border border-slate-600 p-2">Editorial</th>
                <th class="border border-slate-600 p-2">Numero edición</th>
                <th class="border border-slate-600 p-2">Stock</th>
            </tr>
            </thead>
            <tbody>
            @if(count($libros)>0)
                @foreach($libros as $libro)
                    <tr>
                        <td class="border border-slate-600 p-2">{{$libro->id}}</td>
                        <td class="border border-slate-600 p-2">{{$libro->titulo}}</td>
                        <td class="border border-slate-600 p-2">{{$libro->ISBN}}</td>
                        <td class="border border-slate-600 p-2">{{$libro->autor}}</td>
                        <td class="border border-slate-600 p-2">{{$libro->ano_publicacion}}</td>
                        <td class="border border-slate-600 p-2">{{$libro->editorial}}</td>
                        <td class="border border-slate-600 p-2">{{$libro->numero_edicion}}</td>
                        <td class="border border-slate-600 p-2">{{$libro->stock}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="border border-slate-600 p-2" colspan="8">No se encontro resultados para su busqueda.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endsection
