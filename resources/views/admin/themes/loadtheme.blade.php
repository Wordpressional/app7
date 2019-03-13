
@extends('admin.layouts.master')
@section('content')

<div class="codefiles" style="display:none;">
<h3> Pre Installed Themes </h3>
<div class="row">
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
  <h5> Portfolio Theme - T1 </h5>
<input type="text" id="themename0" name="themename0" value="Portfolio Theme - T1" style="display:none;">
<textarea rows="5" cols="70" id="theme0"  class="form-control fc" required="required" style="display:none;">{{ $themeone }}</textarea> 
 </div>  

</div>
<div class="row">
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> Personal Theme - T2 </h5>
<input type="text" id="themename1" name="themename1" value="Personal Theme - T2 " style="display:none;">
<textarea rows="5" cols="70" id="theme1"  class="form-control fc" required="required" style="display:none;">{{ $themetwo }}</textarea> 
   
</div>

<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> Loan Theme - T3 </h5>
<input type="text" id="themename2" name="themename2" value="Loan Theme - T3 " style="display:none;">
<textarea rows="5" cols="70" id="theme2"  class="form-control fc" required="required" style="display:none;">{{ $themethree }}</textarea>
 
</div>
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> Business Theme - T4 </h5>
<input type="text" id="themename3" name="themename3" value="Business Theme - T4" style="display:none;">
<textarea rows="5" cols="70" id="theme3"  class="form-control fc" required="required" style="display:none;">{{ $themefour }}</textarea>

</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> Politics Theme - T5 </h5>
<input type="text" id="themename4" name="themename4" value="Politics Theme - T5" style="display:none;">
<textarea rows="5" cols="70" id="theme4"  class="form-control fc" required="required" style="display:none;">{{ $themefive }}</textarea> 


</div>
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> General Theme - T01 </h5>
<input type="text" id="themename5" name="themename5" value="General Theme - T01" style="display:none;">
<textarea rows="5" cols="70" id="theme5"  class="form-control fc" required="required" style="display:none;">{{ $themesix }}</textarea>
</div>
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> Basic Theme - T02 </h5>
<input type="text" id="themename6" name="themename6" value="Basic Theme - T02" style="display:none;">
<textarea rows="5" cols="70" id="theme6"  class="form-control fc" required="required" style="display:none;">{{ $themeseven }}</textarea>

</div>
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> BJP Theme One - TP1 </h5>
<input type="text" id="themename7" name="themename7" value="BJP Theme One - TP1" style="display:none;">
<textarea rows="5" cols="70" id="theme7"  class="form-control fc" required="required" style="display:none;">{{ $themebjpone }}</textarea>

</div>
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> BJP Theme Two - TP2 </h5>
<input type="text" id="themename8" name="themename8" value="BJP Theme Two - TP2" style="display:none;">
<textarea rows="5" cols="70" id="theme8"  class="form-control fc" required="required" style="display:none;">{{ $themebjptwo }}</textarea>

</div>
<div class="col-lg-3 col-md-3 bdstyle1 preinstall">
<h5> BJP Theme Three - TP3 </h5>
<input type="text" id="themename9" name="themename9" value="BJP Theme Three - TP3" style="display:none;">
<textarea rows="5" cols="70" id="theme9"  class="form-control fc" required="required" style="display:none;">{{ $themebjpthree }}</textarea>

</div>
</div>
</div>


<meta name="_token" content="{{ csrf_token() }}"/>
<input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
@if($themes == "empty")

<button id="load">Load Pre Installed Themes</button>
@endif

@if($themes != "empty")
<h3> Installed Themes </h3>
 <button id="reload">Reload/Update Pre Installed Themes</button>

 <button class="divthatholdstheimage"> Screenshots <i class="fa fa-image " style="font-size: 20px;">&nbsp;</i></button>

<div  class="successealertone" style="color:red;"></div>
<div class="row">

@php 

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}


@endphp

@foreach($themes as $theme)
@php  $tcolor = random_color(); @endphp
@php $capturedstring = substr($theme->tname,0,1) @endphp
@php $alteredstring = substr($theme->tname,0,8) @endphp

<div class="col-lg-5 col-md-5 col-sm-12 bdstyle" style="background:#{{$tcolor}}; height:250px;">
  @if($theme->id < 15)
   <img style="position:absolute; width:101%; margin:-16px; height:101%;" src="{{asset('themes/screenshots')}}/t{{$theme->id}}.jpg" 
         
         alt="img" 
         class="screenshot img" />

        <span class="tno" style="background-color:brown; color: white; border-radius: 50%; padding:10px; font-weight: bold;">t{{$theme->id}}</span>
   @endif
