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
            <div id="div-buscar">
                <form action="{{ route('listar.agricultores') }}" method="GET">
                    <input type="text" name="busca" id="busca" placeholder="Busque um agricultor...">
                    <input type="submit" value="Buscar" id="btn-buscar">
                </form>
            </div>

            <div id="div-container-agricultores">
                @if($busca)
                    <h1>Agricultor pesquisado: {{ $busca }}</h1>

                    @foreach ($userAgricultores as $userAgricultor)
                        <div class="div-agricultor">
                            
                            <div>
                                <h3>{{ Str::title($userAgricultor->name) }}</h3>
                            </div>
                            
                        </div>
                        @if ($busca)
                            <a id="limparPesquisa" href="{{ route('listar.agricultores') }}">Limpar pesquisa</a>
                        @endif
                    @endforeach

                @else
                    <h1>Agricultores</h1>

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
                                    <span>Endereço: 
                                        <br>
                                        {{ Str::title($agricultores[$aux2]->cidade) }}, {{$agricultores[$aux2]->cep}}
                                    </span>
                                </div>
                                <br>
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
                @endif
                
                
                @if(count($userAgricultores) == 0 && $busca)
                   <p style="font-size: 20px; margin-bottom:10px; margin-left:15px;">
                        O agricultor "{{$busca}}" não foi encontrado...
                    </p>
                   <a id="limparPesquisa" href="{{ route('listar.agricultores') }}">
                        Limpar pesquisa
                    </a>
                @elseif(count($userAgricultores) == 0)
                    <p>Não há agricultores cadastrados!</p> 
                @endif
            </div>
        </section>
    </div>
@endsection

{{-- 
    
    
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
                    {{ Str::title($agricultores[$aux2]->cidade) }}, {{$agricultores[$aux2]->cep}}
                </span>
            </div>
            <br>
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
    
--}}