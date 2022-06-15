@extends("plantillas.plantilla")
@section("inicio")
    <div class="m-4">
        <div class="my-4">
            <form action="{{route("filtrarLibrosPrestamos")}}" method="POST">
                @csrf
                <select class="w-32 border-2 border-emerald-500" name="opcionFiltro">
                    <option value="ISBN">ISBN</option>
                    <option value="codigoEstudiante">Codigo estudiante</option>
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
            {{$prestamos->links()}}
        </div>
        <table class="border-collapse border border-slate-500 w-full text-center">
            <thead>
            <tr class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white">
                <th class="border border-slate-600 p-2">Id</th>
                <th class="border border-slate-600 p-2">ISBN</th>
                <th class="border border-slate-600 p-2">Titulo</th>
                <th class="border border-slate-600 p-2">Codigo estudiante</th>
                <th class="border border-slate-600 p-2">Estudiante</th>
                <th class="border border-slate-600 p-2">F. de inicio</th>
                <th class="border border-slate-600 p-2">F. max devolución</th>
                <th class="border border-slate-600 p-2">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @if(count($prestamos)>0)
                @foreach($prestamos as $key => $prestamo)
                    <tr>
                        <td class="border border-slate-600 p-2">{{$prestamo->id}}</td>
                        <td class="border border-slate-600 p-2">{{$prestamo->ISBN}}</td>
                        <td class="border border-slate-600 p-2">{{\App\Models\libros::all()->where("ISBN","=",$prestamos[$key]->ISBN)->first()->titulo}}</td>
                        <td class="border border-slate-600 p-2">{{$prestamo->codigo_estudiante}}</td>
                        <td class="border border-slate-600 p-2">{{\App\Models\estudiantes::all()->where("codigo_estudiante","=",$prestamos[$key]->codigo_estudiante)->first()->nombre}}</td>
                        <td class="border border-slate-600 p-2">{{$prestamo->created_at->format('d/m/Y')}}</td>
                        <td class="border border-slate-600 p-2">{{date("d/m/Y",strtotime(date($prestamo->created_at)."+5 days")) }}</td>
                        <td class="border border-slate-600 p-2">
                            <form method="POST"
                                  onsubmit="return confirm('Desea confirmar la devolución del libro {{\App\Models\libros::all()->where("ISBN","=",$prestamos[$key]->ISBN)->first()->titulo}}')"
                                  action="{{route("devolverLibro",$prestamo->id)}}">
                                @csrf
                                <input type="submit" value="Devolver"
                                       class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-64 py-2 rounded-full font-bold"/>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8" class="border border-slate-600 p-2">No se encontro resultados para su busqueda.</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>



@endsection
