@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Gerenciador de cadastros</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <table>
        <thead>
            <tr>
                <td>ítem</td>
                <td>Último cadastrado</td>
                <td>Data último cadastro</td>
                <td>Quantidade cadastrado</td>
                <td>Gerenciar</td>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td>Aplicações</td>
                <td>{{ empty($lastApp->name_app) ? 'N/T' : $lastApp->name_app }}</td>
                <td>{{ empty($lastApp->created_at) ? 'N/T' : \App\Http\Services\Operations::formatDate($lastApp->created_at) }}</td>
                <td>{{ $countApps }}</td>
                <td><a href="{{ route('create-app') }}"><i class="fa-solid fa-square-arrow-up-right"></i></a></td>
            </tr>

            <tr>
                <td>Servidores</td>
                <td>{{ empty($lastServer->ip_server) ? 'N/T' : $lastServer->ip_server }}</td>
                <td>{{ empty($lastServer->created_at) ? 'N/T' : \App\Http\Services\Operations::formatDate($lastServer->created_at) }}</td>
                <td>{{ $countServers }}</td>
                <td><a href="{{ route('create-server') }}"><i class="fa-solid fa-square-arrow-up-right"></i></a></td>
            </tr>


        </tbody>
    </table>
</section>

@endsection