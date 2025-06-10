@extends('layout.main-layout')
@section('content')

<section class="conteudo">

    <div class="conteudo-cabecalho">
        <h2>Cadastrar servidor</h2>
        <i class="fa-solid fa-minus" id="minimize-form"></i>
    </div>

    <form action="{{ route('createServer') }}" method="POST">
        @csrf

        <div class="inpsel-container">
            <label for="name_server">Nome<small> *</small></label>
            <div>
                <i class="fa-solid fa-server"></i>
                <input type="text" name="name_server" id="name_server" placeholder="Dê um nome ao servidor" value="{{ old('name_server') }}">
            </div>
            @error('name_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="ip_server">IP Address<small> *</small></label>
            <div>
                <i class="fa-solid fa-server"></i>
                <input type="text" name="ip_server" id="ip_server" placeholder="IP do servidor" value="{{ old('ip_server') }}">
            </div>
            @error('ip_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="php_version_server">Versão PHP<small> *</small></label>
            <div>
                <i class="fa-brands fa-php"></i>
                <input type="text" name="php_version_server" id="php_version_server" placeholder="Versão do PHP instalado" value="{{ old('php_version_server') }}">
            </div>
            @error('php_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="laravel_version_server">Versão Laravel<small> *</small></label>
            <div>
                <i class="fa-brands fa-laravel"></i>
                <input type="text" name="laravel_version_server" id="laravel_version_server" placeholder="Versão do Laravel instalado" value="{{ old('laravel_version_server') }}">
            </div>
            @error('laravel_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Cadastrar</button>
            <a href="{{ route('registrations') }}"><button type="button" id="btn-cancelar">Cancelar</button></a>
        </div>

    </form>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="conteudo">

    <div class="conteudo-cabecalho">
        <h2>Ferramentas cadastradas</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>IP Address</td>
                <td>Versão PHP</td>
                <td>Versão Laravel</td>
                <td>Cadastrado por</td>
                <td>Data cadastro</td>
                <td>Editar</td>
            </tr>
        </thead>
        <tbody>
            @foreach($servers as $exibe)
            <tr>
                <td>{{ $exibe->name_server }}</td>
                <td>{{ $exibe->ip_server }}</td>
                <td>{{ $exibe->php_version_server }}</td>
                <td>{{ $exibe->laravel_version_server }}</td>
                <td>{{ $exibe->created_by }}</td>
                <td>{{ \Carbon\Carbon::parse($exibe->created_at)->format('d/m/Y - H:i') }}</td>
                <td><a href="{{ route('edit-app', Crypt::encrypt($exibe->id)) }} }}"><i class="fa-solid fa-square-pen"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection