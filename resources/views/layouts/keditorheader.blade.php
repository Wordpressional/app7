<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/fav-icon.png" type="image/x-icon" />
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

      <!-- Start of KEditor styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/keditor-components.min.css')}}" />
    <!-- End of KEditor styles -->
        <link href="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.css') }}" rel="stylesheet">

        <link href="{{ asset('webhome/css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
         <link href="{{ asset('webhome/css/responsive.css') }}" rel="stylesheet">
          <link rel="stylesheet" href="{{asset('css/front.css')}}" />
          <link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
          <link rel="stylesheet" href="{{asset('css/bootstrap-colorpicker.min.css')}}" />
           <link href="{{ asset('webhome/editcss/editablestyle.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

 </head>
    <body>
    <div class="container ">
        <div class="row">
    @yield('content')
    <div id="app">
    </div>
        </div>
    </div>
 

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{ asset('webhome/js/jquery-3.2.1.min.js') }}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('webhome/js/popper.min.js') }}"></script>
        <script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
        <!-- Start of KEditor scripts -->
        <script type="text/javascript" src="{{asset('dist/js/keditor.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('dist/js/keditor-components.min.js')}}"></script>
        <!-- End of KEditor scripts -->
        <script src="{{ asset('webhome/vendors/counterup/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/apear.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/countto.js') }}"></script>
        <script src="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/parallaxer/jquery.parallax-1.1.3.js') }}"></script>
        <!--Tweets-->
       
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
        <script src="{{ asset('webhome/js/theme.js') }}"></script>
        <script src="{{ asset('webhome/js/responsiveslides.min.js') }}"></script>
       <script src="{{ asset(mix('js/app.js')) }}"></script>
       @yield('scripts')
       <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

       <script src="{{ asset('js/jssor.slider.min.js')}}" type="text/javascript"></script>
       <script src="{{ asset('js/common.js')}}" type="text/javascript"></script>
            <script type="text/javascript">jssor_1_slider_init();</script>
      
       <script src="{{ asset('webhome/js/jparticles.js')}}"></script>
    <script src="{{ asset('webhome/js/particle.js')}}"></script>
    <script src="{{ asset('webhome/js/require.js')}}"></script>
    <script src="{{ asset('js/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('js/colorcommon.js') }}"></script>
   
    <script>
        var demo = new JParticles.particle( '#demo' );

        document.addEventListener( 'click', function( event ){
            var target = event.target;
            if( target.getAttribute('data-open') !== null ){
                demo.open();
            }else if( target.getAttribute('data-pause') !== null ){
                demo.pause();
            }
        });

 
  $('.img-parallax').each(function(){
  var img = $(this);
  var imgParent = $(this).parent();
  function parallaxImg () {
    var speed = img.data('speed');
    var imgY = imgParent.offset().top;
    var winY = $(this).scrollTop();
    var winH = $(this).height();
    var parentH = imgParent.innerHeight();


    // The next pixel to show on screen      
    var winBottom = winY + winH;

    // If block is shown on screen
    if (winBottom > imgY && winY < imgY + parentH) {
      // Number of pixels shown after block appear
      var imgBottom = ((winBottom - imgY) * speed);
      // Max number of pixels until block disappear
      var imgTop = winH + parentH;
      // Porcentage between start showing until disappearing
      var imgPercent = ((imgBottom / imgTop) * 100) + (50 - (speed * 50));
    }
    img.css({
      top: imgPercent + '%',
      transform: 'translate(-50%, -' + imgPercent + '%)'
    });
  }
  $(document).on({
    scroll: function () {
      parallaxImg();
    }, ready: function () {
      parallaxImg();
    }
  });
});

  $(document).ready(function() {
  

  $('.block').parallax();
});

  $( document ).ready(function() {
var $window = $(window);
function scroll_elements(){
  var scroll = $window.scrollTop();
  var scrollLayer = scroll/1.4;
  
  $(".project-image").css(
    "-webkit-transform","translate3d(0," +  scrollLayer  + "px,0)",
            "transform","translate3d(0," +  scrollLayer  + "px,0)"
  );
}

$window.scroll(scroll_elements);
});


    </script>
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
<script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript"></script>
            
    </body>       
</html>
