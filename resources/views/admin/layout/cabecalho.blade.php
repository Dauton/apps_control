<header class="cabecalho">
    <div class="welcome">
        <h1>Olá, seja bem-vindo(a)!</h1>
    </div>
    <div class="container-user-area">
        <div class="active-user-area">
            <i class="fa-solid fa-circle-user"></i>
            <p>{{ session('usuario.nome') }}</p>
            <i class="fa-solid fa-caret-down"></i>
        </div>
        <nav class="options-user-area">
            <ul>
                <li><a href="#"><i class="fa-solid fa-lock"></i>Minha senha<i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i>Sair<i class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </nav>
    </div>
</header>