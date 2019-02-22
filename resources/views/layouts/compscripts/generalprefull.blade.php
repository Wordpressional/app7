
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
 <script src="{{ asset('js/swiper.min.js') }}"></script>
 <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('js/validator.min.js') }}"></script>
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
   
 <script src="//smtpjs.com/v2/smtp.js"></script>
  
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


               
  
                

            </script>
    
 @include ('layouts.shortcode-layout')    
<script>
 $( document ).ready(function() {
  //alert("hi");
$('#testmail').click(function(){

var mfileconfname = document.getElementsByClassName('mfileconfname');  
var mfileconfname = mfileconfname[0].value;

  var base_path = "{{url('/')}}"; 
  //alert(base_path);
var Path1 = base_path+'/mailconfs/'+mfileconfname;
//alert(Path1);
  
 
 readTextFile(Path1);
 //alert(s);
});
});

 function doSomethingWithTheText(dataf1)
{
  ///alert(data);

  var mfileconfname = document.getElementsByClassName('mfileconfname');  
var mfileconfname = mfileconfname[0].value;

  var queryString = $('.cfs').serialize();
  //alert(queryString);
 var htmle= queryString.split("&");
 var htmle1= htmle.join("<br />");

 
  //alert(htmle1);
  var data = dataf1+'&htmle="'+htmle1+'"';

  //var new_str1 = dataf1.split("&");
  var new_str2 = dataf1.split("&htmle=")[0];
   
  var df = new_str2+'&htmle="'+htmle1+'"';
var df2 = df.split("mfileconfname")[0];
var df2 = df2+'"';
alert(df2);
 
  //var datak = 'dataf="'+data+'"&mfileconfname="'+mfileconfname+'"';
  var datak = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                dataf:String(df2),
                mfileconfname:String(mfileconfname)
                
            });
//alert(datak);
  $.ajax({
            headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                  'Content-Type': 'application/json'
                  },

                url: "{{route('mail.updatemailconfig')}}",
            datatype : "application/json",
            contentType: "json",
            
            type: 'post',
            data:  datak,
    
         success: function(data) {
          alert("File Upadated successfully");
           
        },
       
    });
  setTimeout(function(){ 
$.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json',

              "accept": "application/json",
              "Access-Control-Allow-Methods": "GET",
              "Access-Control-Allow-Credentials": true,
              "Access-Control-Allow-Origin":"http://localhost:8123/mymail",
              "Access-Control-Allow-Headers": "Content-Type, Authorization"
              },

            url: 'http://localhost:8123/mymail',
            datatype : "application/json",
            contentType: "json",
            crossDomain: true,
            type: 'get',
            data:  dataf1,
    
         success: function(data) {
          alert("Sent email successfully");
           
        },
       
    });

$.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json',

              "accept": "application/json",
              "Access-Control-Allow-Methods": "GET",
              "Access-Control-Allow-Credentials": true,
              "Access-Control-Allow-Origin":"http://139.59.47.15:8123/mymail",
              "Access-Control-Allow-Headers": "Content-Type, Authorization"
              },

            url: 'http://139.59.47.15:8123/mymail',
            datatype : "application/json",
            contentType: "json",
            crossDomain: true,
            type: 'get',
            data:  dataf1,
    
         success: function(data) {
          alert("Sent email successfully");
           
        },
       
    });

$.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json',

              "accept": "application/json",
              "Access-Control-Allow-Methods": "GET",
              "Access-Control-Allow-Credentials": true,
              "Access-Control-Allow-Origin":"http://pyrupay.com/mailapp3/mymail",
              "Access-Control-Allow-Headers": "Content-Type, Authorization"
              },

            url: 'http://pyrupay.com/mailapp3/mymail',
            datatype : "application/json",
            contentType: "json",
            crossDomain: true,
            type: 'get',
            data:  dataf1,
    
         success: function(data) {
          alert("Sent email successfully");
           
        },
       
    });
 }, 3000);
 }


</script>

<script src="{{asset('webhome/js/psmtpmail.js')}}" type="text/javascript"></script>

