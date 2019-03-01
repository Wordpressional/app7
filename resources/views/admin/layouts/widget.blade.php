
<!doctype html>
<html lang="{{ app()->getLocale() }}">
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

    <!-- Styles -->

    <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset(mix('css/admin.css')) }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/public.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
 <link rel="stylesheet" href="{{asset('css/bootstrap-colorpicker.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}" />
    

</head>
<body class="admin-body">
    <div class="wrapper">

        <div class="adminltehs">
        @include('admin.shared.header')
        @include('admin.shared.sidebar')
        </div>
    <div class="content-wrapper bg-light">

    <div id="app">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    @include('shared/alerts')
                        
                    <div class="card">
                        <div class="card-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset(mix('js/admin.js')) }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>
     <script type="text/javascript" src="{{asset('examples/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script> 
    <script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('js/colorcommon.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
   
   
   
   

    
   
    @yield('scripts')
</body>
</html>
