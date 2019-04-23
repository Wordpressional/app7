@extends('cadmin.layouts.master')
@section('content')

<meta name="_token" content="{{ csrf_token() }}"/>
<input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
<input type="text" id="HttpStatus" style="display:none;">

<h3> Your Purchased Themes </h3>
@if($custthemes != "empty")


@php 

function random_color_part() {
    return str_pad( dechex( mt_rand( 0, 255 ) ), 2, '0', STR_PAD_LEFT);
}

function random_color() {
    return random_color_part() . random_color_part() . random_color_part();
}


@endphp

@foreach($custthemes as $theme)
@php  $tcolor = random_color(); @endphp
@php $capturedstring = substr($theme->tname,0,1) @endphp
@php $alteredstring = substr($theme->tname,0,8) @endphp

<div class="col-lg-5 col-md-5 col-sm-12 bdstyle" style="background:#{{$tcolor}}; height:250px;">
 
       
  
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
 
 <center><div  class=" successalert" style="color:green; background-color:white; border-radius:5px; padding:5px; margin-top:20px;"><a href="{{url('/cadmin/forms/preview')}}/{{$widgetid}}" target="_blank">Active</a></div></center>
 @endif

 @if($theme->tstatus == "preview")
 
 <center><div  class=" successalert" style="color:green; background-color:white; border-radius:5px; padding:5px; margin-top:20px;"><a href="{{url('/cadmin/forms/preview')}}/{{$widgetid}}" target="_blank">Preview</a></div></center>

 @endif
 
</div>

@endforeach

</div>
@endif



