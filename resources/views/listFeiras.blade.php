@extends('layouts.main')

@section('title', 'AgroSpot - Feiras')

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
                <li><a href="{{ route('listar.agricultores') }}">AGRICULTORES</a></li>
                <li><a href="{{ route('listar.feiras') }}">FEIRAS</a></li>
            </ul>
        </div>
        
        <section>
            <div id="div-buscarProduto">
                <form action="{{ route('listar.feiras') }}" method="GET">
                    <input type="text" name="busca" id="busca" placeholder="Busque uma feira...">
                    <input type="submit" value="Buscar" id="btn-buscar">
                </form>
            </div>
            
            
            <div id="div-container-produtos">
                @if($busca)
                    <h1>Feira pesquisada: {{ $busca }}</h1>
                @else
                    <h1>Feiras</h1>
                @endif
                @foreach ($feiras as $feira)
                    <div class="div-produto">
                        {{-- <div class="div-produto-img">
                            <a href="#"><img class="img-produto" src="/img/produtos/{{ $produto->image }}" alt="{{$produto->nome}}"></a>
                        </div> --}}
                        <div>
                            <h3>{{ Str::title($feira->nome) }}</h3>
                        </div>
                        <div>
                            <div>
                                <span>Endereço: {{ $feira->cidade }}, {{ $feira->cep }}</span>
                            </div>
                            <div>
                                <span>Descrição: {{ $feira->descricao }}</span>
                            </div>
                        </div>
                        
                    </div>
                    @if ($busca)
                        <a id="limparPesquisa" href="{{ route('index') }}">Limpar pesquisa</a>
                    @endif
                @endforeach 
                
                @if(count($feiras) == 0 && $busca)
                   <p style="font-size: 20px; margin-bottom:10px; margin-left:15px;">A feira "{{$busca}}" não foi encontrada...</p>
                   <a id="limparPesquisa" href="{{ route('listar.feiras') }}">Limpar pesquisa</a>
                @elseif(count($feiras) == 0)
                    <p>Não há feiras disponíveis!</p> 
                @endif
                
            </div>
        </section>
    </div>
@endsection