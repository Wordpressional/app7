<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    <title>{{ config('app.name', 'Research Centre Vergelijkende Cultuurwetenschap') }}</title>

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
      @yield('css')
</head>
<body class="bg-light">
    <div id="app">
        @include('shared/navbar')

        <div class="container">
            @include('shared/alerts')

            <div class="row">
                <div class="col-md-12">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('shared/footer')
    </div>

    <!-- Scripts -->
    @if (Request::is('posts/*'))
        <script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
    @endif
    <script src="{{ asset(mix('js/app.js')) }}"></script>

    <script>
    $( document ).ready(function() {
        $(".user").focusin(function(){
        $(".inputUserIcon").css("color", "#e74c3c");
        }).focusout(function(){
        $(".inputUserIcon").css("color", "blue");
        });

        $(".pass").focusin(function(){
        $(".inputPassIcon").css("color", "#e74c3c");
        }).focusout(function(){
        $(".inputPassIcon").css("color", "blue");
        });

        $(".ip1").focusin(function(){
        $(".inputUserIcon1").css("color", "#e74c3c");
        }).focusout(function(){
        $(".inputUserIcon1").css("color", "blue");
        });
        
        $(".ip2").focusin(function(){
        $(".inputEmailIcon").css("color", "#e74c3c");
        }).focusout(function(){
        $(".inputEmailIcon").css("color", "blue");
        });

        $(".ip3").focusin(function(){
        $(".inputPassIcon1").css("color", "#e74c3c");
        }).focusout(function(){
        $(".inputPassIcon1").css("color", "blue");
        });
        
        $(".ip4").focusin(function(){
        $(".inputPassIcon2").css("color", "#e74c3c");
        }).focusout(function(){
        $(".inputPassIcon2").css("color", "blue");
        });
    });
</script>
    @stack('inline-scripts')
</body>
</html>
