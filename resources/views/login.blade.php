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
<form method="POST" action="{{route("validarUsuario")}}">
    @csrf
    <label>Usuario</label>
    <input name="usuario">
    <label>Password</label>
    <input name="password">
    <button type="submit">Loguearse</button>
</form>
</body>
</html>
