<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>AgroSpot - Adicionar produtos</title>

    <link rel="stylesheet" href="/css/cardStyle.css">

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
            <li><a href="#">HOME</a></li>
            <li><a href="#">PERFIL</a></li>
            <li><a href="{{route('listProdutos')}}">MEUS PRODUTOS</a></li>
            <li><a href="#">FEIRAS</a></li>
        </ul>
    </div>

    <div id="content-main">
        @foreach ($produtos as $produto)
            <div class="div-produtos-card-bd">
                <div class="div-card-img">
                    <img class="card-img" src="/img/produtos/{{$produto->image}}" alt="">
                </div>
                <div class="card-details">
                    <h3 class="card-nome">{{$produto->nome}}</h3>
                    <p class="descricao-produto">{{$produto->descricao}}</p>
                    @if(count($produtosAdicionado)>0)
                        @if ($aux<count($produtosAdicionado))
                            @if ($produto->id != $produtosAdicionado[$aux] )
                                <form action="/dashboard/addProduto/{{$produto->id}}" method="POST">
                                    @csrf
                                    <button type="submit" value="{{$produto->id}}" id="btn_id">Adicionar</button>
                                </form>
                            @else
                                <button type="submit" disabled>ADICIONADO</button>
                                @php
                                    $aux++;
                                @endphp
                            @endif
                        @else
                            <form action="/dashboard/addProduto/{{$produto->id}}" method="POST">
                                @csrf
                                <button type="submit" value="{{$produto->id}}" id="btn_id">Adicionar</button>
                            </form>
                        @endif    
                    @else
                        <form action="/dashboard/addProduto/{{$produto->id}}" method="POST">
                            @csrf
                            <button type="submit" value="{{$produto->id}}" id="btn_id">Adicionar</button>
                        </form>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>