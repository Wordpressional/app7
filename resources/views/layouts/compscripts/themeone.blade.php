 
<script src="{{ asset('js/jquery.mixitup.min.js') }}"></script>
  <!-- BOOTSTRAP JS -->
 
  <!-- TYPED JS -->
  <script src="{{ asset('js/typed-custom.js') }}"></script>
  <!-- WOW JS -->
  <script src="{{ asset('js/wow.min.js') }}"></script>
  <!-- scripts js -->

 <script>
    $(document).ready(function() {
      if($(".cd-main-content").length != 0) {
        var main = "{{ asset('js/main.js') }}";
        $("#headone").html("<script src=\"{{ asset('js/main.js') }}\" type=\"text/javascript\">\<\/script\>");
      }
    });
  </script>
        
<div id="headone"></div>

   
    <script>
      if($("#demo").length != 0) {
  
        var demo = new JParticles.particle( '#demo' );

        document.addEventListener( 'click', function( event ){
            var target = event.target;
            if( target.getAttribute('data-open') !== null ){
                demo.open();
            }else if( target.getAttribute('data-pause') !== null ){
                demo.pause();
            }
        });
      }

 
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
  
if($(".block").length != 0) {
  $('.block').parallax();
}
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
 
    
    
<script>
  $(function() {
      $('.backstretch').each(function(index, el) {
        var img = $(el).children('img');
        $(el).css('background', 'url(' + img.attr('src') + ') 50% 50% / cover fixed');
        img.remove();
      });
    });
</script>



<style>
label.imageUploadmparallaxone2
{
  display:none;
}
</style>