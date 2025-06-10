<nav class="menu">
    
    <img src="{{ asset('assets/img/id-logo-branco.png') }}" alt="logo">

    <ul>
        <li><a href="{{ route('homepage') }}"><i class="fa-solid fa-house"></i>Início</a></li>
        <li><a href="{{ route('registrations') }}"><i class="fa-solid fa-database"></i>Cadastros</a></li>
        <li><a href="{{ route('admin') }}"><i class="fa-solid fa-gear"></i>Admin</a></li>
    </ul>

    <div class="menu-date">
        <p>{{ now()->format('d/m/Y') }}</p>
    </div>

</nav>