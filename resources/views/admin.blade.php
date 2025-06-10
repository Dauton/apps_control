@extends('layout.main-layout')
@section('content')

<section class="conteudo">

    <div class="conteudo-cabecalho">
        <h2>Cadastrar usuário</h2>
        <i class="fa-solid fa-minus" id="minimize-form"></i>
    </div>

    <form method="post" action="{{ 'cadastraProduto' }}">
        @csrf

        <div class="inpsel-container">
            <label for="name">Nome</label>
            <div>
                <i class="fa-solid fa-address-card"></i>
                <input type="text" name="name" id="name" placeholder="Nome completo" value="{{ old('name') }}">
            </div>
            @error('name')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="username">Usuário</label>
            <div>
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Usuário de acesso" value="{{ old('username') }}">
            </div>
            @error('username')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="password">Senha</label>
            <div>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Senha de acesso" autocomplete="new-password" value="{{ old('password') }}">
            </div>
            @error('password')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="password-repeat">Repita a senha</label>
            <div>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password-repeat" id="password-repeat" placeholder="Repita a senha de acesso" autocomplete="new-password" value="{{ old('password-repeat') }}">
            </div>
            @error('password-repeat')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Cadastrar</button>
            <button type="button" id="btn-cancelar">Cancelar</button>
        </div>

    </form>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="conteudo">

    <div class="conteudo-cabecalho">
        <h2>Usuários cadastrados</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <table>
        <thead>
            <tr>
                <td>Descriçao</td>
                <td>Marca</td>
                <td>Modelo</td>
                <td>Categoria</td>
                <td>Preço</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</section>

@endsection