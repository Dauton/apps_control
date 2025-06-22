@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Cadastrar aplicação no servidor <b>{{ $server->name_server }}</b></h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('createApp') }}" method="POST" class="form1">
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


        <input type="hidden" name="server_app" id="server_app" placeholder="Servidor da aplicação" value="{{ $server->ip_server }}">


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
            <label for="internal_url_app">Acesso interno</label>
            <div>
                <i class="fa-solid fa-link"></i>
                <input type="text" name="internal_url_app" id="internal_url_app" placeholder="URL do acesso interno" value="{{ old('internal_url_app') }}">
            </div>
            @error('internal_url_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="external_url_app">Acesso externo</label>
            <div>
                <i class="fa-solid fa-link"></i>
                <input type="text" name="external_url_app" id="external_url_app" placeholder="URL do acesso interno" value="{{ old('external_url_app') }}">
            </div>
            @error('external_url_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="repository_app">Reporitório</label>
            <div>
                <i class="fa-brands fa-github"></i>
                <input type="text" name="repository_app" id="repository_app" placeholder="URL do acesso interno" value="{{ old('repository_app') }}">
            </div>
            @error('repository_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="developer_app">Desenvolvedor<small> *</small></label>
            <div>
                <i class="fa-solid fa-user-tie"></i>
                <select name="developer_app" id="developer_app">
                    <option value="">Nome do desenvolvedor da aplicação</option>
                    @foreach ($collaborators as $show)
                        @php
                            $value = $show['usu_nomfun']
                        @endphp
                        <option value="{{ $value }}" {{ old('developer_app') == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            @error('developer_app')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Cadastrar</button>
            <a href="{{ route('servers') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="content">

    <div class="content-header">
        <h2>Aplicações cadastradas</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <article class="table-container1">

        <table>
            <thead>
                <tr>
                    <td>Site</td>
                    <td>Nome</td>
                    <td>Servidor</td>
                    <td>Porta</td>
                    <td>Serv. BD</td>
                    <td>BD</td>
                    <td>PHP</td>
                    <td>Laravel</td>
                    <td>Acesso interno</td>
                    <td>Acesso externo</td>
                    <td>Repositório</td>
                    <td>Dev</td>
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
                        @if ($show->internal_url_app === 'N/T' || empty($show->internal_url_app))
                            {{ $show->internal_url_app }}
                        @else
                            <a href="{{ $show->internal_url_app }}" target="_blank"><i class="fa-solid fa-link"></i></a>
                        @endif
                    </td>
                    <td>
                        @if ($show->external_url_app === 'N/T' || empty($show->external_url_app))
                            {{ $show->external_url_app }}
                        @else
                            <a href="{{ $show->external_url_app }}" target="_blank"><i class="fa-solid fa-link"></i></a>
                        @endif
                    </td>
                    <td>
                        @if ($show->repository_app === 'N/T' || empty($show->repository_app))
                            {{ $show->repository_app }}
                        @else
                            <a href="{{ $show->repository_app }}" target="_blank"><i class="fa-solid fa-link"></i></a>
                        @endif
                    </td>
                    <td>{{ $show->developer_app }}</td>
                    <td><a href="{{ route('edit-app', Crypt::encrypt($show->id)) }} }}"><i class="fa-solid fa-square-pen"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </article>
</section>

@endsection
