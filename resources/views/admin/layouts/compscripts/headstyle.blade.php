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

<!-- Styles -->


<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" />
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
<link href="{{ asset(mix('css/admin.css')) }}" rel="stylesheet">



<link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">


<link rel="stylesheet" href="{{asset('css/bootstrap-colorpicker.min.css')}}" />


<link rel="stylesheet" type="text/css" href="{{asset('examples/plugins/code-prettify/src/prettify.css')}}" />
<link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/public.css')}}" />
<link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('examples/css/examples.css')}}" />

<link rel="manifest" href="{{url('/manifest.json')}}">
<link rel="manifest" href="{{url('/manifest.webmanifest')}}">

<link rel="manifest" href="manifest.json">
<link rel="manifest" href="manifest.webmanifest">