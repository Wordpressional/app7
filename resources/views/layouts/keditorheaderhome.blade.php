
<!DOCTYPE html>
<html lang="en">
    <head>
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
      <!-- Icon css link -->


     
    
<link href="{{ asset('webhome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/vendors/elegant-icon/style.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/vendors/themify-icon/themify-icons.css') }}" rel="stylesheet">
<!-- Bootstrap -->
<link href="{{ asset('webhome/css/bootstrap.min.css') }}" rel="stylesheet">


<!-- Rev slider css -->
  <link href="{{ asset('webhome/vendors/revolution/css/settings.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/revolution/css/layers.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/revolution/css/navigation.css') }}" rel="stylesheet">
  <link href="{{ asset('webhome/vendors/animate-css/animate.css') }}" rel="stylesheet">


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
<link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
 <link rel="stylesheet" href="{{asset('css/public.css')}}" />
 <link rel="stylesheet" type="text/css" href="{{asset('dist/css/lightbox.min.css')}}" />
  <link href="{{ asset('webhome/editcss/editablestyle.css') }}" rel="stylesheet">

  
   <link rel="manifest" href="{{url('/manifest.json')}}">
   <link rel="manifest" href="{{url('/manifest.webmanifest')}}">
 </head>
    <body>
    <div id="app">
    <div class="bg-mycolor1">     
   <div class="rempm">
    
   
    
    @yield('content')
  </div>
  
   
       
    </div>
  </div>
   
 

  

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('webhome/js/jquery-3.2.1.min.js') }}"></script>

<script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('webhome/js/theme.js') }}"></script>
<!-- Scripts -->
@if (Request::is('posts/*'))
<script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
@endif
<script src="{{ asset(mix('js/app.js')) }}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script src="{{ asset('webhome/js/form-render.min.js') }}"></script>

<!-- Rev slider js -->
  <script src="{{ asset('webhome/vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
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

  
   <!-- Extra plugin css -->
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












       <script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript">      </script> 
<script src="{{ asset('js/jssor.slider.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/common.js')}}" type="text/javascript"></script>
         <script type="text/javascript" src="{{asset('dist/js/lightbox-plus-jquery.min.js')}}"></script>
        <script type="text/javascript">jssor_1_slider_init();</script>
 
<script src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
  <!-- BOOTSTRAP JS -->
 
  <!-- TYPED JS -->
  <script src="{{ asset('js/typed-custom.js') }}"></script>
  <!-- WOW JS -->
  <script src="{{ asset('js/wow.min.js') }}"></script>
  <!-- scripts js -->
  <script src="{{ asset('js/main.js') }}"></script>


   
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
    
 @include ('layouts.shortcode-layout')    
<script>
  $(function() {
      $('.backstretch').each(function(index, el) {
        var img = $(el).children('img');
        $(el).css('background', 'url(' + img.attr('src') + ') 50% 50% / cover fixed');
        img.remove();
      });
    });
</script>

<script src="{{ asset('upup.min.js') }}"></script>
<script src="{{ asset('upup.sw.min.js') }}"></script>
<script>
UpUp.start({
  'content': 'You are Offline. Cannot reach site. Please check your internet connection.',
  'service-worker-url': "{{ asset('upup.sw.min.js') }}"
});

$(document).ready(function() {

if ('serviceWorker' in navigator) {
    console.log("Will the service worker register?");
    navigator.serviceWorker.register("{{ asset('upup.sw.min.js') }}")
      .then(function(reg){
        console.log("Yes, it did.");
      }).catch(function(err) {
        console.log("No it didn't. This happened: ", err)
      });
  }

 

});
</script>


</body>       
</html>
