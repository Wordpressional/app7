<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


<!-- Bootstrap -->
<script src="{{ asset('webhome/js/jquery-3.3.1.min.js') }}"></script>

<!-- Popper JS -->
<script src="{{ asset('webhome/js/popper.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('webhome/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js')}}"></script>
<script src="{{ asset('js/jquery.easing.min.js') }}"></script>
 <script src="{{ asset('js/easing.min.js') }}"></script>
 <script src="{{ asset('js/swiper.min.js') }}"></script>
 <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('js/validator.min.js') }}"></script>
<script src="{{ asset('webhome/js/form-render.min.js') }}"></script>


<!-- Scripts -->
@if (Request::is('posts/*'))
<script src="//{{ Request::getHost() }}:8888/socket.io/socket.io.js"></script>
@endif







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

   <!-- TYPED JS -->
  <script src="{{ asset('js/typed-custom.js') }}"></script>
  <!-- WOW JS -->
  <script src="{{ asset('js/wow.min.js') }}"></script>
  
   <!-- Extra plugin css -->
        <script src="{{ asset('webhome/vendors/counterup/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/apear.js') }}"></script>
        <script src="{{ asset('webhome/vendors/counterup/countto.js') }}"></script>
        <script src="{{ asset('webhome/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('webhome/vendors/parallaxer/jquery.parallax-1.1.3.js') }}"></script>
        <!--Tweets-->
       
        <script src="{{ asset('js/adminlte.min.js') }}"></script>
       
      
 


<script src="{{ asset('webhome/editjs/editablejs.js') }}" type="text/javascript">      </script> 
