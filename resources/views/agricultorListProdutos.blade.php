<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard - List produtos</title>
</head>
<body>
    <div id="content-main">
        @foreach ($produtos as $produto)
            <div class="div-produtos-card-bd">
                {{-- <div class="div-card-img">
                    <img class="card-img" src="/img/produtos/{{$produto->image}}" alt="">
                </div> --}}
                <div class="card-details">
                    {{-- <span class="card-span">Tag 1</span>
                    <span class="card-span">Tag 2</span> --}}
                    <h3 class="card-nome">{{$produto->nome}}</h3>
                    <p class="descricao-produto">{{$produto->descricao}}</p>
                    <form action="/dashboard/removeProduto/{{$produto->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" value="{{$produto->id}}" id="btn_id">Remover</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>