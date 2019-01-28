<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     @if($data['n_companyname']->favicon)
    <link rel="icon" href="{{asset($data['n_companyname']->favicon)}}" type="image/x-icon" />
     @else
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth
    @if($data)
    <title>{{$data['n_companyname']->cname}}</title>
    @else
    <title></title>
    @endif

    <!-- Styles -->
    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet"/>
     <link rel="manifest" href="{{url('/manifest.json')}}">
   <link rel="manifest" href="{{url('/manifest.webmanifest')}}">
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
<script src="{{ asset('upup.min.js') }}"></script>
<script src="{{ asset('upup.sw.min.js') }}"></script>
<script>
UpUp.start({
  'content': 'You are Offline. Cannot reach site. Please check your internet connection.',
  'service-worker-url': "{{ asset('upup.sw.min.js') }}"
});

$(document).ready(function() {

if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register("{{ asset('upup.sw.min.js') }}")
      .then(function(reg){
        console.log("Yes, it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
  }

 

});
</script>
    @stack('inline-scripts')
</body>
</html>
