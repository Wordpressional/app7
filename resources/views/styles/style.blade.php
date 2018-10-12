@extends('admin.layouts.master')
@section('content')

<div style="display:none; padding-bottom:35px;" class="alert alert-success  form-control successalert"></div>
@php $st = isset($colorsetting[0]->color) ? $colorsetting[0]->color : false;
@endphp

   

<h3> Button Color </h3>
<div id="cp2" class="input-group colorpicker-component">
    <input type="text" name="cp2" id="demo2" value="{{ isset($colorsetting[0]->color) ? $colorsetting[0]->color : 'transparent' }}" class="form-control"  required="required" />
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br>
<h3> Content area Color </h3>
<div id="cp3" class="input-group colorpicker-component">
    <input type="text" name="cp3" id="demo3" value="{{ isset($colorsetting[1]->color) ? $colorsetting[1]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text"><i></i></span>
    
</div>
</div>
<br>
<h3> Heading 1 Color </h3>
<div id="cp4" class="input-group colorpicker-component">
    <input type="text" name="cp4" id="demo4" value="{{ isset($colorsetting[2]->color) ? $colorsetting[2]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
     
</div>
</div>
<br>
<h3> Heading 2 Color </h3>
<div id="cp5" class="input-group colorpicker-component">
    <input type="text" name="cp5" id="demo5" value="{{ isset($colorsetting[3]->color) ? $colorsetting[3]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
     
</div>
</div>
<br>
<h3> Heading 3 Color </h3>
<div id="cp6" class="input-group colorpicker-component">
    <input type="text" name="cp6" id="demo6" value="{{ isset($colorsetting[4]->color) ? $colorsetting[4]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br>
<h3> Heading 4 Color </h3>
<div id="cp7" class="input-group colorpicker-component">
    <input type="text" name="cp7" id="demo7" value="{{ isset($colorsetting[5]->color) ? $colorsetting[5]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br><h3> Heading 5 Color </h3>
<div id="cp8" class="input-group colorpicker-component">
    <input type="text" name="cp8" id="demo8" value="{{ isset($colorsetting[6]->color) ? $colorsetting[6]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br><h3> Heading 6 Color </h3>
<div id="cp9" class="input-group colorpicker-component">
    <input type="text" name="cp9" id="demo9" value="{{ isset($colorsetting[7]->color) ? $colorsetting[7]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
   
</div>
</div>
<br>
<h3> Background Page Color </h3>
<div id="cp10" class="input-group colorpicker-component">
    <input type="text" name="cp10" id="demo10" value="{{ isset($colorsetting[8]->color) ? $colorsetting[8]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br>
<h3> Link Color </h3>
<div id="cp11" class="input-group colorpicker-component">
    <input type="text" name="cp11" id="demo11" value="{{ isset($colorsetting[9]->color) ? $colorsetting[9]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br>
<h3> Link Hover Color </h3>
<div id="cp12" class="input-group colorpicker-component">
    <input type="text" name="cp12" id="demo12" value="{{ isset($colorsetting[10]->color) ? $colorsetting[10]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
   
</div>
</div>
<br>
<h3> Banner Background Color </h3>
<div id="cp13" class="input-group colorpicker-component">
    <input type="text" name="cp13" id="demo13" value="{{ isset($colorsetting[11]->color) ? $colorsetting[11]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br>

<h3> Login/Registration Page Background Color </h3>
<div id="cp14" class="input-group colorpicker-component">
    <input type="text" name="cp14" id="demo14" value="{{ isset($colorsetting[12]->color) ? $colorsetting[12]->color : 'transparent'}}" class="form-control"  required="required"/>
    <div class="input-group-prepend">
    <span class="input-group-addon input-group-text" ><i></i></span>
    
</div>
</div>
<br>

<meta name="_token" content="{{ csrf_token() }}"/>
<input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
<button id="apply">Apply</button>

@endsection
@section('scripts')

 <script type="text/javascript">
  $(function () {
    $("#apply").click(function(){
        //alert(this.id);
        var arrasso = {};
        
        var demo2 = $('#demo2').val();
        var demo3 = $('#demo3').val();
        var demo4 = $('#demo4').val();
        var demo5 = $('#demo5').val();
        var demo6 = $('#demo6').val();
        var demo7 = $('#demo7').val();
        var demo8 = $('#demo8').val();
        var demo9 = $('#demo9').val();
        var demo10 = $('#demo10').val();
        var demo11 = $('#demo11').val();
        var demo12 = $('#demo12').val();
         var demo13 = $('#demo13').val();
         var demo14 = $('#demo14').val();
        

        arrasso =  {"btncolor": demo2, "conareacolor": demo3, "h1color": demo4, "h2color": demo5, "h3color": demo6, "h4color": demo7, "h5color": demo8, "h6color": demo9, "bakpgcolor": demo10, "linkcolor": demo11, "linkhcolor": demo12, "bannerbg": demo13,  "loginbg": demo14};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

      // var data = JSON.stringify({
      //               _token: token,
      //               arrasso: arrasso

      //           });
 //alert(data);
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.storecolors')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                	//alert(result);
                	//alert("pppp");
                	$('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     setTimeout(function(){ 

                      
                      $('.successalert').css("display", "none"); }, 3000);

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });

          

    });
});
</script>

@endsection