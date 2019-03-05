 <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#317EFB"/>
        <!--<link rel="icon" sizes="192x192" href="{{ asset('icons/icon-192.png') }}"> 
        <link rel="icon" sizes="128x128" href="{{ asset('icons/icon-128.png') }}" >
        <link rel="apple-touch-icon" sizes="128x128" href="{{ asset('icons/icon-128.png') }}" >
        <link rel="apple-touch-icon-precomposed" sizes="128x128" href="{{ asset('icons/icon-128.png') }}" >
        <link rel="icon" href="{{ asset('icons/icon-36.png') }}"  type="image/x-icon" />-->

    <link rel="icon" href="{{url('icons/favicon.ico')}}" type="image/x-icon" />    
    @if($data['n_companyname'])
    <link rel="icon" href="{{asset($data['n_companyname']->favicon)}}" type="image/x-icon" />
    @else
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
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
<link rel="stylesheet" type="text/css" href="{{asset('dist/css/lightbox.min.css')}}" />
<link href="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">


<link href="{{ asset('css/swiper.css')}}" rel="stylesheet">
<link href="{{ asset('css/magnific-popup.css')}}" rel="stylesheet">

<!-- Rev slider css -->
  <link href="{{ asset('webhome/vendors/revolution/css/settings.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/revolution/css/layers.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/revolution/css/navigation.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/animate-css/animate.css') }}" rel="stylesheet">
<script src="//smtpjs.com/v2/smtp.js"></script>

<link href="{{ asset('webhome/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/css/responsive.css') }}" rel="stylesheet">

<link href="{{ asset('webhome/css/fixed.css') }}" rel="stylesheet">


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">

 <link rel="stylesheet" href="{{asset('css/public.css')}}" />
 <link rel="stylesheet" href="{{asset('css/homethemeconflict.css')}}" />
 
 <link rel="stylesheet" href="{{asset('css/front.css')}}" />
<link href="{{ asset('webhome/editcss/editablestyle.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
   <link rel="manifest" href="{{url('/manifest.json')}}">
   <link rel="manifest" href="{{url('/manifest.webmanifest')}}">

   <link rel="manifest" href="manifest.json">
<link rel="manifest" href="manifest.webmanifest">