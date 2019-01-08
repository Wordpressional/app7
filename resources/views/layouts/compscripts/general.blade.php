<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{ asset('webhome/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('webhome/js/popper.min.js') }}"></script>
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

        <script type="text/javascript">

          if($(".currentStyle").length != 0) {
             jssor_1_slider_init();
          }
      </script>
 
