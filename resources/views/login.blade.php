<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container mx-auto max-w-md p-8 border-4 border-r-4 border-b-4 border-r-emerald-500 border-b-emerald-500">
    <h2 class="text-4xl font-bold text-center">Welcome</h2>
    <form method="POST" action="{{route("validarUsuario")}}">
        @csrf
        <label class="p-3 text-zinc-600">Usuario</label>
        <div class="flex py-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" class="w-8 h-8 stroke-emerald-500 mr-2"
                 viewBox="0 0 24 24"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <input name="usuario" class="w-full border-b-2 border-b-emerald-500">
        </div>
        <label class="p-3 text-zinc-600">Password</label>
        <div class="flex py-4">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                 class="w-8 h-8 stroke-emerald-500 mr-2"
                 stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
            <input name="password" type="password" class="w-full border-b-2 border-b-emerald-500">
        </div>
        <button type="submit"
                class="bg-gradient-to-r from-emerald-500 to-emerald-600 text-white w-full py-2 rounded-full font-bold">
            Loguearse
        </button>
    </form>
</div>
</body>
</html>
