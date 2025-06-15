@extends('layout.alerts')

<!DOCTYPE html>
<html lang="pt-BR">

    @include('layout.head')

<body>
    <main class="main">

        @if (Request::path() != 'admin/login')
            @include('layout.menu')
        @endif

        <section class="center">

            @include('layout.main-header')

            <article class="container-content">
                @yield('content')
            </article>

            @include('layout.main-footer')

        </section>

    </main>

    @include('layout.scripts')

</body>

</html>
