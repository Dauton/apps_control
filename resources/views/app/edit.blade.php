@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Editar aplicação</h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('editApp', $app->id) }}" method="POST" class="form1">
        @csrf

        <div class="inpsel-container">
            <label for="site_app">Site<small> *</small></label>
            <div>
                <i class="fa-solid fa-industry" id="icon_site_app"></i>
                <select name="site_app" id="site_app">
                    <option value="{{ $app->site_app }}">{{ $app->site_app }}</option>
                    <option value="CORPORATIVO">CORPORATIVO</option>
                    @foreach ($sites as $show)
                        @php
                            $value = $show['usu_nomfil']
                        @endphp
                        <option value="{{ $value }}" {{ old('site_app') == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            @error('site_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="name_app">Nome<small> *</small></label>
            <div>
                <i class="fa-solid fa-display"></i>
                <input type="text" name="name_app" id="name_app" placeholder="Nome da aplicação" value="{{ $app->name_app }}">
            </div>
            @error('name_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="server_app">Servidor<small> *</small></label>
            <div>
                <i class="fa-solid fa-server"></i>
                <select name="server_app" id="server_app">
                    <option value="{{ $app->server_app }}">{{ $app->server_app }}</option>
                    <option value="10.10.10.100" {{ old('server_app') == '10.10.10.100' ? 'selected' : '' }}>10.10.10.100</option>
                </select>
            </div>
            @error('server_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="port_app">Porta</label>
            <div>
                <i class="fa-solid fa-server"></i>
                <input type="text" name="port_app" id="port_app" placeholder="Porta do servidor" value="{{ $app->port_app }}">
            </div>
            @error('port_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="server_db_app">Servidor BD</label>
            <div>
                <i class="fa-solid fa-server"></i>
                <select name="server_db_app" id="server_db_app">
                    <option value="{{ $app->server_db_app }}">{{ $app->server_db_app }}</option>
                    <option value="10.10.10.200" {{ old('server_db_app') == '10.10.10.200' ? 'selected' : '' }}>10.10.10.200</option>
                </select>
            </div>
            @error('server_db_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="name_db_app">Nome BD</label>
            <div>
                <i class="fa-solid fa-database"></i>
                <input type="text" name="name_db_app" id="name_db_app" placeholder="Nome do BD" value="{{ $app->name_db_app }}">
            </div>
            @error('name_db_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="php_version_app">Versão PHP</label>
            <div>
                <i class="fa-brands fa-php"></i>
                <input type="text" name="php_version_app" id="php_version_app" placeholder="Versão do PHP" value="{{ $app->php_version_app }}">
            </div>
            @error('php_version_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="laravel_version_app">Versão Laravel</label>
            <div>
                <i class="fa-brands fa-laravel"></i>
                <input type="text" name="laravel_version_app" id="laravel_version_app" placeholder="Versão do Laravel" value="{{ $app->laravel_version_app }}">
            </div>
            @error('laravel_version_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="url_intranet">URL intranet</label>
            <div>
                <i class="fa-solid fa-link"></i>
                <input type="text" name="url_intranet" id="url_intranet" placeholder="URL do domínio Intranet" value="{{ $app->url_intranet }}">
            </div>
            @error('url_intranet')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="author_app">Autor<small> *</small></label>
            <div>
                <i class="fa-solid fa-user-tie"></i>
                <select name="author_app" id="author_app">
                    <option value="{{ $app->author_app }}">{{ $app->author_app }}</option>
                    @foreach ($collaborators as $show)
                        @php
                            $value = $show['usu_nomfun']
                        @endphp
                        <option value="{{ $value }}" {{ old('author_app') == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            @error('author_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Submeter</button>
            <a href="{{ route('create-app') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
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
        <a href="{{ route('deleteApp', Crypt::encrypt($app->id)) }}"><button type="button" id="btn-delete">Excluir</button></a>
        <button type="button" id="btn-cancel">Cancelar</button>
    </div>
</div>

@endsection
