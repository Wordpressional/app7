
<!-- Bootstrap -->
<script src="{{ asset('webhome/js/jquery-3.3.1.min.js') }}"></script>

<!-- Popper JS -->
<script src="{{ asset('webhome/js/popper.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dist/js/lightbox-plus-jquery.min.js')}}"></script>
<script src="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.js') }}"></script>

<!--Tweets-->
<script src="{{ asset('js/jssor.slider.min.js')}}" type="text/javascript"></script>


<!-- Scripts -->
@if (Request::is('posts/*'))
<script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
@endif

<script src="{{ asset(mix('js/app.js')) }}"></script>
<script src="{{ asset('webhome/js/form-render.min.js') }}"></script>

<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
<script src="{{ asset('js/superfish.min.js')}}"></script>
 <script src="{{ asset('js/swiper.min.js') }}"></script>
 <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('js/validator.min.js') }}"></script>

<script src="{{ asset('js/mn-accordion.js') }}"></script>
<script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.counterup.min.js') }}"></script>

<script src="{{ asset('webhome/vendors/parallaxer/jquery.parallax-1.1.3.js') }}"></script>
<!-- Rev slider js -->
  <script src="{{ asset('webhome/vendors/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
   
 
  
<!-- Extra plugin css -->
<script src="{{ asset('webhome/vendors/counterup/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/counterup/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('webhome/vendors/counterup/apear.js') }}"></script>
<script src="{{ asset('webhome/vendors/counterup/countto.js') }}"></script>

<script src="{{ asset('js/adminlte.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.inview.min.js') }}"></script>
 <script type="text/javascript" src="{{ asset('js/smoothscroll.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/mousescroll.js') }}"></script>
  

<script src="{{ asset('webhome/js/form-builder.min.js') }}"></script>


<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
   
 
<!-- TYPED JS -->
  <script src="{{ asset('js/typed-custom.js') }}"></script>
  <!-- WOW JS -->
  <script src="{{ asset('js/wow.min.js') }}"></script>
  
 

      

 <script src="{{ asset('webhome/js/theme.js') }}"></script>
        <script src="{{ asset('js/common.js')}}" type="text/javascript"></script>
        
        <script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript">      </script> 
       
        
        
        <script type="text/javascript"> if($("#jssor_1").length != 0) {
  jssor_1_slider_init(); }</script>

<script type="text/javascript">
  $(function () {
   $('#content-area').find('section').attr('contentEditable',false);
    $('#previewtest').find('section').attr('contentEditable',false);
    $( ".keditor-toolbar").hide();
    
  

});     
 </script>   
<script src="{{ asset('js/nextgallery.js') }}"></script>   
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


               
 $(document).ready(function() {
  if($(".mlthemeone.navbar-custom").length != 0) {
   $('.mlthemeone.navbar-custom').css('position', 'static');
 }
 if($(".main_h").length != 0 ) {
  $('.main_h').css('position', 'relative');
$('.main_h').css('top', '-15px');
}
  $( '.keditor-ui > p:empty' ).remove();

});  


$(window).scroll(function() {
if($(".mlthemeone.navbar-custom").length != 0 ) {
if ($(window).scrollTop() > 200) {
  
    $('.mlthemeone.navbar-custom').css('position', 'fixed');
} else {
  
  $('.mlthemeone.navbar-custom').css('position', 'static');

}

}


if($(".main_h").length != 0 ) {
if ($(window).scrollTop() > 100) {
  
    $('.main_h').css('position', 'fixed');
    $('.main_h').css('top', '0px');
} else {
  
  $('.main_h').css('position', 'relative');
$('.main_h').css('top', '-15px');
}

}
});
                

            </script>
    
 @include ('layouts.shortcode-layout')    
 