@extends('layouts.main')

@section('title', 'AgroSpot - Agricultores')

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
                <li><a href="#">FEIRAS</a></li>
            </ul>
        </div>
        
        <section>       
            <div id="div-container-agricultores">
                @foreach ($userAgricultores as $agricultor)
                    <div class="div-agricultor">
                        <h3>{{ Str::title($agricultor[$aux]->name) }}</h3>
                        <div>
                            <span>{{ $agricultores[$aux]->cidade }}</span>
                            <div class="div-button">
                                <a href="#" class="button-ver-perfil">Ver perfil</a>
                            </div>
                        </div>
                        <div>
                            <span>{{ $agricultores[$aux]->nome_propriedade }}</span>
                @endforeach 
            </div>
        </section>
    </div>
@endsection