<input type="text" id="tid_{{$theme->id}}" value="{{$theme->id}}" style="display:none;">
<h6 style="background:#000000; color:#E6E6E6; padding:5px; border-radius:5px; border: 2px solid #E6E6E6; margin-bottom: 60px;"> <i class="fa fa-adjust"></i>
 {{ $theme->tname }} </h6>

<textarea rows="5" cols="70" id="theme_{{$theme->id}}"  class="form-control fc" required="required" style="display:none;">{{ $theme->tcontent }}</textarea>
 
  
   



@if($theme->tstatus == "active")

 <button id="deactivate_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Deactivate</button>

@if($alteredstring == "Altered_")
&nbsp;&nbsp;&nbsp;&nbsp;<button id="reset_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Reset</button>

@endif
@elseif($theme->tstatus == "disabled")

<button id="activate_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Activate</button>
<button id="preview_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Preview</button>

@if($capturedstring == "*")
&nbsp;&nbsp;&nbsp;&nbsp;<button id="delete_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Delete</button>

@endif

@elseif($theme->tstatus == "inactive")
 
<button id="activate_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Activate</button>

<button id="preview_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Preview</button>



@if($capturedstring == "*")
&nbsp;&nbsp;&nbsp;&nbsp;<button id="delete_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Delete</button>

@endif

@else
<button id="deactivate_{{$theme->id}}" class="btn btn-sm" style="background:#000000; color:#E6E6E6;border-radius:5px; border: 2px solid #E6E6E6;">Preview off</button>
@endif

 @if($theme->tstatus == "active")
 
 <center><div  class=" successalert" style="color:green; background-color:white; border-radius:5px; padding:5px; margin-top:20px;"><a href="{{ url('/') }}" target="_blank">Active</a></div></center>
 @endif

 @if($theme->tstatus == "preview")
 
 <center><div  class=" successalert" style="color:green; background-color:white; border-radius:5px; padding:5px; margin-top:20px;"><a href="{{route('admin.themepreview')}}" target="_blank">Preview</a></div></center>

 @endif
 
</div>

@endforeach

</div>
@endif
@if($user->isCMSEditor() == "yes")
@else 
<h3> Install New Theme </h3>
<div class="row">


<div class="col-lg-11 col-md-11 bdstyle1">

<label>Theme Name</label>
<input type="text" name="tname" id="tname" required="required">
<div  class="failurealert" style="color:red;"></div>
<br><br>
<label>Theme Content created in form section</label>
<textarea rows="5" cols="70" id="newtheme"  class="form-control fc" required="required"></textarea> 
<br><br>
 <button id="install">Upload</button>  
</div>
<div id="loading"></div>
</div>

@endif


@endsection
@section('scripts')
@if($themes == "empty")

 <script type="text/javascript">
  $(function() {
    $(".codefiles").show();
  });
