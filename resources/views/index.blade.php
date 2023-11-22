@extends('layouts.main')

@section('title', 'AgroSpot')

@section('content')
    <div id="div-main">
        <input type="checkbox" id="check">
        <label for="check">
            <i class="fas fa-bars" id="btn"></i>
            <i class="fas fa-times" id="cancel"></i>
        </label>
        <div id="div-sidebar">
            @guest
                <header><a href="{{ route('login') }}">Fazer login</a></header>
            @endguest
            @auth
                <header>Olá, {{ Str::title($user->name) }}</header>
            @endauth
            <ul>
                <li><a href="#">AGRICULTORES</a></li>
                <li><a href="#">FEIRAS</a></li>
            </ul>
        </div>
        
        <section>
            <div id="div-buscarProduto">
                <form action="{{route('index')}}" method="GET">
                    <input type="text" name="busca" id="busca" placeholder="Busque um produto...">
                    <input type="submit" value="Buscar" id="btn-buscar">
                </form>
            </div>
            
            
            <div id="div-container-produtos">
                @if($busca)
                    <h1>Produto pesquisado: {{ $busca }}</h1>
                @else
                    <h1>Produtos</h1>
                @endif
                @foreach ($produtos as $produto)
                    <div class="div-produto">
                        <div class="div-produto-img">
                            <a href="#"><img class="img-produto" src="/img/produtos/{{ $produto->image }}" alt="{{$produto->nome}}"></a>
                        </div>
                        <h3>{{ Str::title($produto->nome) }}</h3>
                        
                        @if ($produto->disponibilidade == 1)
                            <span>DISPONIVEL</span>
                        @else
                            <span>INDISPONIVEL</span>
                        @endif
                    </div>
                    @if ($busca)
                        <a id="limparPesquisa" href="{{ route('index') }}">Limpar pesquisa</a>
                    @endif
                @endforeach 
                
                @if(count($produtos) == 0 && $busca)
                   <p style="font-size: 20px; margin-bottom:10px; margin-left:15px;">O produto "{{$busca}}" não foi encontrado...</p>
                   <a id="limparPesquisa" href="{{ route('index') }}">Limpar pesquisa</a>
                @elseif(count($produtos) == 0)
                    <p>Não há produtos disponíveis!</p> 
                @endif
                
            </div>
        </section>
    </div>
@endsection