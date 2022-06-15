<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>
<div class="container mx-auto">
    <div class="grid grid-cols-4">
        <div class="col-span-4">
            <div class="flex justify-end bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-full p-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-6 h-6 stroke-white mr-2"
                     viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                <p>{{ucwords(auth()->user()->nombre." ".auth()->user()->apellidos)}}</p>
            </div>
        </div>
        <div class="col-span-1">
            <ul>
                <a href="{{route("inicio")}}">
                    <li class="border-r-2 border-l-2 border-b-2 border-emerald-500 py-4 text-center hover:bg-emerald-500 hover:text-white">
                        Inicio - Busqueda de libros
                    </li>
                </a>
                @if(auth()->user()->cargo=="recepcionista")
                    <a href="{{route("listarPrestamos")}}">
                        <li class="border-r-2 border-l-2 border-b-2 border-emerald-500 py-4 text-center hover:bg-emerald-500 hover:text-white">
                            Devolución de libros
                        </li>
                    </a>
                    <a href="{{route("formularioPrestamos")}}">
                        <li class="border-r-2 border-l-2 border-b-2 border-emerald-500 py-4 text-center hover:bg-emerald-500 hover:text-white">
                            Prestamo de libros
                        </li>
                    </a>
                @endif
                @if(auth()->user()->cargo=="admin")
                    <a href="">
                        <li class="border-r-2 border-l-2 border-b-2 border-emerald-500 py-4 text-center hover:bg-emerald-500 hover:text-white">
                            Registrar libro
                        </li>
                    </a>
                    <a href="">
                        <li class="border-r-2 border-l-2 border-b-2 border-emerald-500 py-4 text-center hover:bg-emerald-500 hover:text-white">
                            Eliminar libro
                        </li>
                    </a>
                @endif
                <a href="{{route("logout")}}">
                    <li class=" border-r-2 border-l-2 border-b-2 border-emerald-500 py-4 text-center hover:bg-emerald-500
                   hover:text-white">
                        Salir
                    </li>
                </a>
            </ul>
        </div>
        <div class="col-span-3">
            @yield("inicio")
        </div>
    </div>
</div>
<script src="{{asset('js/test.js')}}"></script>
</body>
</html>
