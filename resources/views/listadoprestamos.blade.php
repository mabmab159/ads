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
                <button type="submit"
                        class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-64 py-2 rounded-full font-bold">
                    Buscar
                </button>
            </form>
        </div>
        <table class="border-collapse border border-slate-500 w-full text-center">
            <thead>
            <tr class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white">
                <th class="border border-slate-600 p-2">Id</th>
                <th class="border border-slate-600 p-2">ISBN</th>
                <th class="border border-slate-600 p-2">Codigo_estudiante</th>
                <th class="border border-slate-600 p-2">Estado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($prestamos as $prestamo)
                <tr>
                    <td class="border border-slate-600 p-2">{{$prestamo->id}}</td>
                    <td class="border border-slate-600 p-2">{{$prestamo->ISBN}}</td>
                    <td class="border border-slate-600 p-2">{{$prestamo->codigo_estudiante}}</td>
                    <td class="border border-slate-600 p-2">{{$prestamo->estado}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection
