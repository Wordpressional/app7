
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


        

        //promise = defCalls1(arrasso1).then(defCalls2(arrasso2)).then(defCalls3(arrasso3)).then(defCalls4(arrasso4)).then(defCalls5(arrasso5)).then(defCalls6(arrasso6)).then(defCalls7(arrasso7)).then(defCalls8(arrasso8)).then(defCalls9(arrasso9)).then(defCalls10(arrasso10));
        var xyz = 1;
        while(xyz < 11){
        if(xyz == 1){
        var defCalls1 =  setajax(arrasso1);
         xyz++;
        }
        if(defCalls1)
        {
          //alert(defCalls1);
          //alert(xyz);
          if(xyz == 2){ 
          var defCalls2 = setajax(arrasso2);
          xyz++;
          }
        
        }else {
          return false;
        }
        
        if(defCalls2)
        {
          //alert(defCalls2);
          //alert(xyz);
          if(xyz == 3){ 
          var defCalls3 = setajax(arrasso3);
          xyz++;
          }
        }else {
          return false;
        }
        
       
       if(defCalls3)
        {
          //alert(defCalls3);
          //alert(xyz);
          if(xyz == 4){ 
          var defCalls4 = setajax(arrasso4);
          xyz++;
          }
        }else {
          return false;
        }
        
       
        if(defCalls4)
        {
          //alert(defCalls4);
          //alert(xyz);
          if(xyz == 5){ 
          var defCalls5 = setajax(arrasso5);
          xyz++;
          }
        }else {
          return false;
        }
        
       
        if(defCalls5)
        {
          //alert(defCalls5);
          //alert(xyz);
         if(xyz == 6){ 
          var defCalls6 = setajax(arrasso6);
          xyz++;
         }
        }else {
          return false;
        }
        
       
        if(defCalls6)
        {
          //alert(defCalls6);
          //alert(xyz);
          if(xyz == 7){ 
          var defCalls7 = setajax(arrasso7);
          xyz++;
          }
        }else {
          return false;
        }
        
       
        if(defCalls7)
        {
          //alert(defCalls7);
          //alert(xyz);
          if(xyz == 8){ 
          var defCalls8 = setajax(arrasso8);
          xyz++;
          }
        }else {
          return false;
        }
        
       
        if(defCalls8)
        {
          //alert(defCalls8);
          //alert(xyz);
          if(xyz == 9){ 
          var defCalls9 = setajax(arrasso9);
          xyz++;
          }
        }else {
          return false;
        }
        
       
        if(defCalls9)
        {
          //alert(defCalls9);
          //alert(xyz);
          if(xyz == 10){ 
          var defCalls10 = setajax(arrasso10);
          xyz++;
          }
        }else {
          return false;
        }
        
       
        if(defCalls10)
        {
          
          
          //setTimeout(function(){ 

          // window.location.reload();
        
          //}, 300);

        } else {
          return false;
        }
        }
        
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

return "200 Success";
 
}

/*function defCalls1(arrasso1){
   var def = $.Deferred();
   $.when(setajax(arrasso1)).done(function(r1){
    
     def.resolve(r1);
      
   })
   return def.promise();
}
 


function defCalls2(arrasso2){
   var def = $.Deferred();
   $.when(setajax(arrasso2)).done(function(r2){
     
     def.resolve(r2);
     
   })
   return def.promise();
}
 


function defCalls3(arrasso3){
   var def = $.Deferred();
   $.when(setajax(arrasso3)).done(function(r3){
    
     def.resolve(r3);
     
   })
   return def.promise();
}
 


function defCalls4(arrasso4){
   var def = $.Deferred();
   $.when(setajax(arrasso4)).done(function(r4){
     
     def.resolve(r4);
      
   })
   return def.promise();
}
 


function defCalls5(arrasso5){
   var def = $.Deferred();
   $.when(setajax(arrasso5)).done(function(r5){
    
     def.resolve(r5);
      
   })
   return def.promise();
}

function defCalls6(arrasso6){
   var def = $.Deferred();
   $.when(setajax(arrasso6)).done(function(r6){
      
     def.resolve(r6);
     
   })
   return def.promise();
}

function defCalls7(arrasso7){
   var def = $.Deferred();
   $.when(setajax(arrasso7)).done(function(r7){
      
     def.resolve(r7);
      
   })
   return def.promise();
}

function defCalls8(arrasso8){
   var def = $.Deferred();
   $.when(setajax(arrasso8)).done(function(r8){
      
     def.resolve(r8);
      
   })
   return def.promise();
}

function defCalls9(arrasso9){
   var def = $.Deferred();
   $.when(setajax(arrasso9)).done(function(r9){
      
     def.resolve(r9);
      
   })
   return def.promise();
}

function defCalls10(arrasso10){
   var def = $.Deferred();
   $.when(setajax(arrasso10)).done(function(r10){
    
     def.resolve(r10);
      
   })
   return def.promise();
}*/
 




</script>

@endsection