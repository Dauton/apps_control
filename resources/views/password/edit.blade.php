@extends('layout.main-layout')
@section('content')

<section class="content">

    <div class="content-header">
        <h2>Alteração de senha</h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('editPassword', $user->id) }}" method="POST" class="form1">
        @csrf
        <div class="inpsel-container">
            <label for="password">Senha<small> *</small></label>
            <div>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Informe a nova senha" value="{{ old('password') }}">
                <i class="fa-solid fa-eye" id="show-password"></i>
                <i class="fa-solid fa-eye-slash" id="hide-password"></i>
            </div>
            @error('password')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>
        <div class="inpsel-container">
            <label for="password-repeat">Repete senha<small> *</small></label>
            <div>
                <i class="fa-solid fa-lock"></i>
                <input type="password" name="password-repeat" id="password-repeat" placeholder="Repita a nova senha" value="{{ old('password-repeat') }}">
            </div>
            @error('password-repeat')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Alterar</button>
            <a href="{{ route('homepage') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>
</section>

@endsection
