<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>
    <main>
        <div id="div-flash-msg">
            @if (session('msg'))
                <p class="msg"> {{ session('msg') }} </p>
            @endif
        </div>
        @yield('content')
    </main>
</body>
</html>