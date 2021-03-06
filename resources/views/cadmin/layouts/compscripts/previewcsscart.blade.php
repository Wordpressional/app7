<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#317EFB"/>
     
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    
   
    <title></title>
    

     
    

<!-- Bootstrap -->
<link href="{{ asset('webhome/css/bootstrap.min.css') }}" rel="stylesheet">

<link href="{{ asset('webhome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/vendors/elegant-icon/style.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/vendors/themify-icon/themify-icons.css') }}" rel="stylesheet">

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<link href="{{ asset('css/swiper.css')}}" rel="stylesheet">
<link href="{{ asset('css/magnific-popup.css')}}" rel="stylesheet">

<!-- Rev slider css -->
  <link href="{{ asset('webhome/vendors/revolution/css/settings.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/revolution/css/layers.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/revolution/css/navigation.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/animate-css/animate.css') }}" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="{{asset('dist/css/lightbox.min.css')}}" />
<link href="{{ asset('webhome/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/css/responsive.css') }}" rel="stylesheet">



<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
 <link rel="stylesheet" href="{{asset('css/public.css')}}" />
 <link rel="stylesheet" href="{{asset('css/theme.css')}}" />
 
  <link href="{{ asset('webhome/editcss/editablestyle.css') }}" rel="stylesheet">

  
   <link rel="manifest" href="{{url('/manifest.json')}}">
   <link rel="manifest" href="{{url('/manifest.webmanifest')}}">