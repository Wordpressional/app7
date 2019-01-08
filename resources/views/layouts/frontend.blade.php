<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    @if($data)
    <link rel="icon" href="{{asset($data['n_companyname']->favicon)}}" type="image/x-icon" />
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

        <!-- Icon css link -->
        <link href="{{ asset('webhome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/elegant-icon/style.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/themify-icon/themify-icons.css') }}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('webhome/css/bootstrap.min.css') }}" rel="stylesheet">

     
        
       

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
		<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

         <link href="{{ asset('webhome/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/css/responsive.css') }}" rel="stylesheet">

          <link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />

           <link rel="stylesheet" href="{{asset('css/star-rating.min.css')}}" />
            <link rel="stylesheet" href="{{asset('css/bootstrap-colorpicker.min.css')}}" />
            <link rel="stylesheet" type="text/css" href="{{asset('dist/css/lightbox.min.css')}}" />
             <link href="{{ asset('webhome/editcss/editablestyle.css') }}" rel="stylesheet">

            @yield('css')

 </head>
    <body class="bg-light">
        
       @yield('contentfrontend')
        <div id="app">
         </div>    
      
    @include('layouts.compscripts.general')
 


   @yield('scripts')
    @include('layouts.compscripts.serviceworker')
        
         @include ('layouts.shortcode-layout')
         @stack('inline-scripts')
    </body>      
</html>
