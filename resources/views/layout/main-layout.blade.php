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
    
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/js/datatables.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/js/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/DataTables/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>