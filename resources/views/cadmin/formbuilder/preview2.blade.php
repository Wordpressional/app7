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


<link rel="stylesheet" href="{{asset('css/publiccommon.css')}}" />
<link href="{{ asset('webhome/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/css/customstyle.css') }}" rel="stylesheet">
<link href="{{ asset('webhome/css/responsive.css') }}" rel="stylesheet">
 <link rel="stylesheet" href="{{asset('css/public.css')}}" />


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="{{asset('dist/css/lightbox.min.css')}}" />

      {!! $form->htmlcontent !!} 
<!-- Bootstrap -->
<script src="{{ asset('webhome/js/jquery-3.3.1.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('webhome/js/popper.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
<script src="{{ asset(mix('js/app.js')) }}"></script>
<script src="{{ asset('js/jquery-ui.min.js')}}"></script>

<script src="{{ asset('js/easing.min.js') }}"></script>
<script src="{{ asset('js/effects.js') }}"></script>

<!-- Scripts -->
@if (Request::is('posts/*'))
<script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
@endif


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

  <script src="{{ asset('webhome/js/responsiveslides.min.js') }}"></script>
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
       
       <script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript">      </script> 
<script src="{{ asset('js/jssor.slider.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/common.js')}}" type="text/javascript"></script>
         <script type="text/javascript" src="{{asset('dist/js/lightbox-plus-jquery.min.js')}}"></script>
        <script type="text/javascript">jssor_1_slider_init();</script>

 

<script>


  $(function() {
      $('.backstretch').each(function(index, el) {
        var img = $(el).children('img');
        $(el).css('background', 'url(' + img.attr('src') + ') 50% 50% / cover fixed');
        img.remove();
      });
    });
</script>

<script type="text/javascript">
       $(".edit").click(function() {
  $(this).hide();
  $(".box").addClass("editable");
  $(".text").attr("contenteditable", "true");
  $(".save").show();
});

$(".save").click(function() {
  $(this).hide();
  $(".box").removeClass("editable");
  $(".text").removeAttr("contenteditable");
  $(".edit").show();
});

function readURL(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imagePreview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}
$("#imageUpload").change(function() {

    readURL(this);
});

    </script>
<style>
.edit, .save {
  width: 30px;
  display: block;
  position: absolute;
  top: 0px;
  right: 0px;
  padding: 4px 10px;
  border-top-right-radius: 2px;
  border-bottom-left-radius: 10px;
  text-align: center;
  cursor: pointer;
  box-shadow: -1px 1px 4px rgba(0,0,0,0.5);
}

.edit { 
  background: #557a11;
  color: #f0f0f0;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

.save {
  display: none;
  background: #bd0f18;
  color: #f0f0f0;
}

.box:hover .edit {
  opacity: 1;
}

img#imagePreview {
    display: block;
    height: 200px !important;
    width: 100%;
    border-radius: 15px;
    opacity: .5;
}
</style>
@include ('layouts.shortcode-layout')   