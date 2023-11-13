@extends('layouts.main')

@section('title', 'AgroSpot')

@section('nav')
    <div id="navbar-menu">
        <a href="" id="navbar-logo"><img src="/images/editado-removebg-preview.png" alt="Logomarca AgroSpot"></a>
        <ul>
            
            @guest
            <li><a href="{{ route('login') }}" id="menu-login" class="menu-button">Login</a></li>
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
                        <div><a href="{{ route('register') }}">Cadastrar</a></div>
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
    <div id="div-content-main">
        <div class="div-recent-products">
            <h3>Adicionados recentemente</h3>
            @foreach ($produtosRecentes as $produto)
                <div class="div-content-produtosRecentes">
                    <div class="div-left-content-produtosRecentes">
                        <p>{{ $produto->nome }}</p>
                        @if (($produto->disponibilidade)==1)
                            <span class="span-produto-disponivel">Produto disponível</span>
                        @endif

                        {{-- 
                            MUDAR ISSO FUTURAMENTE,
                            A IMAGEM SERÁ DIRETA DA TABELA DO BANCO
                        --}}
                        <div id="div-produtosRecentes-img">
                            <img src="/img/produtos/{{ $produto->image }}">
                        </div>
                    </div>

                    <a href="{{ route('produtos') }}"><input class="bt-recenteProduto-saibaMais" type="button" value="Saiba mais..."></a>
                    <span class="clear-float"></span>
                </div>
            @endforeach
        </div>
        <div class="div-content-frase">
            <p id="frase-efeito">Conecte-se ao <span>campo</span>, transforme sua <span>alimentação</span>.</p>
        </div>
    </div>
@endsection