@extends('layout.main-layout')
@section('content')

    <section class="conteudo">

        <h2>Cadastrar ferramenta</h2>

        <form action="{{ route('createApp') }}" method="POST">
            @csrf

            <label for="site_app">Site<small> *</small>
                <div>
                    <select name="site_app" id="site_app">
                        <option value="">Site da ferramenta</option>
                        <option value="CORPORATIVO">CORPORATIVO</option>
                    </select>
                </div>
                @error('site_app')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="name_app">Nome<small> *</small>
                <div>
                    <input type="text" name="name_app" id="name_app" placeholder="Nome da ferramenta">
                </div>
                @error('name_app')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>
            
            <label for="server_app">Servidor<small> *</small>
                <div>
                    <select name="server_app" id="server_app">
                        <option value="">Servidor em que a ferramenta está</option>
                        <option value="10.10.10.100">10.10.10.100</option>
                    </select>
                </div>
                @error('server_app')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>
            
            <label for="port_app">Porta
                <div>
                    <input type="text" name="port_app" id="port_app" placeholder="Porta do servidor">
                </div>
                @error('port_app')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>

            <label for="server_db_app">Servidor BD
                <div>
                    <select name="server_db_app" id="server_db_app">
                        <option value="">Servidor em que o BD da ferramenta está</option>
                        <option value="10.10.10.200">10.10.10.200</option>
                    </select>
                </div>
            </label>

            <label for="name_db_app">Nome BD
                <div>
                    <input type="text" name="name_db_app" id="name_db_app" placeholder="Nome do BD">
                </div>
            </label>

            <label for="author_app">Autor<small> *</small>
                <div>
                    <select name="author_app" id="author_app">
                        <option value="">Nome do autor da ferramenta</option>
                        <option value="AUTOR DESCONHECIDO">AUTOR DESCONHECIDO</option>
                    </select>
                </div>
                @error('author_app')
                    <p id="input-error">{{ $message }}</p>
                @enderror
            </label>
            
            <label for="url_intranet">URL intranet
                <div>
                    <input type="text" name="url_intranet" id="url_intranet" placeholder="URL do domínio Intranet" value="NÃO">
                </div>
            </label>

            <div class="buttons-container">
                <button type="submit">Cadastrar</button>
                <a href="{{ route('homepage') }}"><button type="button" id="btn-cancelar">Cancelar</button></a>
            </div>

        </form>
    </section>

    <!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

    <section class="conteudo">

        <h2>Ferramentas cadastradas</h2>

        <table>
            <thead>
                <tr>
                    <td>Site</td>
                    <td>Nome</td>
                    <td>Servidor</td>
                    <td>Porta</td>
                    <td>Servidor BD</td>
                    <td>Nome BD</td>
                    <td>Intranet</td>
                    <td>Autor</td>
                    <td>Cadastrado por</td>
                    <td>Data cadastro</td>
                </tr>
            </thead>
            <tbody>
                @foreach($apps as $exibe)
                    <tr>
                        <td>{{ $exibe->site_app }}</td>
                        <td>{{ $exibe->name_app }}</td>
                        <td>{{ $exibe->server_app }}</td>
                        <td>{{ $exibe->port_app }}</td>
                        <td>{{ $exibe->server_db_app }}</td>
                        <td>{{ $exibe->name_db_app }}</td>
                        <td>{{ $exibe->url_intranet }}</td>
                        <td>{{ $exibe->author_app }}</td>
                        <td>{{ $exibe->created_by }}</td>
                        <td>{{ \Carbon\Carbon::parse($exibe->created_at)->format('d/m/Y - H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
    
@endsection