
<!DOCTYPE html>
<html lang="en">
    <head>
         @include('admin.layouts.compscripts.previewcss')
    @yield('css') 
 </head>
    <body>
   <div id="app">
     <div class="switch" style="text-align: center; cursor:pointer; line-height: 4.6em; padding-top: 20px;">
   <span><a style="font-size:30px; color:red; padding:20px;" class="requestDesktopSite">
   <i class="fa fa-desktop"></i></a> </span>
   <span><a style="font-size:30px; color:red; padding:20px;" class="requestMobileSite">
   <i class="fa fa-mobile"></i></a> </span>
    <span><a style="font-size:30px; color:red; padding:20px;" class="requestTabletSite">
   <i class="fa fa-tablet"></i></a> </span>

   </div>
    <div class="mau" id="mau">
     
  
   
    <div class="precon">

    {!! $form->htmlcontent !!} 
    </div>
    
  
 
</div>

<div class="precon1">
</div>
</div>

     
    @include('layouts.compscripts.general')
    @include('layouts.compscripts.themeone')
    @include('layouts.compscripts.independentcomponents')
    @include('layouts.compscripts.serviceworker')
       
         @include ('layouts.shortcode-layout')
         @stack('inline-scripts')

<script>

$(document).ready(function(){
$(".requestMobileSite").click(function(){
alert("mobile");

 
 $('a.phpdebugbar-restore-btn').css('display', 'none');
 $('.precon').css('display', 'none');
 $('.precon1').css('display', 'inline');
//myWindow = window.open("{{route('admin.forms.preview', $form->id)}}", '_blank', 'toolbar=no, directories=no, location=no, status=yes, menubar=no, resizable=no, scrollbars=yes, width=350, height=350');
$('.precon1').html('<center class="iframecentmobi"><iframe src="{{route("admin.forms.preview1", $form->id)}}" frameborder="0" scrolling="auto" id="mypreFrame" ></iframe></center>');


});

$(".requestDesktopSite").click(function(){
alert("desktop");

  location.reload();
// vpw = 100;
// vph = 'auto';
// $('.mau').css({'width': vpw + '%'});
// $('.mau').css({'height': vph});
// $('.mau').css({'height': vph + 'px'});
// $('.mau').css({'margin': 'auto'});
// $('.mau').css({'overflow': 'unset'});
});

$(".requestTabletSite").click(function(){
alert("tablet");
$('.precon1').css('display', 'none');
 $('.precon').css('display', 'inline');
 var vpw = 55;
 var vhw = 55;
 $('.mau').css({'max-width': vpw + '%'});
 $('.mau').css({'max-height': vhw + '%'});

 $('.mau').css({'margin': 'auto'});
 
});
});

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

.iframecentmobi
{
    background: url(../../../images/Phone.png);
    background-repeat: no-repeat;
    /* width: 500px; */
    background-size: 36%;
    background-position: bottom center;
    padding-right: 1px;
    margin-top: 30px;
    height: 930px;
    padding-top:170px;
}
</style>

</body>       
</html>
