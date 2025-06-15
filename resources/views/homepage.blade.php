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
                <td>Serv. BD</td>
                <td>Nome BD</td>
                <td>PHP</td>
                <td>Laravel</td>
                <td>Intranet</td>
                <td>Autor</td>
                <td>Cadas. por</td>
                <td>Data cadas.</td>
                <td>Editar</td>
            </tr>
        </thead>
        <tbody>
            @foreach($apps as $show)
            <tr>
                <td>{{ $show->site_app }}</td>
                <td>{{ $show->name_app }}</td>
                <td>{{ $show->server_app }}</td>
                <td>{{ $show->port_app }}</td>
                <td>{{ $show->server_db_app }}</td>
                <td>{{ $show->name_db_app }}</td>
                <td>{{ $show->php_version_app }}</td>
                <td>{{ $show->laravel_version_app }}</td>
                <td>
                    @if ($show->url_intranet === 'N/T' || empty($show->url_intranet))
                        {{ $show->url_intranet }}
                    @else
                        <a href="{{ $show->url_intranet }}" target="_blank"><i class="fa-solid fa-link"></i></a>
                    @endif
                </td>
                <td>{{ $show->author_app }}</td>
                <td>{{ $show->created_by }}</td>
                <td>{{ \App\Http\Services\Operations::formatDate($show->created_at)}}</td>
                <td><a href="{{ route('edit-app', Crypt::encrypt($show->id)) }} }}"><i class="fa-solid fa-square-pen"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</section>

@endsection
