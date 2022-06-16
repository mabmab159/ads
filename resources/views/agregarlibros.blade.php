@extends("plantillas.plantilla")
@section("inicio")
    <div class="m-4">
        <form method="GET" action="{{route("formularioLibroISBN")}}">
            @csrf
            <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="ISBN"
                   placeholder="Ingrese el ISBN del libro a registrar" min="1">
            @error("ISBN")
            <span class="text-red-500">El campo es obligatorio</span>
            @enderror
            <button type="submit"
                    class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-48 py-2 rounded-full font-bold">
                Validar ISBN
            </button>
        </form>
        <br>
        <form method="POST" action="{{route("registrarLibro")}}">
            @csrf
            <label class="p-3 text-zinc-600">ISBN</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="ISBN"
                           value="{{$ISBN}}" readonly>
                    @error("titulo")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="ISBN"
                           value="{{$libro->ISBN}}" readonly>
                    @error("titulo")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @endif
            </div>
            <label class="p-3 text-zinc-600">Titulo</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input class="w-64 border-b-2 border-b-emerald-500" name="titulo">
                    @error("titulo")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input class="w-64 border-b-2 border-b-emerald-500" name="titulo" value="{{$libro->titulo}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Autor</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input class="w-64 border-b-2 border-b-emerald-500" name="autor">
                    @error("autor")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input class="w-64 border-b-2 border-b-emerald-500" name="autor" value="{{$libro->autor}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Año de publicación</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="ano_publicacion">
                    @error("ano_publicacion")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="ano_publicacion"
                           value="{{$libro->ano_publicacion}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Editorial</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input class="w-64 border-b-2 border-b-emerald-500" name="editorial">
                    @error("editorial")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input class="w-64 border-b-2 border-b-emerald-500" name="editorial" value="{{$libro->editorial}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Numero de edición</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="numero_edicion">
                    @error("numero_edicion")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="numero_edicion"
                           value="{{$libro->numero_edicion}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Stock</label>
            <div class="flex py-4">
                <input type="number" class="w-64 border-b-2 border-b-emerald-500" name="stock" min="1">
                @error("stock")
                <span class="text-red-500">El campo es obligatorio</span>
                @enderror
            </div>
            <button type="submit"
                    class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-full py-2 rounded-full font-bold">
                Registrar
            </button>
        </form>
    </div>
@endsection
