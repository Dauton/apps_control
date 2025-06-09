@session('alertError')
    <p class="show-alert error" id="show-alert">{{ session('alertError') }}</p>
@endsession

@session('alertSuccess')
    <p class="show-alert success" id="show-alert">{{ session('alertSuccess') }}</p>
@endsession

@session('alertInfo')
    <p class="show-alert info" id="show-alert">{{ session('alertInfo') }}</p>
@endsession