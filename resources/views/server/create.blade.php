@extends('layout.main-layout')
@section('content')
    <section class="content">

        <div class="content-header">
            <h2>Cadastrar servidor</h2>
            <i class="fa-solid fa-minus" id="minimize-form1"></i>
        </div>

        <form action="{{ route('createServer') }}" method="POST" class="form1">
            @csrf

            <div class="inpsel-container">
                <label for="type_server">Tipo do servidor<small> *</small></label>
                <div>
                    <i class="fa-solid fa-server"></i>
                    <select name="type_server" id="type_server">
                        <option value="">Utilização do servidor</option>
                        <option value="APLICAÇÕES" {{ old('type_server') == 'APLICAÇÕES' ? 'selected' : '' }}>APLICAÇÕES
                        </option>
                        <option value="BANCO DE DADOS" {{ old('type_server') == 'BANCO DE DADOS' ? 'selected' : '' }}>BANCO
                            DE DADOS</option>
                        <option value="APLICAÇÕES BANCO DE DADOS"
                            {{ old('type_server') == 'BANCO DE DADOS' ? 'selected' : '' }}>APLICAÇÕES E BANCO DE DADOS
                        </option>
                    </select>
                </div>
                @error('type_server')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="inpsel-container">
                <label for="name_server">Nome<small> *</small></label>
                <div>
                    <i class="fa-solid fa-server"></i>
                    <input type="text" name="name_server" id="name_server" placeholder="Dê um nome ao servidor"
                        value="{{ old('name_server') }}">
                </div>
                @error('name_server')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="inpsel-container">
                <label for="ip_server">IP Address<small> *</small></label>
                <div>
                    <i class="fa-solid fa-server"></i>
                    <input type="text" name="ip_server" id="ip_server" placeholder="IP do servidor"
                        value="{{ old('ip_server') }}">
                </div>
                @error('ip_server')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="inpsel-container">
                <label for="os_server">Sistema operacional<small> *</small></label>
                <div>
                    <i class="fa-brands fa-windows"></i>
                    <input type="text" name="os_server" id="os_server" placeholder="Sistema operacional do servidor"
                        value="{{ old('os_server') }}">
                </div>
                @error('os_server')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="inpsel-container">
                <label for="php_version_server">Versão PHP</label>
                <div>
                    <i class="fa-brands fa-php"></i>
                    <input type="text" name="php_version_server" id="php_version_server"
                        placeholder="Versão do PHP instalado" value="{{ old('php_version_server') }}">
                </div>
                @error('php_version_server')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="inpsel-container">
                <label for="python_version_server">Versão Python</label>
                <div>
                    <i class="fa-brands fa-python"></i>
                    <input type="text" name="python_version_server" id="python_version_server"
                        placeholder="Versão do Laravel instalado" value="{{ old('python_version_server') }}">
                </div>
                @error('python_version_server')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="inpsel-container">
                <label for="npm_version_server">Versão NPM</label>
                <div>
                    <i class="fa-brands fa-npm"></i>
                    <input type="text" name="npm_version_server" id="npm_version_server"
                        placeholder="Versão do Laravel instalado" value="{{ old('npm_version_server') }}">
                </div>
                @error('npm_version_server')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </div>

            <div class="inpsel-container">
                <label for="nodejs_version_server">Versão NodeJS</label>
                <div>
                    <i class="fa-brands fa-node"></i>
                    <input type="text" name="nodejs_version_server" id="nodejs_version_server"
                        placeholder="Versão do Laravel instalado" value="{{ old('nodejs_version_server') }}">
                </div>
                @error('nodejs_version_server')
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
            <h2>Servidores cadastrados</h2>
            <i class="fa-solid fa-minus" id="minimize-table"></i>
        </div>

        <article class="table-container1">

            <table>
                <thead>
                    <tr>
                        <td>Servidor</td>
                        <td>Tipo do servidor</td>
                        <td>Nome do servidor</td>
                        <td>Gerenciar</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servers as $show)
                        <tr>
                            <td>{{ $show->ip_server }}</td>
                            <td>{{ $show->type_server }}</td>
                            <td>{{ $show->name_server }}</td>
                            <td><a href="{{ route('management-server', Crypt::encrypt($show->id)) }}"><i
                                        class="fa-solid fa-square-arrow-up-right"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </article>
    </section>
@endsection
