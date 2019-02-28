
<!DOCTYPE html>
<html lang="en">
    <head>
         @include('admin.layouts.compscripts.previewcss')
         @include('layouts.compscripts.componentstyle')
    @yield('css') 
 </head>
    <body>
   <div id="app">
     <div class="switch" style="text-align: center; cursor:pointer; line-height: 4.6em; padding-top: 20px;">
      <span><a style="font-size:30px; color:red; padding:20px;" class="requestEditSite">
   <i class="fa fa-edit"></i></a> </span>
   <span><a style="font-size:30px; color:red; padding:20px;" class="requestDesktopSite">
   <i class="fa fa-desktop"></i></a> </span>

   <span><a style="font-size:30px; color:red; padding:20px;" class="requestMobileSite">
   <i class="fa fa-mobile"></i></a> </span>
    <span><a style="font-size:30px; color:red; padding:20px;" class="requestTabletSite">
   <i class="fa fa-tablet"></i></a> </span>

   </div>
   <br>
   <center><p>Upload images of size below 25 KB</p></center>
   <br>
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <form method="POST" class="previewf" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="mau" id="mau">
     
  
   

    <div class="precon">

    {!! $form->htmlcontent !!} 
    </div>
    
  

 
</div>
</form>
<div class="precon1">
</div>


</div>
     
    @include('layouts.compscripts.generalpre')
    @include('layouts.compscripts.themeone')
    @include('layouts.compscripts.independentcomponents')
    @include('layouts.compscripts.serviceworker')
       
         @include ('layouts.shortcode-layout')
         @stack('inline-scripts')

<script>

$(document).ready(function(){
$(".requestMobileSite").click(function(){


//alert("mobile");
if(detectmob()){
  alert("This function works only on desktop");
} else {
  $('a.phpdebugbar-restore-btn').css('display', 'none');
 $('.precon').css('display', 'none');
 $('.precon1').css('display', 'inline');
//myWindow = window.open("{{route('admin.forms.preview', $form->id)}}", '_blank', 'toolbar=no, directories=no, location=no, status=yes, menubar=no, resizable=no, scrollbars=yes, width=350, height=350');
$('.precon1').html('<center class="iframecentmobi"><iframe src="{{route("admin.forms.preview1", $form->id)}}" frameborder="0" scrolling="auto" id="mypreFrame" ></iframe></center>');


}
 
 
});

$(".requestEditSite").click(function(){
//alert("desktop");
window.location.href = "{{ url('/admin/forms/preview')}}"+"/"+"{{$form->id}}";
  
// vpw = 100;
// vph = 'auto';
// $('.mau').css({'width': vpw + '%'});
// $('.mau').css({'height': vph});
// $('.mau').css({'height': vph + 'px'});
// $('.mau').css({'margin': 'auto'});
// $('.mau').css({'overflow': 'unset'});
});
$(".requestDesktopSite").click(function(){
//alert("desktop");
window.location.href = "{{ url('/admin/forms/previewfull')}}"+"/"+"{{$form->id}}";
  
// vpw = 100;
// vph = 'auto';
// $('.mau').css({'width': vpw + '%'});
// $('.mau').css({'height': vph});
// $('.mau').css({'height': vph + 'px'});
// $('.mau').css({'margin': 'auto'});
// $('.mau').css({'overflow': 'unset'});
});

$(".requestTabletSite").click(function(){

 
/*  if(detectmob()){
  alert("This function works only on desktop");
} else {
//alert("tablet");
$('.precon1').css('display', 'none');
 $('.precon').css('display', 'inline');
 var vpw = 55;
 var vhw = 55;
 $('.mau').css({'max-width': vpw + '%'});
 $('.mau').css({'max-height': vhw + '%'});

 $('.mau').css({'margin': 'auto'});
 }

});*/
//alert("tablet");
if(detectmob()){
  alert("This function works only on desktop");
} else {
  $('a.phpdebugbar-restore-btn').css('display', 'none');
 $('.precon').css('display', 'none');
 $('.precon1').css('display', 'inline');

$('.precon1').html('<center class="iframecentmobi1"><iframe src="{{route("admin.forms.preview1", $form->id)}}" frameborder="0" scrolling="auto" id="mypreFrame1" ></iframe></center>');
}
});
});
function detectmob() {
   if(window.innerWidth <= 1000 && window.innerHeight <= 800) {
     return true;
   } else {
     return false;
   }
}


(function($){
    $.fn.dropdowns = function (options) {
        
        var defaults = {
            toggleWidth: 768
        }
        
        var options = $.extend(defaults, options);
        
        var ww = document.body.clientWidth;
        
        var addParents = function() {
            $(".navtop1 li a").each(function() {
                if ($(this).next().length > 0) {
                    $(this).addClass("parent");
                }
            });
        }
        
        var adjustMenu = function() {
            if (ww < options.toggleWidth) {
                $(".toggleMenu").css("display", "inline-block");
                if (!$(".toggleMenu").hasClass("active")) {
                    $(".navtop1").hide();
                } else {
                    $(".navtop1").show();
                }
                $(".navtop1 li").unbind('mouseenter mouseleave');
                $(".navtop1 li a.parent").unbind('click').bind('click', function(e) {
                    // must be attached to anchor element to prevent bubbling
                    e.preventDefault();
                    $(this).parent("li").toggleClass("hover");
                });
            } 
            else if (ww >= options.toggleWidth) {
                $(".toggleMenu").css("display", "none");
                $(".navtop1").show();
                $(".navtop1 li").removeClass("hover");
                $(".navtop1 li a").unbind('click');
                $(".navtop1 li").unbind('mouseenter mouseleave').bind('mouseenter mouseleave', function() {
                    // must be attached to li so that mouseleave is not triggered when hover over submenu
                    $(this).toggleClass('hover');
                });
            }
        }
        
        return this.each(function() {
            $(".toggleMenu").click(function(e) {
                e.preventDefault();
                $(this).toggleClass("active");
                $(this).next(".navtop1").toggle();
                adjustMenu();
            });
            adjustMenu();
            addParents();
            $(window).bind('resize orientationchange', function() {
                ww = document.body.clientWidth;
                adjustMenu();
            });
        });
    
    }
})(jQuery)

$(".dropdowns").dropdowns();



</script>

<style>
.mau {
    margin: auto !important;
   width:100%;

} 
   
.keditor-container-content {
    padding: 0px;
}

.precon1{
  display: none;

}

.precon{
  display: inline;
}

#mypreFrame{
  width:30%;
   height:600px;
   
}

#mypreFrame1{
  width:70%;
   height:520px;
   
}

.iframecentmobi
{
    background: url(../../../images/Phone.png);
    background-repeat: no-repeat;
    width: 1200px; 
    background-size: 36%;
    background-position: bottom center;
    padding-right: 1px;
    margin-top: 30px;
    height: 930px;
    padding-top:170px;
}

.iframecentmobi1
{
    background: url(../../../images/Tablet.png);
    background-repeat: no-repeat;
    width: 1200px; 
    background-size: 88%;
    background-position: bottom center;
    padding-right: 1px;
    margin-top: 30px;
    height: 800px;
    padding-top:170px;
}

.main_h {
    position: static;
}
.mlthemeone.navbar-custom{
   position: static;
}

#mpolheader{
   position: static;
}

.navbar-fixed-top {
    position: static;
    
}

</style>

</body>       
</html>