@endsection
@section('scripts')
@if($custthemes == "empty")

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

                url: "{{route('cadmin.activatecusttheme')}}",
               
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

                url: "{{route('cadmin.previewcusttheme')}}",
               
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

                url: "{{route('cadmin.deactivatecusttheme')}}",
               
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

                url: "{{route('cadmin.resettheme')}}",
               
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

                url: "{{url('cadmin/deletetheme')}}/"+id,
               
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


        

        
        var xyz = 1;
        while(xyz < 11){
        if(xyz == 1){
        var defCalls1 =  setajax(arrasso1, 1);
                           
         xyz++;
        }
        if(defCalls1 == 1)
        {
                
          alert("Load Theme" +defCalls1);
          if(xyz == 2){ 
          var defCalls2 = setajax(arrasso2, 2);
          xyz++;
          }
        
        }
        
        if(defCalls2 == 2)
        {
          alert("Load Theme" +defCalls2);
          if(xyz == 3){ 
          var defCalls3 = setajax(arrasso3, 3);
          xyz++;
          }
        }
        
       
       if(defCalls3 == 3)
        {
        alert("Load Theme" +defCalls3);
          if(xyz == 4){ 
          var defCalls4 = setajax(arrasso4, 4);
          xyz++;
          }
        }
        
       
        if(defCalls4 == 4)
        {
          alert("Load Theme" +defCalls4);
          if(xyz == 5){ 
          var defCalls5 = setajax(arrasso5, 5);
          xyz++;
          }
        }
        
       
        if(defCalls5 == 5)
        {
        alert("Load Theme" +defCalls5);
         if(xyz == 6){ 
          var defCalls6 = setajax(arrasso6, 6);
          xyz++;
         }
        }
        
       
        if(defCalls6 == 6)
        {
         alert("Load Theme" +defCalls6);
          if(xyz == 7){ 
          var defCalls7 = setajax(arrasso7, 7);
          xyz++;
          }
        }
        
       
        if(defCalls7 == 7)
        {
          alert("Load Theme" +defCalls7);
          if(xyz == 8){ 
          var defCalls8 = setajax(arrasso8, 8);
          xyz++;
          }
        }
        
       
        if(defCalls8 == 8)
        {
          alert("Load Theme" +defCalls8);
          if(xyz == 9){ 
          var defCalls9 = setajax(arrasso9, 9);
          xyz++;
          }
        }
        
       
        if(defCalls9 == 9)
        {
          alert("Load Theme" +defCalls9);
          if(xyz == 10){ 
          var defCalls10 = setajax(arrasso10, 10);
          xyz++;
          }
        }
        
       
        if(defCalls10 == 10)
        {
          
          alert("Load Theme" +defCalls10);
          setTimeout(function(){ 

           window.location.reload();
        
          }, 300);

        } 
        }
        
        

          

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


        

        
        var xyz = 1;
        while(xyz < 11){
        if(xyz == 1){
        var defCalls1 =  setajax1(arrasso1, 1);
                           
         xyz++;
        }
        if(defCalls1 == 1)
        {
                
          alert("Reload Theme" +defCalls1);
          if(xyz == 2){ 
          var defCalls2 = setajax1(arrasso2, 2);
          xyz++;
          }
        
        }
        
        if(defCalls2 == 2)
        {
          alert("Reload Theme" +defCalls2);
          if(xyz == 3){ 
          var defCalls3 = setajax1(arrasso3, 3);
          xyz++;
          }
        }
        
       
       if(defCalls3 == 3)
        {
        alert("Reload Theme" +defCalls3);
          if(xyz == 4){ 
          var defCalls4 = setajax1(arrasso4, 4);
          xyz++;
          }
        }
        
       
        if(defCalls4 == 4)
        {
          alert("Reload Theme" +defCalls4);
          if(xyz == 5){ 
          var defCalls5 = setajax1(arrasso5, 5);
          xyz++;
          }
        }
        
       
        if(defCalls5 == 5)
        {
        alert("Reload Theme" +defCalls5);
         if(xyz == 6){ 
          var defCalls6 = setajax1(arrasso6, 6);
          xyz++;
         }
        }
        
       
        if(defCalls6 == 6)
        {
         alert("Reload Theme" +defCalls6);
          if(xyz == 7){ 
          var defCalls7 = setajax1(arrasso7, 7);
          xyz++;
          }
        }
        
       
        if(defCalls7 == 7)
        {
          alert("Reload Theme" +defCalls7);
          if(xyz == 8){ 
          var defCalls8 = setajax1(arrasso8, 8);
          xyz++;
          }
        }
        
       
        if(defCalls8 == 8)
        {
          alert("Reload Theme" +defCalls8);
          if(xyz == 9){ 
          var defCalls9 = setajax1(arrasso9, 9);
          xyz++;
          }
        }
        
       
        if(defCalls9 == 9)
        {
          alert("Reload Theme" +defCalls9);
          if(xyz == 10){ 
          var defCalls10 = setajax1(arrasso10, 10);
          xyz++;
          }
        }
        
       
        if(defCalls10 == 10)
        {
          
          alert("Reload Theme" +defCalls10);
          setTimeout(function(){ 

           window.location.reload();
        
          }, 300);

        } 
        }
   

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

                url: "{{route('cadmin.installthemes')}}",
               
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

function setajax(arrasso, no)
{
                     
 
console.log(arrasso);
var token = document.getElementById('ttoken').value;


  $.ajax({
        
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },

        url: "{{route('cadmin.loadthemes')}}",
       
        type: 'post',
        data:  arrasso,
        
        success: function(result, textStatus, xhr) {
          //alert(result);
          //alert("pppp");
          $('html,body').scrollTop(0);
          $('.successalert').css("display", "block");

             $('.successalert').text("Successfully Saved");
             //alert(xhr.status);
           
           
             

        },
         error: function (jqXHR, textStatus, errorThrown) {
              if (jqXHR.status == 500) {
                  alert('Internal error: ' + jqXHR.responseText);
              } else {
                  alert('Unexpected error.'+errorThrown);
              }
          }

        });
 
return no;
 
}

function setajax1(arrasso, no)
{
  
console.log(arrasso);
var token = document.getElementById('ttoken').value; 

 $.ajax({
                
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

      url: "{{route('cadmin.reloadthemes')}}",
     
      type: 'post',
      data:  arrasso,
      
      success: function(result) {
        //alert(result);
        //alert("pppp");
         $(".codefiles").hide();
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

return no;
}


</script>

@endsection