@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Editar usuário</h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('editUser', $user->id) }}" method="POST" class="form1">
        @csrf

        <div class="inpsel-container">
            <label for="name">Nome<small> *</small></label>
            <div>
                <i class="fa-solid fa-address-card"></i>
                <input type="text" name="name" id="name" placeholder="Nome completo" value="{{ $user->name }}">
            </div>
            @error('name')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="inpsel-container">
            <label for="username">Usuário<small> *</small></label>
            <div>
                <i class="fa-solid fa-user"></i>
                <input type="text" name="username" id="username" placeholder="Usuário de acesso" value="{{ $user->username }}">
            </div>
            @error('username')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Submeter</button>
            <a href="{{ route('admin') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
            <button type="button" id="btn-delete">Excluir</button>
        </div>

    </form>
</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="content">

    <div class="content-header">
        <h2>Editar senha desse usuário</h2>
        <i class="fa-solid fa-minus" id="minimize-form2"></i>
    </div>

    <form action="{{ route('editPassword', $user->id) }}" method="POST" class="form2">
        @csrf

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
            <button type="submit">Submeter</button>
            <a href="{{ route('admin') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>
</section>

<div class="back-confirmation-box"></div>
<div class="confirmation-box">
    <i class="fa-solid fa-triangle-exclamation"></i>

    <h2>Tem certeza?</h2>
    <p>Essa ação não poderá ser desfeita.</p>

    <div class="buttons-container">
        <a href="{{ route('deleteUser', Crypt::encrypt($user->id)) }}"><button type="button" id="btn-delete">Excluir</button></a>
        <button type="button" id="btn-cancel">Cancelar</button>
    </div>
</div>

@endsection
