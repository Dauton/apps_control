@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Cadastrar servidor</h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('editServer', $server->id) }}" method="POST" class="form1">
        @csrf

        <div class="inpsel-container">
            <label for="type_server">Tipo do servidor<small> *</small></label>
            <div>
                <i class="fa-solid fa-server"></i>
                <select name="type_server" id="type_server">
                    <option value="{{ $server->type_server }}">{{ $server->type_server }}</option>
                    <option value="APLICAÇÕES" {{ old('type_server') == 'APLICAÇÕES' ? 'selected' : '' }}>APLICAÇÕES</option>
                    <option value="BANCO DE DADOS" {{ old('type_server') == 'BANCO DE DADOS' ? 'selected' : '' }}>BANCO DE DADOS</option>
                    <option value="BANCO DE DADOS" {{ old('type_server') == 'BANCO DE DADOS' ? 'selected' : '' }}>APLICAÇÕES E BANCO DE DADOS</option>
                </select>
            </div>
            @error('author_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="name_server">Nome<small> *</small></label>
            <div>
                <i class="fa-solid fa-server"></i>
                <input type="text" name="name_server" id="name_server" placeholder="Dê um nome ao servidor" value="{{ $server->name_server }}">
            </div>
            @error('name_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="ip_server">IP Address<small> *</small></label>
            <div>
                <i class="fa-solid fa-server"></i>
                <input type="text" name="ip_server" id="ip_server" placeholder="IP do servidor" value="{{ $server->ip_server }}">
            </div>
            @error('ip_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="os_server">Sistema operacional<small> *</small></label>
            <div>
                <i class="fa-brands fa-windows"></i>
                <input type="text" name="os_server" id="os_server" placeholder="Sistema operacional do servidor" value="{{ $server->os_server }}">
            </div>
            @error('os_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="os_version_server">Versão sistema operacional<small> *</small></label>
            <div>
                <i class="fa-brands fa-windows"></i>
                <input type="text" name="os_version_server" id="os_version_server" placeholder="Versão do sistema operacional" value="{{ $server->os_version_server }}">
            </div>
            @error('os_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="php_version_server">Versão PHP</label>
            <div>
                <i class="fa-brands fa-php"></i>
                <input type="text" name="php_version_server" id="php_version_server" placeholder="Versão do PHP instalado" value="{{ $server->php_version_server }}">
            </div>
            @error('php_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="laravel_version_server">Versão Laravel</label>
            <div>
                <i class="fa-brands fa-laravel"></i>
                <input type="text" name="laravel_version_server" id="laravel_version_server" placeholder="Versão do Laravel instalado" value="{{ $server->laravel_version_server }}">
            </div>
            @error('laravel_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Cadastrar</button>
            <a href="{{ route('create-server') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
            <button type="button" id="btn-delete">Excluir</button>
        </div>

    </form>
</section>

<div class="back-confirmation-box"></div>
<div class="confirmation-box">
    <i class="fa-solid fa-triangle-exclamation"></i>

    <h2>Tem certeza?</h2>
    <p>Essa ação não poderá ser desfeita.</p>

    <div class="buttons-container">
        <a href="{{ route('deleteServer', Crypt::encrypt($server->id)) }}"><button type="button" id="btn-delete">Excluir</button></a>
        <button type="button" id="btn-cancel">Cancelar</button>
    </div>
</div>

@endsection
