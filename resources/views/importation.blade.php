@extends('layout.main-layout')
@section('content')

<p class="show-alert info" id="show-alert">Importe apenas utilizando os modelos aceitáveis.</p>

<section class="content">

    <div class="content-header">
        <h2>Importar aplicações</h2>
        <i class="fa-solid fa-minus" id="minimize-form1"></i>
    </div>

    <form action="{{ route('importApp') }}" method="POST" class="form1" enctype="multipart/form-data">
        @csrf

        <a href="{{ route('download', 'import_app_model.xlsx') }}">
            <button type="button"><i class="fa-solid fa-download"></i>Modelo aceitável para aplicações</button>
        </a>

        <div class="inpsel-container">
            <label for="file">Anexar arquivo (.xlsx ou .xls)<small> *</small></label>
            <div>
                <i class="fa-solid fa-file"></i>
                <input type="file" name="file" id="file" accept=".xlsx, .xls">
            </div>
            @error('file')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit">Importar</button>
            <a href="{{ route('homepage') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>

</section>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------ -->

<section class="content">

    <div class="content-header">
        <h2>Importar servidores</h2>
        <i class="fa-solid fa-minus" id="minimize-form2"></i>
    </div>

    <form action="{{ route('importServer') }}" method="POST" class="form2" enctype="multipart/form-data" id="import-server">
        @csrf

        <a href="{{ route('download', 'import_server_model.xlsx') }}">
            <button type="button"><i class="fa-solid fa-download"></i>Modelo aceitável para servidores</button>
        </a>

        <div class="inpsel-container">
            <label for="file">Anexar arquivo (.xlsx ou .xls)<small> *</small></label>
            <div>
                <i class="fa-solid fa-file"></i>
                <input type="file" name="file" id="file" accept=".xlsx, .xls">
            </div>
            @error('file')
            <p id="input-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="buttons-container">
            <button type="submit" form="import-server">Importar</button>
            <a href="{{ route('homepage') }}"><button type="button" id="btn-cancel">Cancelar</button></a>
        </div>

    </form>

</section>
@endsection
