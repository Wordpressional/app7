<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Research Centre Vergelijkende Cultuurwetenschap</title>
		
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		@auth
		<meta name="api-token" content="{{ auth()->user()->api_token }}">
		@endauth

    <title>{{ config('app.name', 'Research Centre Vergelijkende Cultuurwetenschap') }}</title>

        <!-- Icon css link -->
        <link href="{{ asset('webhome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/elegant-icon/style.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/themify-icon/themify-icons.css') }}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('webhome/css/bootstrap.min.css') }}" rel="stylesheet">

       


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
 </head>
    <body class="bg-light">
       
                     @yield('contentfrontend')
    

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('webhome/js/jquery-3.2.1.min.js') }}"></script>
       
        <script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('webhome/js/theme.js') }}"></script>
		 <!-- Scripts -->
		@if (Request::is('posts/*'))
		<script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
		@endif
		<script src="{{ asset(mix('js/app.js')) }}"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
         <script src="{{ asset('webhome/js/form-render.min.js') }}"></script>
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
             <script type="text/javascript">
          $(function () {
           
            $('#content-area').find('section').attr('contentEditable',false);
            $('#previewtest').find('section').attr('contentEditable',false);

            $( ".keditor-toolbar").hide();
            
           

          jQuery(document).on('ready', function(){
    
            $('a.page-scroll').on('click', function(e){
                var anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(anchor.attr('href')).offset().top - 50
                }, 1500);
                e.preventDefault();
                });     
            });
        });     

        </script>
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

		@stack('inline-scripts')
    </body>       
</html>
