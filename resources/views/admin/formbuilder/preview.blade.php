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
      {!! $form->htmlcontent !!}  
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
<script src="{{ asset('js/jssor.slider.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/common.js')}}" type="text/javascript"></script>
        <script type="text/javascript">jssor_1_slider_init();</script>