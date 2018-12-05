<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
    @endauth

    <title>{{ config('app.name', 'Pyrupay') }}</title>

    <!-- Styles --> 
 <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
    <link href="{{ asset(mix('css/admin.css')) }}" rel="stylesheet">
     <link rel="stylesheet" href="{{asset('css/public.css')}}" />
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/skins/_all-skins.min.css')}}" />
   
    <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor-components.min.css')}}" />
    <!-- End of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('examples/plugins/code-prettify/src/prettify.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('examples/css/examples.css')}}" />
     <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor-components.min.css')}}" />
    <!-- End of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('examples/plugins/code-prettify/src/prettify.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('examples/css/examples.css')}}" />
     <link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
     <link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
    

</head>
<body>
    <div data-keditor="html">
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
</div>
    <!-- Scripts -->
    <script src="{{ asset(mix('js/app.js')) }}"></script>
    <script src="{{ asset(mix('js/admin.js')) }}"></script>
    <script src="{{ asset('js/adminlte.min.js') }}"></script>

 

    <script type="text/javascript" src="{{asset('examples/plugins/jquery-1.11.3/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/bootstrap-3.3.6/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
        
    <script type="text/javascript" src="{{asset('examples/plugins/jquery.nicescroll-3.6.6/jquery.nicescroll.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/ckeditor-4.5.6/ckeditor.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/ckeditor-4.5.6/adapters/jquery.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/formBuilder-2.5.3/form-builder.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/formBuilder-2.5.3/form-render.min.js')}}"></script>
        <!-- Start of KEditor scripts -->
        <script type="text/javascript" src="{{asset('dist/js/keditor.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('dist/js/keditor-components.min.js')}}"></script>
        <!-- End of KEditor scripts -->
        <script type="text/javascript" src="{{asset('examples/plugins/code-prettify/src/prettify.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/js-beautify-1.7.5/js/lib/beautify.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/plugins/js-beautify-1.7.5/js/lib/beautify-html.js')}}"></script>
        <script type="text/javascript" src="{{asset('examples/js/examples.js')}}"></script>
        <script src="{{ asset('webhome/js/responsiveslides.min.js') }}"></script>
        <script>
                $(".rslides").responsiveSlides({
                auto: true,             // Boolean: Animate automatically, true or false
                speed: 500,            // Integer: Speed of the transition, in milliseconds
                timeout: 4000,          // Integer: Time between slide transitions, in milliseconds
                pager: true,           // Boolean: Show pager, true or false
                pagination: true,
                nav: true,             // Boolean: Show navigation, true or false
                random: false,          // Boolean: Randomize the order of the slides, true or false
                pause: false,           // Boolean: Pause on hover, true or false
                pauseControls: true,    // Boolean: Pause when hovering controls, true or false
                prevText: "Previous",   // String: Text for the "previous" button
                nextText: "Next",       // String: Text for the "next" button
                maxwidth: 900,           // Integer: Max-width of the slideshow, in pixels
                navContainer: "",       // Selector: Where controls should be appended to, default is after the 'ul'
                manualControls: "",     // Selector: Declare custom pager navigation
                namespace: "rslides",   // String: Change the default namespace used
                before: function(){},   // Function: Before callback
                after: function(){}     // Function: After callback
                });


               
                
                

            </script>

    @yield('scripts')
    <style>
    #imageUpload1,#imageUpload2  {
  display:none;
}
</style>
</body>
</html>
