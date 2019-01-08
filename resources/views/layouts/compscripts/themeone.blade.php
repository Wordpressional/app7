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

<script type="text/javascript">
   $(".imageUpload1").hide();
    $(".imageUpload2").hide();
$(".edit1").click(function() {
  $(this).hide();
  $(".box").addClass("editable");
  $(".text").attr("contenteditable", "true");
  $(".save1").show();
  $(".imageUpload1").show();
});

$(".save1").click(function() {
  $(this).hide();
  $(".box").removeClass("editable");
  $(".text").removeAttr("contenteditable");
  $(".edit1").show();
  $(".imageUpload1").hide();
  Uploadsave2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".edit3").click(function() {
  $(this).hide();
  $(".box").addClass("editable");
  $(".text").attr("contenteditable", "true");
  $(".save3").show();
  
});

$(".save3").click(function() {
  $(this).hide();
  $(".box").removeClass("editable");
  $(".text").removeAttr("contenteditable");
  $(".edit3").show();
 
  Uploadsave2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".edit2").click(function() {
  $(this).hide();
  $(".box").addClass("editable");
  $(".text").attr("contenteditable", "true");
  $(".save2").show();
  $(".imageUpload2").show();
});

$(".save2").click(function() {
  $(this).hide();
  $(".box").removeClass("editable");
  $(".text").removeAttr("contenteditable");
  $(".edit2").show();
  $(".imageUpload2").hide();

  Uploadsave2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

function readURL1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imagePreview1').attr('src', e.target.result);
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

$("#imageUpload1").change(function() {

    readURL1(this);
});

function readURL2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#imagePreview2').attr('src', e.target.result);
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

$("#imageUpload2").change(function() {

    readURL2(this);
});

function Uploadsave2(newLocation, id)
        {
            
            var fileContent = $('.precon').html();
            var id = id;
            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
           

             var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                
                htmlcontent:String(fileContent),
                id: id
            });

            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: newLocation,
           
            type: 'post',
            data:  data,
            
            success: function(result) {
            if(result == "success"){
                var newLocation = "{{ url('/admin/forms') }}";
              window.location.href= newLocation;
            }
           
            //alert(result);
            //window.location.href= url('/');
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                  }
              }
            });
            
        
        }

    </script>
    <style>
.edit1, .save1 {
  width: 90px;
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
  z-index: 10000;
}

.edit1 { 
  background: #557a11;
  color: #f0f0f0;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

.save1 {
  display: none;
  background: #bd0f18;
  color: #f0f0f0;
}

.box:hover .edit1 {
  opacity: 1;
}

.edit2, .save2 {
  width: 90px;
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
  z-index: 10000;
}

.edit2 { 
  background: #557a11;
  color: #f0f0f0;
  opacity: 0;
  transition: opacity .2s ease-in-out;
}

.save2 {
  display: none;
  background: #bd0f18;
  color: #f0f0f0;
}

.box:hover .edit2 {
  opacity: 1;
}


img#imagePreview1 {
    display: block;
    height: 200px !important;
    width: 100%;
    border-radius: 15px;
    opacity: .5;
}
img#imagePreview2 {
    display: block;
    height: 200px !important;
    width: 100%;
    border-radius: 15px;
    opacity: .5;
}

#imageUpload1,#imageUpload2  {
  display:none;
}

label:after {
  content: "\f093";
  font-family: "FontAwesome";
  color: black;
  width: 30px;
  display: block;
  position: absolute;
  top: 0px;
  right: 80px;
  padding: 4px 10px;
  border-top-right-radius: 2px;
  border-bottom-left-radius: 10px;
  text-align: center;
  cursor: pointer;
  box-shadow: -1px 1px 4px rgba(0,0,0,0.5);
  z-index: 10000;
  margin: auto;
  background-color: white;
}
</style>
