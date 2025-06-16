<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de aplicações</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">

    <meta name="description" content="Aplicação que controla as aplicações corporativas.">
    <meta name="author" content="Dauton Pereira Félix, Analista de TI - 2025">

    @if (session('user.theme_preference') === 'DARK')
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" >
        <link href="{{ asset('assets/css/dark-theme/main.css') }}" rel="stylesheet">
    @else
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" >
    @endif

    <link href="{{ asset('assets/fontawesome/css/all.min.css') }}" rel="stylesheet" >
    <link href="{{ asset('assets/DataTables/css/datatables.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('assets/select2/dist/css/select2.min.css') }}" rel="stylesheet">

</head>
