<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/dashboardAgricultor.css">

    <script src="https://kit.fontawesome.com/4b10770594.js" crossorigin="anonymous"></script>
</head>
<body>
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div id="sidebar">
        <header>Olá, {{ Str::title($user->name) }}</header>
        <ul>
            <li><a href="{{ route('embreve') }}">PERFIL</a></li>
            <li><a href="{{ route('embreve') }}">VINCULAR-SE A FEIRA</a></li>
            <li><a href="{{route('agricultor.dashboard')}}">PAINEL</a></li>
            <li><a href="{{route('initial')}}">INICIO</a></li>
            
        </ul>
    </div>

    <div id="content-main">
        @yield('content')
    </div>
    
</body>
</html>