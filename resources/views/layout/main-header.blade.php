<header class="main-header">

    <i class="fa-solid fa-angles-left" id="active-menu"></i>
    <i class="fa-solid fa-bars" id="active-menu-mobile"></i>

    <div class="welcome">
        <h1>Olá, dev! Seja bem-vindo(a)!</h1>
    </div>

    <div class="container-user-area">
        <div class="active-user-area">
            <i class="fa-solid fa-circle-user"></i>
            <p>{{ session('user.name') }}</p>
            <i class="fa-solid fa-caret-down"></i>
        </div>
        <nav class="options-user-area">

            <div class="themes-container">
                @if (session('user.theme_preference') === 'DARK')
                    <form action="{{ route('changeTheme', Crypt::encrypt(session('user.id'))) }}" method="POST"
                        id="form-light">
                        @csrf
                        <input type="hidden" name="theme_preference" id="theme_preference" value="LIGHT">
                        <button type="submit" form="form-light" title="Tema claro"><i class="fa-regular fa-sun"></i></button>
                    </form>
                @endif
                @if (session('user.theme_preference') === 'LIGHT')
                    <form action="{{ route('changeTheme', Crypt::encrypt(session('user.id'))) }}" method="POST"
                        id="form-dark">
                        @csrf
                        <input type="hidden" name="theme_preference" id="theme_preference" value="DARK">
                        <button type="submit" form="form-dark" title="Tema escuro"><i class="fa-regular fa-moon"></i></button>
                    </form>
                @endif
            </div>
            <ul>
                <li><a href="{{ route('edit-password', Crypt::encrypt(session('user.id'))) }}"><i
                            class="fa-solid fa-lock"></i>Minha senha<i class="fa-solid fa-angle-right"></i></a></li>
                <li><a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i>Sair<i
                            class="fa-solid fa-angle-right"></i></a></li>
            </ul>
        </nav>
    </div>
</header>
