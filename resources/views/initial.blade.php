@extends('layouts.main')

@section('title', 'AgroSpot')

@section('nav')
    <a href="" id="navbar-logo">Logo</a>
    <div id="navbar-menu">
        <ul>
            @guest
            <li><a href="{{ route('login.view') }}" id="menu-login" class="menu-button">Login</a></li>
            @endguest

            @auth
            <li>
                <form action="{{ route('login.logout') }}" method="POST">
                    @csrf
                    <a href="{{ route('login.logout') }}" class="menu-button" id="menu-sair" onclick="event.preventDefault(); this.closest('form').submit();">
                        Sair
                    </a>
                </form>
            </li>
            @endauth

            <li>
                <div class="menu-opcoes-dropdown">
                    <a class="menu-button">Opções</a>

                    <div class="content">
                        <div><a href="{{ route('register.view') }}">Cadastrar</a></div>
                        <div><a href="">Vincular perfil a uma feira</a></div>
                        <div><a href="">Ver mapa</a></div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <script>
        let dropdown = document.querySelector('.menu-opcoes-dropdown');
        dropdown.onclick = function(){ dropdown.classList.toggle('active'); }
    </script>
@endsection

@section('content')
    <p id="frase-efeito">Conecte-se ao <span>campo</span>, transforme sua <span>alimentação</span>.</p>
@endsection