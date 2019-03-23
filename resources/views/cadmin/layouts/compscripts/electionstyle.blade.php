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
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
    <link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/bootstrap-colorpicker.min.css')}}" />
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">

 <link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
 <link rel="stylesheet" href="{{asset('css/dataTables.responsive.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="//cdn.datatables.net/scroller/1.5.1/css/scroller.dataTables.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/election.css')}}" />

    <link rel="manifest" href="{{url('/manifest.json')}}">
   <link rel="manifest" href="{{url('/manifest.webmanifest')}}">