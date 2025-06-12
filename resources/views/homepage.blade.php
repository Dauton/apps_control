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
            @foreach($apps as $exibe)
            <tr>
                <td>{{ $exibe->site_app }}</td>
                <td>{{ $exibe->name_app }}</td>
                <td>{{ $exibe->server_app }}</td>
                <td>{{ $exibe->port_app }}</td>
                <td>{{ $exibe->server_db_app }}</td>
                <td>{{ $exibe->name_db_app }}</td>
                <td>{{ $exibe->php_version_app }}</td>
                <td>{{ $exibe->laravel_version_app }}</td>
                <td>{{ $exibe->url_intranet }}</td>
                <td>{{ $exibe->author_app }}</td>
                <td>{{ $exibe->created_by }}</td>
                <td>{{ \Carbon\Carbon::parse($exibe->created_at)->format('d/m/Y - H:i') }}</td>
                <td><a href="{{ route('edit-app', Crypt::encrypt($exibe->id)) }} }}"><i class="fa-solid fa-square-pen"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>

@endsection
