<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/style.css">

    {{-- Fonts Google --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/4b10770594.js" crossorigin="anonymous"></script>

    <title>@yield('title')</title>
</head>
<body>
    <nav id="navbar">
        <div id="navbar-menu">
            <a href="{{ route('initial') }}" id="navbar-logo"><img src="/images/editado-removebg-preview.png" alt="Logomarca AgroSpot"></a>
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
                            @guest
                            <div><a href="{{ route('register') }}">Cadastrar</a></div>
                            @endguest
                            <div><a href="{{ route('index') }}">Produtos</a></div>
                            <div><a href="{{ route('embreve') }}">Ver mapa</a></div>
                            @auth
                            <div><a href="{{ route('redirect.dashboard') }}">Dashboard</a></div>
                            @endauth
                            {{-- vincular perfil a uma feira --}}
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <script>
            let dropdown = document.querySelector('.menu-opcoes-dropdown');
            dropdown.onclick = function(){ dropdown.classList.toggle('active'); }
        </script>
    </nav>
        
    <main>
        <div id="div-flash-msg">
            @if (session('msg'))
                <p class="msg"> {{ session('msg') }} </p>
            @endif
        </div>
        @yield('content')
    </main>

    <footer>
        <div id="footer-content">
            <div id="footer-redes-sociais">
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 31 30" fill="none">
                        <path d="M19.548 6.25983H11.4651C8.78815 6.25983 6.60744 8.3299 6.60744 10.871V18.5439C6.60744 21.085 8.78815 23.1551 11.4651 23.1551H19.548C22.225 23.1551 24.4057 21.085 24.4057 18.5439V10.8834C24.4057 8.3299 22.225 6.25983 19.548 6.25983ZM22.8779 18.5563C22.8779 20.3041 21.3892 21.7172 19.548 21.7172H11.4651C9.62387 21.7172 8.12218 20.3041 8.12218 18.5563V10.8834C8.12218 9.13562 9.62387 7.71012 11.4651 7.71012H19.548C21.3892 7.71012 22.8779 9.12323 22.8779 10.8834V18.5563Z" fill="white"/>
                        <path d="M21.4545 10.0901C21.4545 10.6603 20.9714 11.1313 20.3577 11.1313C19.757 11.1313 19.2608 10.6727 19.2608 10.0901C19.2608 9.51986 19.7439 9.04883 20.3577 9.04883C20.9714 9.06122 21.4545 9.51986 21.4545 10.0901ZM15.5 10.4124C13.0059 10.4124 10.9689 12.3461 10.9689 14.7136C10.9689 17.0812 13.0059 19.0149 15.5 19.0149C17.9941 19.0149 20.0312 17.0812 20.0312 14.7136C20.0312 12.3461 18.0072 10.4124 15.5 10.4124ZM15.5 17.5646C13.8416 17.5646 12.4967 16.2879 12.4967 14.7136C12.4967 13.1394 13.8416 11.8626 15.5 11.8626C17.1584 11.8626 18.5034 13.1394 18.5034 14.7136C18.5034 16.2879 17.1584 17.5646 15.5 17.5646Z" fill="white"/>
                        <path d="M15.5 29.4273C6.95998 29.4273 0 22.8328 0 14.7137C0 6.60689 6.95998 0 15.5 0C24.0531 0 31 6.60689 31 14.7137C31 22.8328 24.0531 29.4273 15.5 29.4273ZM15.5 0.805718C7.41702 0.805718 0.848778 7.04074 0.848778 14.7137C0.848778 22.3866 7.41702 28.6216 15.5 28.6216C23.583 28.6216 30.1512 22.3866 30.1512 14.7137C30.1512 7.04074 23.583 0.805718 15.5 0.805718Z" fill="white"/>
                    </svg>
                </a>
                <a href="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 30 29" fill="none">
                        <path d="M15 0C6.72761 0 0 6.50336 0 14.5C0 22.4966 6.72761 29 15 29C23.2724 29 30 22.4966 30 14.5C30 6.50336 23.2724 0 15 0ZM15 27.9828C7.29851 27.9828 1.05224 21.9448 1.05224 14.5C1.05224 7.05522 7.29851 1.01716 15 1.01716C22.7015 1.01716 28.9478 7.05522 28.9478 14.5C28.9478 21.9448 22.7015 27.9828 15 27.9828Z" fill="white"/>
                        <path d="M22.5523 9.82896L17.4739 14.5L22.5523 19.171C22.6884 18.9914 22.7754 18.7918 22.8135 18.5722V10.4277C22.7754 10.2082 22.6884 10.0086 22.5523 9.82896ZM15 16.776L12.9105 14.8535L7.83587 19.5209C8.07471 19.673 8.33717 19.7487 8.62318 19.7481H21.3769C21.6629 19.7487 21.9254 19.673 22.1642 19.5209L17.0896 14.8535L15 16.776ZM7.44781 9.82896C7.31173 10.0086 7.22467 10.2082 7.18661 10.4277V18.5722C7.22467 18.7918 7.31173 18.9914 7.44781 19.171L12.5262 14.5L7.44781 9.82896Z" fill="white"/>
                        <path d="M12.9105 14.1465L15 16.0726L22.1642 9.4791C21.9254 9.327 21.6629 9.25125 21.3769 9.25187H8.62317C8.33717 9.25125 8.0747 9.327 7.83586 9.4791L12.9105 14.1465Z" fill="white"/>
                    </svg>
                </a>
            </div>
            <div id="footer-contato">
                <p>
                    Entre em contato
                </p>
                <p>
                    (xx) xxxx-xxxx
                </p>
            </div>
        </div>
</footer>
</body>
</html>