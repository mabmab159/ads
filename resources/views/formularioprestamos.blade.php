@extends("plantillas.plantilla")
@section("inicio")
    <div class="m-4">
        <form method="POST" action="{{route("validarUsuario")}}">
            @csrf
            <label class="p-3 text-zinc-600">ISBN</label>
            <div class="flex py-4">
                <input name="usuario" class="ml-4 w-full border-b-2 border-b-emerald-500">
            </div>
            <label class="p-3 text-zinc-600">Codigo de estudiante</label>
            <div class="flex py-4">
                <input name="password" class="ml-4 w-full border-b-2 border-b-emerald-500">
            </div>
            <button type="submit"
                    class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-full py-2 rounded-full font-bold">
                Registrar
            </button>
        </form>
    </div>
@endsection
