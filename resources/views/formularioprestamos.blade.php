@extends("plantillas.plantilla")
@section("inicio")
    <div class="m-4">
        <form method="POST" action="{{route("registrarPrestamo")}}">
            @csrf
            <label class="p-3 text-zinc-600">ISBN</label>
            <div class="flex py-4">
                <select name="ISBN" class="js-example-basic-multiple ml-4 w-full border-b-2 border-b-emerald-500">
                    @foreach($libros as $libro)
                        <option value="{{$libro->ISBN}}">{{$libro->ISBN}} - {{$libro->titulo}}</option>
                    @endforeach
                </select>
            </div>
            <label class="p-3 text-zinc-600">Codigo de estudiante</label>
            <div class="flex py-4">
                <select name="codigo_estudiante" class="js-example-basic-multiple ml-4 w-full border-b-2 border-b-emerald-500">
                    @foreach($estudiantes as $estudiante)
                        <option value="{{$estudiante->codigo_estudiante}}">{{$estudiante->codigo_estudiante}}
                            - {{$estudiante->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit"
                    class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-full py-2 rounded-full font-bold">
                Registrar
            </button>
        </form>
    </div>
@endsection
