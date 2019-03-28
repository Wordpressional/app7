<!DOCTYPE html>
<html lang="en">
<head>
  
    <link href="{{ asset('webhome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ecomm/css/style.min.css') }}" rel="stylesheet">

    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>
</head>
<body>
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>

@yield('content')



<script src="{{ asset('js/ecomm/js/front.min.js') }}"></script>
<script src="{{ asset('js/ecomm/js/custom.js') }}"></script>
@yield('js')
</body>
</html>