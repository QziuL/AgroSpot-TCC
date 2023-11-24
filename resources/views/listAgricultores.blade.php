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
                <li><a href="{{ route('listar.feiras') }}">FEIRAS</a></li>
            </ul>
        </div>
        
        <section>       
            <div id="div-container-agricultores">
                @php
                    $aux2 = 0;
                @endphp
                @foreach ($userAgricultores as $agricultor)
                
                    <div class="div-agricultor">
                        <div>
                            <h3>{{ Str::title($agricultor[$aux]->name) }}</h3>
                        </div>
                        <div>
                            <div>
                                <span>Localização: 
                                    <br>
                                    {{ Str::title($agricultores[$aux2]->cidade) }}
                                </span>
                            </div>
                            <div>
                                <span>Nome da propriedade: 
                                    <br>
                                    {{ Str::title($agricultores[$aux2]->nome_propriedade) }}
                                </span>
                            </div>
                        </div>
                        <div class="div-button">
                            <a href="#" class="button-ver-perfil">Ver perfil</a>
                        </div>
                    </div>
                    @php
                        $aux2++;
                    @endphp
                @endforeach 
            </div>
        </section>
    </div>
@endsection