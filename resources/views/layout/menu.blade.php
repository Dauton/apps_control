<div class="back-menu"></div>
<nav class="menu">

    <i class="fa-solid fa-xmark" id="deactivate-menu"></i>

    <a href="{{ route('servers') }}"><img src="{{ asset('assets/img/id-logo-branco.png') }}" alt="logo"></a>

    <ul>
        <li><a href="{{ route('servers') }}"><i class="fa-solid fa-server"></i>Servidores</a></li>
        <li><a href="{{ route('importation') }}"><i class="fa-solid fa-file-import"></i>Importação</a></li>
        <li><a href="{{ route('admin') }}"><i class="fa-solid fa-gear"></i>Admin</a></li>
        <li><a href="{{ route('logs') }}"><i class="fa-solid fa-file-lines"></i>Logs</a></li>
    </ul>

    <div class="menu-date">
        <p>{{ now()->format('d/m/Y') }}</p>
    </div>

</nav>
