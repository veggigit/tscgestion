<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin-app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion Tu sindicato consorcio</title>
</head>
<body>
@include('admin.partials.header')
@yield('content')

<script src="{{asset('js/admin-app.js')}}"></script>
</body>
</html>