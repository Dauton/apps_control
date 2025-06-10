@extends('layout.main-layout')
@section('content')

<section class="conteudo">

    <h2>Alteração de senha</h2>

    <form action="{{ route('editPassword', $user->id) }}" method="POST">
        @csrf
        <div class="inpsel-container">
            <label for="password">Senha<small> *</small></label>
            <input type="password" name="password" id="password" placeholder="Informe a nova senha" value="{{ old('password') }}">
            @error('password')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>
        <div class="inpsel-container">
            <label for="password-repeat">Repete senha<small> *</small></label>
            <input type="password" name="password-repeat" id="password-repeat" placeholder="Repita a nova senha" value="{{ old('password-repeat') }}">
            @error('password-repeat')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="buttons-container">
            <button type="submit">Alterar</button>
            <a href="{{ route('homepage') }}"><button type="button" id="btn-cancelar">Cancelar</button></a>
        </div>

    </form>
</section>

@endsection