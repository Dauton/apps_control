@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Últimas aplicações cadastradas</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Site</td>
                <td>Nome</td>
                <td>Servidor</td>
                <td>Porta</td>
                <td>BD</td>
                <td>Nome BD</td>
                <td>PHP</td>
                <td>Laravel</td>
                <td>Intranet</td>
                <td>Autor</td>
                <td>Por</td>
                <td>Data</td>
                <td>Editar</tr>
            </tr>
        </thead>
        <tbody>
            @foreach($apps as $show)
            <tr>
                <td>{{ $show->id }}</td>
                <td>{{ $show->site_app }}</td>
                <td>{{ $show->name_app }}</td>
                <td>{{ $show->server_app }}</td>
                <td>{{ $show->port_app }}</td>
                <td>{{ $show->server_db_app }}</td>
                <td>{{ $show->name_db_app }}</td>
                <td>{{ $show->php_version_app }}</td>
                <td>{{ $show->laravel_version_app }}</td>
                <td>{{ $show->url_intranet }}</td>
                <td>{{ $show->author_app }}</td>
                <td>{{ $show->created_by }}</td>
                <td>{{ \App\Http\Services\Operations::formatDate($show->created_at) }}</td>
                <td><a href="{{ route('edit-app', Crypt::encrypt($show->id)) }} }}"><i class="fa-solid fa-square-pen"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>

@endsection
