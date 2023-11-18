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
            {{-- <div id="retangulo">
            
            </div> --}}
            
            <div id="div-space-left">

            </div>

            <div id="div-container-produtos">
                <div class="div-produto">
                    <p>PRODUTO 1</p>
                </div>
                <div class="div-produto">
                    <p>PRODUTO 2</p>
                </div>
                <div class="div-produto">
                    <p>PRODUTO 3</p>
                </div>
            </div>
        </section>
    </div>
@endsection