</script>
@endif
 <script type="text/javascript">
  $(function() {
        $('.tno').css('display', 'none');
        $('.tno').css('z-index', 1000);
         $('.tno').css('position', 'relative');
       $('.screenshot').css('display', 'none');
       $('.screenshot').css('border', '3px solid #e2e2e2');
   
        $('.divthatholdstheimage').click(function() {
          
             $('.img').toggle();
             $('.tno').toggle();
            
        });
      
   });

  $(function() {

  	var arrasson = {};
  	var token = document.getElementById('ttoken').value;
  	for($i=0; $i<50; $i++)
  	{
  		$("#activate_"+$i).click(function(){
        //alert("hi");
        var nostr = this.id;
        //alert(this.id);
        var slug = nostr.split('_').pop();

       // alert(slug);

        var tid = $("#tid_"+slug).val();
        
        //var ntname = $('#tname_'+$i).val();
        var newtheme = $("#theme_"+slug).val();
        //alert(newtheme);
        arrasson =  {"newtheme": newtheme,  "tid": tid};

         $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.activatetheme')}}",
               
                type: 'post',
                data:  arrasson,
                
                success: function(result) {
                	setTimeout(function(){ 

                      window.location.reload();
                      }, 300);

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
  	}

    for($i=0; $i<50; $i++)
    {
      $("#preview_"+$i).click(function(){
        //alert("hi");
        var nostr = this.id;
        //alert(this.id);
        var slug = nostr.split('_').pop();

       // alert(slug);

        var tid = $("#tid_"+slug).val();
        
        //var ntname = $('#tname_'+$i).val();
        var newtheme = $("#theme_"+slug).val();
        //alert(newtheme);
        arrasson =  {"newtheme": newtheme,  "tid": tid};

         $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.previewtheme')}}",
               
                type: 'post',
                data:  arrasson,
                
                success: function(result) {
                  setTimeout(function(){ 

                      window.location.reload();
                      }, 300);

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
    }


  	for($i=0; $i<50; $i++)
  	{
  		$("#deactivate_"+$i).click(function(){
        //alert("hi");
        var nostr = this.id;
        //alert(this.id);
        var slug = nostr.split('_').pop();

       // alert(slug);

        var tid = $("#tid_"+slug).val();
        
        //var ntname = $('#tname_'+$i).val();
        var newtheme = $("#theme_"+slug).val();
        //alert(newtheme);
        arrasson =  {"newtheme": newtheme,  "tid": tid};

         $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.deactivatetheme')}}",
               
                type: 'post',
                data:  arrasson,
                
                success: function(result) {
                	
                	setTimeout(function(){ 

                      window.location.reload();
                      }, 300);
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
  	}

    for($i=0; $i<50; $i++)
    {
      $("#reset_"+$i).click(function(){

        $('.preinstalledthemes').css('display', 'inline');
        //alert($i);
        var nostr = this.id;
        //alert(this.id);
        var slug = nostr.split('_').pop();

        //alert(slug);

        var tid = $("#tid_"+slug).val();
        
        //var ntname = $('#tname_'+$i).val();
        var newtheme = $("#theme_"+slug).val();

       
        
                 
        
        arrasson =  {"newtheme": newtheme,  "tid": tid};
        console.log(arrasson);
        
         $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.resettheme')}}",
               
                type: 'post',
                data:  arrasson,
                
                success: function(result) {
                  
                  setTimeout(function(){ 

                  window.location.reload();
                  }, 300);
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
    }



    for($i=0; $i<50; $i++)
    {
      $("#delete_"+$i).click(function(){
        //alert("hi");
        var nostr = this.id;
        //alert(this.id);
        var slug = nostr.split('_').pop();

       // alert(slug);

        var id = $("#tid_"+slug).val();
        
        //var ntname = $('#tname_'+$i).val();
        var newtheme = $("#theme_"+slug).val();
        //alert(newtheme);
        //arrasson =  {"newtheme": newtheme,  "tid": tid};

         $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{url('admin/deletetheme')}}/"+id,
               
                type: 'get',
                
                
                success: function(result) {
                  
                  setTimeout(function(){ 

                      window.location.reload();
                      }, 300);
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
    }
  
  
    $("#load").click(function(){
        //alert("hi");


        var arrasso = {};
        
        var themeone = $('#theme0').val();
        var themetwo = $('#theme1').val();
        var themethree = $('#theme2').val();
        var themefour = $('#theme3').val();
        var themefive = $('#theme4').val();
        var themesix = $('#theme5').val();
        var themeseven = $('#theme6').val();
        var themeeight = $('#theme7').val();
        var themenine = $('#theme8').val();
        var themeten = $('#theme9').val();


        arrasso1 =  {"themeone": themeone};
        arrasso2 =  {"themetwo": themetwo};
        arrasso3 =  {"themethree": themethree};
        arrasso4 =  {"themefour": themefour};
        arrasso5 =  {"themefive": themefive};
        arrasso6 =  {"themesix": themesix};
        arrasso7 =  {"themeseven": themeseven};
        arrasso8 =  {"themeeight": themeeight};
        arrasso9 =  {"themenine": themenine};
        arrasso10 =  {"themeten": themeten};


        defCalls(arrasso1, arrasso2, arrasso3, arrasso4, arrasso5, arrasso6, arrasso7, arrasso8, arrasso9, arrasso10);

        //setajax(arrasso1);

         /*setTimeout(function(){ 

                        
        arrasso =  {"themeone": themeone};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);
        
        setTimeout(function(){ 

                        
        arrasso =  {"themetwo": themetwo};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);

        setTimeout(function(){ 

                        
        arrasso =  {"themethree": themethree};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);
        
        setTimeout(function(){ 

                        
        arrasso =  {"themefour": themefour};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                	//alert(result);
                	//alert("pppp");
                	$('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                    

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);

        setTimeout(function(){ 

                        
        arrasso =  { "themefive": themefive};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);

         setTimeout(function(){ 

                        
        arrasso =  {  "themesix": themesix};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                    

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);

          setTimeout(function(){ 

                        
        arrasso =  {"themeseven":themeseven};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                    

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);

          setTimeout(function(){ 

                        
        arrasso =  { "themeeight":themeeight};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                    

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);

            setTimeout(function(){ 

                        
        arrasso =  {"themenine":themenine};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);


           setTimeout(function(){ 

                        
        arrasso =  { "themeten":themeten};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.loadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     setTimeout(function(){ 

                         window.location.reload();
                      
                       }, 300);

                },
                 error: function (jqXHR, textStatus, errorThrown) {
                      if (jqXHR.status == 500) {
                          alert('Internal error: ' + jqXHR.responseText);
                      } else {
                          alert('Unexpected error.'+errorThrown);
                      }
                  }

                });


          }, 16000);*/

          

    });


    $("#reload").click(function(){
        //alert("hi");
         $(".codefiles").show();

        var arrasso = {};
        
        var themeone = $('#theme0').val();
        var themetwo = $('#theme1').val();
        var themethree = $('#theme2').val();
        var themefour = $('#theme3').val();
        var themefive = $('#theme4').val();
        var themesix = $('#theme5').val();
        var themeseven = $('#theme6').val();
        var themeeight = $('#theme7').val();
        var themenine = $('#theme8').val();
        var themeten = $('#theme9').val();
        
        

        arrasso =  {"themeone": themeone, "themetwo": themetwo, "themethree": themethree, "themefour": themefour, "themefive": themefive, "themesix": themesix, "themeseven":themeseven, "themeeight":themeeight, "themenine":themenine, "themeten":themeten};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

    
          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.reloadthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  //alert(result);
                  //alert("pppp");
                   $(".codefiles").hide();
                  $('html,body').scrollTop(0);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     setTimeout(function(){ 

                         window.location.reload();
                      
                       }, 3000);

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

       $("#install").click(function(){
        //alert("hi");


        var arrasso = {};
        var tname = $('#tname').val();
        var newtheme = $('#newtheme').val();
        
         if (tname == "" || newtheme == "") {
              alert("Theme name or Theme content cannot be empty");
          } else {



        arrasso =  {"newtheme": newtheme, 'tname': tname};

        console.log(arrasso);
     var token = document.getElementById('ttoken').value;

     $('#loading').html('<img src="{{asset("/introimgs/ajax-loader.gif")}}"> loading...');

          $.ajax({
                
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },

                url: "{{route('admin.installthemes')}}",
               
                type: 'post',
                data:  arrasso,
                
                success: function(result) {
                  $('#loading').css("display","none");
                  //alert(result);
                  //alert("pppp");
                  if(result == "failure")
                  {
                   
                    $('.failurealert').css("display", "block");

                    $('.failurealert').text("Theme name already exists");
                  }
                  else
                  {
                    $('html,body').scrollTop(0);
                    $('.successealertone').css("display", "block");

                    $('.successealertone').text("Successfully Installed");

                    setTimeout(function(){ 

                       window.location.reload();
                    
                     }, 300);
                   }

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

});

});

function setajax(arrasso)
{

setTimeout(function(){ 

                        
        //arrasso =  {"themeone": themeone};

console.log(arrasso);
var token = document.getElementById('ttoken').value;


  $.ajax({
        
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

        url: "{{route('admin.loadthemes')}}",
       
        type: 'post',
        data:  arrasso,
        
        success: function(result) {
          //alert(result);
          //alert("pppp");
          $('html,body').scrollTop(0);
          $('.successalert').css("display", "block");

             $('.successalert').text("Successfully Saved");

             

        },
         error: function (jqXHR, textStatus, errorThrown) {
              if (jqXHR.status == 500) {
                  alert('Internal error: ' + jqXHR.responseText);
              } else {
                  alert('Unexpected error.'+errorThrown);
              }
          }

        });


  }, 16000);
}

function defCalls(arrasso1, arrasso2, arrasso3, arrasso4, arrasso5, arrasso6, arrasso7, arrasso8, arrasso9, arrasso10){
   var def = $.Deferred();
   $.when(setajax(arrasso1),setajax(arrasso2),setajax(arrasso3),setajax(arrasso4),setajax(arrasso5),setajax(arrasso6),setajax(arrasso7),setajax(arrasso8),setajax(arrasso9),setajax(arrasso10)).done(function(r1,r2,r3,r4,r5,r6,r7,r8,r9,r10){
     def.resolve(r1,r2,r3,r4,r5,r6,r7,r8,r9,r10);
   })
   return def.promise();
}
 
defCalls().done(function(d1,d2,d3,d4,d5,d6,d7,d8,d9,d10){
   
})



</script>

@endsection