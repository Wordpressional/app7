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

    <!-- Styles --> 
 <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset(mix('css/admin.css')) }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/public.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
   
    <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor-components.min.css')}}" />