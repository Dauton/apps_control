@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Servidores</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <article class="table-container1">

        <div class="buttons-container">
            <a href="{{ route('create-server') }}"><button>Adicionar um novo servidor</button></a>
        </div>

        <table>
            <thead>
                <tr>
                    <td>Servidor</td>
                    <td>Tipo do servidor</td>
                    <td>Nome do servidor</td>
                    <td>Gerenciar</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($servers as $show)
                <tr>
                    <td>{{ $show->ip_server }}</td>
                    <td>{{ $show->type_server }}</td>
                    <td>{{ $show->name_server }}</td>
                    <td><a href="{{ route('management-server', Crypt::encrypt($show->id)) }}"><i class="fa-solid fa-square-arrow-up-right"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </article>
</section>

@endsection
