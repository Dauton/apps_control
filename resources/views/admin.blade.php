@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Cadastrar usuário</h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('createUser') }}" method="POST" class="form1">
        @csrf

        <div class="inpsel-container">
            <label for="name">Autor<small> *</small></label>
            <div>
                <i class="fa-solid fa-user-tie"></i>
                <select name="name" id="name">
                    <option value="">Nome completo</option>
                    @foreach ($collaborators as $show)
                        @php
                            $value = $show['usu_nomfun']
                        @endphp
                        <option value="{{ $value }}" {{ old('name') == $value ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            @error('name')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="username">Usuário<small> *</small></label>
            <div>
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Usuário de acesso" value="{{ old('username') }}">
            </div>
            @error('username')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="password">Senha<small> *</small></label>
            <div>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Senha de acesso" autocomplete="new-password" value="{{ old('password') }}">
                <i class="fa-solid fa-eye" id="show-password"></i>
                <i class="fa-solid fa-eye-slash" id="hide-password"></i>
            </div>
            @error('password')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="password-repeat">Repita a senha<small> *</small></label>
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
            <a href="{{ route('homepage') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="content">

    <div class="content-header">
        <h2>Usuários cadastrados</h2>
        <i class="fa-solid fa-minus" id="minimize-table"></i>
    </div>

    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Usuário</td>
                <td>Último acesso</td>
                <td>Cadastrado por</td>
                <td>Cadastrado em</td>
                <td>Editar</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($listUsers as $show)
                <tr>
                    <td>{{ $show->name }}</td>
                    <td>{{ $show->username }}</td>
                    <td>{{ $show->last_login }}</td>
                    <td>{{ $show->created_by }}</td>
                    <td>{{ \App\Http\Services\Operations::formatDate($show->created_at) }}</td>
                    <td><a href="{{ route('edit-user', Crypt::encrypt($show->id)) }} }}"><i class="fa-solid fa-square-pen"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>

@endsection
