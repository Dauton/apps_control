@extends('layout.main-layout')
@section('content')

<section class="conteudo">

    <div class="conteudo-cabecalho">
        <h2>Gerenciador de cadastros</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <table>
        <thead>
            <tr>
                <td>ítem</td>
                <td>Último cadastrado</td>
                <td>Data último cadastro</td>
                <td>Gerenciar</td>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Ferramentas</td>
                <td>{{ $lastApp->name_app }}</td>
                <td>{{ \Carbon\Carbon::parse($lastApp->created_at)->format('d/m/Y - H:i') }}</td>
                <td><a href="{{ route('create-app') }}"><i class="fa-solid fa-square-arrow-up-right"></i></a></td>
            </tr>

            <tr>
                <td>Servidores</td>
                <td></td>
                <td></td>
                <td><a href="{{ route('create-server') }}"><i class="fa-solid fa-square-arrow-up-right"></i></a></td>
            </tr>


        </tbody>
    </table>
</section>

@endsection