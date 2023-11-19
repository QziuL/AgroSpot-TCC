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
            <div id="div-container-produtos">
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
                @endforeach                
            </div>
        </section>
    </div>
@endsection