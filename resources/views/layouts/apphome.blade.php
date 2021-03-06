<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         @if($data['n_companyname'])
    <link rel="icon" href="{{asset($data['n_companyname']->favicon)}}" type="image/x-icon" />
    @else
    <link rel="icon" href="/favicon.ico" type="image/x-icon" />
    @endif
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth
    @if($data['n_companyname'])
    <title>{{$data['n_companyname']->cname}}</title>
    @else
    <title></title>
    @endif

        <!-- Icon css link -->
        <link href="{{ asset('webhome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/elegant-icon/style.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/themify-icon/themify-icons.css') }}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('webhome/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Rev slider css -->
        <link href="{{ asset('webhome/vendors/revolution/css/settings.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/revolution/css/layers.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/revolution/css/navigation.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/animate-css/animate.css') }}" rel="stylesheet">

        <!-- Extra plugin css -->
        <link href="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">

        <link href="{{ asset('webhome/css/style.css') }}" rel="stylesheet">
		<link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
         <link href="{{ asset('webhome/css/responsive.css') }}" rel="stylesheet">
          <link rel="stylesheet" href="{{asset('css/public.css')}}" />
          <link href="{{ asset('webhome/editcss/editablestyle.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
   
 </head>
    <body>
 
    @yield('contenthome')
    <div id="app">
    </div>
 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('webhome/js/jquery-3.2.1.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('webhome/js/popper.min.js') }}"></script>
        <script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
        <!-- Rev slider js -->
        <script src="{{ asset('webhome/vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
        <!-- Extra plugin css -->
        <script src="{{ asset('webhome/vendors/counterup/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/apear.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/countto.js') }}"></script>
        <script src="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/parallaxer/jquery.parallax-1.1.3.js') }}"></script>
        <!--Tweets-->
       
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
        <script src="{{ asset('webhome/js/theme.js') }}"></script>
        <script src="{{ asset('webhome/js/responsiveslides.min.js') }}"></script>
       <script src="{{ asset(mix('js/app.js')) }}"></script>
       <script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript"></script>
    </body>       
</html>
