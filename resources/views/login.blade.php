
@extends('layout.login-layout')
@section('formulario')
<form method="post" action="/auth" id="loginForm">
    @csrf

    <img src="{{ asset('assets/img/id-logo.png') }}" alt="logo">

    <label for="usuario">Usuário<small> *</small>
        <div>
            <i class="fa-solid fa-user"></i>
            <input type="text" name="usuario" id="usuario" placeholder="Seu usuário" value="{{ old('usuario') }}">
        </div>
        @error('usuario')
        <p id="input-error">{{ $message }}</p>
        @enderror
    </label>
    <label for="senha">Senha<small> *</small>
        <div>
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="senha" id="senha" placeholder="Sua senha" value="{{ old('senha') }}">
        </div>
        @error('senha')
        <p id="input-error">{{ $message }}</p>
        @enderror
    </label>

    <div class="buttons-container">
        <button type="submit">Entrar</button>
    </div>

    @session('loginError')
        <p class="show-alert login">{{ session('loginError') }}</p>
    @endsession

    @include('layout.rodape')

</form>
@endsection