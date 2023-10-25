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
            <li class="menu-opcoes-dropdown">
                <a id="menu-opcoes">
                    Opções
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="8" viewBox="0 0 10 6" fill="none">
                        <path d="M0.133895 0.147247C0.176049 0.100584 0.22618 0.0635509 0.281402 0.0382805C0.336623 0.0130095 0.395844 0 0.455657 0C0.515469 0 0.574689 0.0130095 0.62991 0.0382805C0.685132 0.0635509 0.735263 0.100584 0.777418 0.147247L5.00031 4.79222L9.2232 0.147247C9.26545 0.100779 9.31562 0.0639186 9.37082 0.0387707C9.42603 0.0136223 9.4852 0.000679493 9.54496 0.000679493C9.60472 0.000679493 9.66389 0.0136223 9.7191 0.0387707C9.7743 0.0639186 9.82447 0.100779 9.86672 0.147247C9.90898 0.193714 9.94249 0.248879 9.96536 0.309592C9.98823 0.370305 10 0.435377 10 0.501092C10 0.566807 9.98823 0.631879 9.96536 0.692592C9.94249 0.753305 9.90898 0.80847 9.86672 0.854938L5.32207 5.85275C5.27992 5.89942 5.22978 5.93645 5.17456 5.96172C5.11934 5.98699 5.06012 6 5.00031 6C4.9405 6 4.88128 5.98699 4.82605 5.96172C4.77083 5.93645 4.7207 5.89942 4.67855 5.85275L0.133895 0.854938C0.0914631 0.808579 0.0577879 0.753449 0.0348082 0.692722C0.0118294 0.631994 0 0.566868 0 0.501092C0 0.435316 0.0118294 0.37019 0.0348082 0.309463C0.0577879 0.248734 0.0914631 0.193604 0.133895 0.147247Z" fill="white"/>
                    </svg>
                    
                </a>
                <div class="menu-opcoes-dropdown-content">
                    <a href="{{ route('register.view') }}">Cadastrar</a>
                    <a href="">Vincular perfil a uma feira</a>
                    <a href="">Ver mapa</a>
                </div>
            </li>
        </ul>
    </div>
@endsection

@section('content')
    <p id="frase-efeito">Conecte-se ao <span>campo</span>, transforme sua <span>alimentação</span>.</p>
@endsection