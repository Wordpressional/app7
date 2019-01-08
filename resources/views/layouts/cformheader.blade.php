
</html>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if($data)
        <link rel="icon" href="{{asset($data['n_companyname']->favicon)}}" type="image/x-icon" />
        @endif
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Pyrupay</title>
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @auth
        <meta name="api-token" content="{{ auth()->user()->api_token }}">
        @endauth

    <title>{{ config('app.name', 'Pyrupay') }}</title>

        <!-- Icon css link -->
        <link href="{{ asset('webhome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/elegant-icon/style.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/vendors/themify-icon/themify-icons.css') }}" rel="stylesheet">
        <!-- Bootstrap -->
        <link href="{{ asset('webhome/css/bootstrap.min.css') }}" rel="stylesheet">

     
        <link href="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">

        <link href="{{ asset('webhome/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
         <link href="{{ asset('webhome/css/responsive.css') }}" rel="stylesheet">
          <link rel="stylesheet" href="{{asset('css/front.css')}}" />
           <link href="{{ asset('webhome/editcss/editablestyle.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
   
 </head>
    <body>
 
    @yield('content')
    
    <div id="app">
    </div>
 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('webhome/js/jquery-3.2.1.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('webhome/js/popper.min.js') }}"></script>
        <script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
       
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
         <script src="{{ asset('webhome/js/form-builder.min.js') }}"></script>
        <script src="{{ asset('webhome/js/form-render.min.js') }}"></script>
        
       <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
       <script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript"></script>
       @yield('scripts')
    </body>       
</html>
