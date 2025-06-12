@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Cadastrar aplicação</h2>
        <i class="fa-solid fa-minus" id="minimize-form"></i>
    </div>

    <form action="{{ route('createApp') }}" method="POST">
        @csrf

        <div class="inpsel-container">
            <label for="site_app">Site<small> *</small></label>
            <div>
                <i class="fa-solid fa-industry" id="icon_site_app"></i>
                <select name="site_app" id="site_app">
                    <option value="">Site da aplicação</option>
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
                <input type="text" name="name_app" id="name_app" placeholder="Nome da aplicação" value="{{ old('name_app') }}">
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
                    <option value="">Servidor da aplicação</option>
                    @foreach ($apps_servers as $server)
                        <option value="{{ $server->ip_server }}" {{ old('server_app') == $server->ip_server ? 'selected' : '' }}>{{ $server->ip_server }}</option>
                    @endforeach
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
                <input type="text" name="port_app" id="port_app" placeholder="Porta do servidor" value="{{ old('port_app') }}">
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
                    <option value="">Servidor do BD da aplicação</option>
                    @foreach ($db_servers as $server)
                        <option value="{{ $server->ip_server }}" {{ old('server_db_app') == $server->ip_server ? 'selected' : '' }}>{{ $server->ip_server }}</option>
                    @endforeach
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
                <input type="text" name="name_db_app" id="name_db_app" placeholder="Nome do BD" value="{{ old('name_db_app') }}">
            </div>
            @error('name_db_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="php_version_app">Versão PHP</label>
            <div>
                <i class="fa-brands fa-php"></i>
                <input type="text" name="php_version_app" id="php_version_app" placeholder="Versão do PHP" value="{{ old('php_version_app') }}">
            </div>
            @error('php_version_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="laravel_version_app">Versão Laravel</label>
            <div>
                <i class="fa-brands fa-laravel"></i>
                <input type="text" name="laravel_version_app" id="laravel_version_app" placeholder="Versão do Laravel" value="{{ old('laravel_version_app') }}">
            </div>
            @error('laravel_version_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="url_intranet">URL intranet</label>
            <div>
                <i class="fa-solid fa-link"></i>
                <input type="text" name="url_intranet" id="url_intranet" placeholder="URL do domínio Intranet" value="{{ old('url_intranet') }}">
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
                    <option value="">Nome do autor da aplicação</option>
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
            <button type="submit">Cadastrar</button>
            <a href="{{ route('registrations') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="content">

    <div class="content-header">
        <h2>Aplicações cadastradas</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <table>
        <thead>
            <tr>
                <td>Site</td>
                <td>Nome</td>
                <td>Servidor</td>
                <td>Porta</td>
                <td>Servidor BD</td>
                <td>Nome BD</td>
                <td>Versão PHP</td>
                <td>Versão Laravel</td>
                <td>Intranet</td>
                <td>Autor</td>
                <td>Cadastrado por</td>
                <td>Data cadastro</td>
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
                <td>{{ $show->url_intranet }}</td>
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
