@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Registro de logs</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <article class="table-container1">

        <table>
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Tipo</td>
                    <td>Resultado</td>
                    <td>Descrição</td>
                    <td>Usuário</td>
                    <td>IP de origem</td>
                    <td>Data</td>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $show)
                <tr>
                    <td>{{ $show->id }}</td>
                    <td>{{ $show->type }}</td>
                    <td>{{ $show->result }}</td>
                    <td>{{ $show->description }}</td>
                    <td>{{ $show->by }}</td>
                    <td>{{ $show->origin_ip }}
                    <td>{{ \App\Http\Services\Operations::formatDate($show->created_at) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </article>

</section>

@endsection
