@extends("plantillas.plantilla")
@section("inicio")
    <div class="m-4">
        <form method="GET" action="{{route("formularioEliminarLibroISBN")}}">
            @csrf
            <div class="flex">
                <input type="number" class="w-full border-b-2 border-b-emerald-500" name="ISBN"
                       placeholder="Ingrese el ISBN del libro a eliminar" min="1">
                @error("ISBN")
                <span class="text-red-500">El campo es obligatorio</span>
                @enderror
                <button type="submit"
                        class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-48 py-2 rounded-full font-bold">
                    Validar ISBN
                </button>
            </div>
        </form>
        <br>
        <form method="POST" action="{{route("eliminarLibro")}}"
              onsubmit="return confirm('Esta seguro de eliminar las copias')">
            @csrf
            <label class="p-3 text-zinc-600">ISBN</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input type="number" class="w-full border-b-2 border-b-emerald-500" name="ISBN"
                           value="{{$ISBN}}" readonly>
                    @error("titulo")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input type="number" class="w-full border-b-2 border-b-emerald-500" name="ISBN"
                           value="{{$libro->ISBN}}" readonly>
                    @error("titulo")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @endif
            </div>
            <label class="p-3 text-zinc-600">Titulo</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input class="w-full border-b-2 border-b-emerald-500" name="titulo" readonly>
                    @error("titulo")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input class="w-full border-b-2 border-b-emerald-500" name="titulo" value="{{$libro->titulo}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Autor</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input class="w-full border-b-2 border-b-emerald-500" name="autor" readonly>
                    @error("autor")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input class="w-full border-b-2 border-b-emerald-500" name="autor" value="{{$libro->autor}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Año de publicación</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input type="number" class="w-full border-b-2 border-b-emerald-500" name="ano_publicacion" readonly>
                    @error("ano_publicacion")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input type="number" class="w-full border-b-2 border-b-emerald-500" name="ano_publicacion"
                           value="{{$libro->ano_publicacion}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Editorial</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input class="w-full border-b-2 border-b-emerald-500" name="editorial" readonly>
                    @error("editorial")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input class="w-full border-b-2 border-b-emerald-500" name="editorial" value="{{$libro->editorial}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Numero de edición</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <input type="number" class="w-full border-b-2 border-b-emerald-500" name="numero_edicion" readonly>
                    @error("numero_edicion")
                    <span class="text-red-500">El campo es obligatorio</span>
                    @enderror
                @else
                    <input type="number" class="w-full border-b-2 border-b-emerald-500" name="numero_edicion"
                           value="{{$libro->numero_edicion}}"
                           readonly>
                @endif
            </div>
            <label class="p-3 text-zinc-600">Stock</label>
            <div class="flex py-4">
                @if(is_null($libro))
                    <select name="stock" class="js-example-basic-multiple ml-4 w-full border-b-2 border-b-emerald-500">
                        <option value="0">0</option>
                    </select>
                @else
                    <select name="stock" class="js-example-basic-multiple ml-4 w-full border-b-2 border-b-emerald-500">
                        @for($i=$libro->stock;$i>=0;$i--)
                            @if($i==$libro->stock)
                                <option value="{{$i}}" selected>{{$i}}</option>
                            @else
                                <option value="{{$i}}">{{$i}}</option>
                            @endif
                        @endfor
                    </select>
                @endif
            </div>
            <button type="submit"
                    class="bg-gradient-to-r from-red-500 to-red-600 text-white w-full py-2 rounded-full font-bold">
                Eliminar
            </button>
        </form>
    </div>
@endsection
