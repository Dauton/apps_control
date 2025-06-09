@extends('layout.alerts')

<!DOCTYPE html>
<html lang="pt-BR">

    @include('layout.head')

<body>
    <main class="principal">    

        @if (Request::path() != 'admin/login')
            @include('layout.menu')
        @endif

        <section class="centro">

            @include('layout.cabecalho')
            
            <article class="container-conteudo">
                @yield('content')
            </article>

            @include('layout.rodape')

        </section>

    </main>
    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>