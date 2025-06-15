@extends('layout.login-layout')
@section('formulary')
<form action="{{ route('auth') }}" method="POST"  id="loginForm">
    @csrf

    <img src="{{ asset('assets/img/id-logo.png') }}" alt="logo">

    <div class="inpsel-container">
        <label for="username">Usuário<small> *</small></label>
        <div>
            <i class="fa-solid fa-user"></i>
            <input type="text" name="username" id="username" placeholder="Seu usuário" value="{{ old('username') }}">
        </div>
        @error('username')
        <p id="input-error">{{ $message }}</p>
        @enderror

    </div>

    <div class="inpsel-container">
        <label for="password">Senha<small> *</small></label>
        <div>
            <i class="fa-solid fa-lock"></i>
            <input type="password" name="password" id="password" placeholder="Sua senha" value="{{ old('password') }}">
            <i class="fa-solid fa-eye" id="show-password"></i>
            <i class="fa-solid fa-eye-slash" id="hide-password"></i>
        </div>
        @error('password')
        <p id="input-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="buttons-container">
        <button type="submit">Entrar</button>
    </div>

    @session('loginError')
    <p class="show-alert login">{{ session('loginError') }}</p>
    @endsession

    @include('layout.main-footer')

</form>
@endsection
