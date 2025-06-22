@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Ambiente do servidor</h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('editServer', $server->id) }}" method="POST" class="form1">
        @csrf

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
            <label for="type_server">Tipo do servidor<small> *</small></label>
            <div>
                <i class="fa-solid fa-server"></i>
                <select name="type_server" id="type_server">
                    <option value="{{ $server->type_server }}">{{ $server->type_server }}</option>
                    <option value="APLICAÇÕES" {{ old('type_server') == 'APLICAÇÕES' ? 'selected' : '' }}>APLICAÇÕES</option>
                    <option value="BANCO DE DADOS" {{ old('type_server') == 'BANCO DE DADOS' ? 'selected' : '' }}>BANCO DE DADOS</option>
                    <option value="APLICAÇÕES BANCO DE DADOS" {{ old('type_server') == 'BANCO DE DADOS' ? 'selected' : '' }}>APLICAÇÕES E BANCO DE DADOS</option>
                </select>
            </div>
            @error('type_server')
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
                <input type="text" name="os_version_server" id="os_version_server" placeholder="Versão do sistema operacional" value="{{ $server->os_server }}">
            </div>
            @error('os_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="php_version_server">Versão PHP</label>
            <div>
                <i class="fa-brands fa-php"></i>
                <input type="text" name="php_version_server" id="php_version_server" placeholder="Versão do PHP" value="{{ $server->php_version_server }}">
            </div>
            @error('php_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="python_version_server">Versão Python</label>
            <div>
                <i class="fa-brands fa-python"></i>
                <input type="text" name="python_version_server" id="python_version_server" placeholder="Versão do Python" value="{{ $server->python_version_server }}">
            </div>
            @error('python_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="npm_version_server">Versão NPM</label>
            <div>
                <i class="fa-brands fa-npm"></i>
                <input type="text" name="npm_version_server" id="npm_version_server" placeholder="Versão do NPM" value="{{ $server->npm_version_server }}">
            </div>
            @error('npm_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

                <div class="inpsel-container">
            <label for="nodejs_version_server">Versão NodeJS</label>
            <div>
                <i class="fa-brands fa-node"></i>
                <input type="text" name="nodejs_version_server" id="nodejs_version_server" placeholder="Versão do Laravel" value="{{ $server->nodejs_version_server }}">
            </div>
            @error('nodejs_version_server')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Editar</button>
            <a href="{{ route('servers') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="content">

    <div class="content-header">
        <h2>Aplicações nesse servidor</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <article class="table-container1">

        <div class="buttons-container">
            <a href="{{ route('create-app', Crypt::encrypt($server->id)) }}"><button>Adicionar uma nova aplicação</button></a>
        </div>

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
                    <td>Aces. interno</td>
                    <td>Aces. externo</td>
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
