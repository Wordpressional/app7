
@extends('admin.layouts.master')
@section('content')
@if($themes == "empty")

<h3> Pre Installed Themes </h3>
<div class="row">
<div class="col-lg-3 col-md-3 bdstyle preinstall">
<h3> Theme One </h3>
<textarea rows="5" cols="70" id="themeone"  class="form-control fc" required="required" style="display:none;">{{ $themeone }}</textarea> 
   

</div>
<div class="col-lg-3 col-md-3 bdstyle preinstall">
<h3> Theme Two </h3>
<textarea rows="5" cols="70" id="themetwo"  class="form-control fc" required="required" style="display:none;">{{ $themetwo }}</textarea>
 
</div>
<div class="col-lg-3 col-md-3 bdstyle preinstall">
<h3> Theme Three </h3>
<textarea rows="5" cols="70" id="themethree"  class="form-control fc" required="required" style="display:none;">{{ $themethree }}</textarea>

</div>
</div>
<div class="row">
<div class="col-lg-3 col-md-3 bdstyle preinstall">
<h3> Theme Four </h3>
<textarea rows="5" cols="70" id="themefour"  class="form-control fc" required="required" style="display:none;">{{ $themefour }}</textarea> 


</div>
<div class="col-lg-3 col-md-3 bdstyle preinstall">
<h3> Theme Five </h3>
<textarea rows="5" cols="70" id="themefive"  class="form-control fc" required="required" style="display:none;">{{ $themefive }}</textarea>
</div>
<div class="col-lg-3 col-md-3 bdstyle preinstall">
<h3> Theme Six </h3>
<textarea rows="5" cols="70" id="themesix"  class="form-control fc" required="required" style="display:none;">{{ $themesix }}</textarea>

</div>
</div>
@endif
<meta name="_token" content="{{ csrf_token() }}"/>
<input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
@if($themes == "empty")

<button id="load">Load Pre installed Themes</button>
@endif

@if($themes != "empty")
<h3> Installed Themes </h3>
<div class="row">

@foreach($themes as $theme)

<div class="col-lg-3 col-md-3 bdstyle">
<input type="text" id="tid_{{$theme->id}}" value="{{$theme->id}}" style="display:none;">
<h3> {{ $theme->tname }} </h3>
<textarea rows="5" cols="70" id="theme_{{$theme->id}}"  class="form-control fc" required="required" style="display:none;">{{ $theme->tcontent }}</textarea>
@if($theme->tstatus == "active")

 <button id="deactivate_{{$theme->id}}">Deactivate</button>

@elseif($theme->tstatus == "disabled")

<button id="activate_{{$theme->id}}">Activate</button>

@elseif($theme->tstatus == "inactive")
 
<button id="activate_{{$theme->id}}">Activate</button>

 
@endif

 @if($theme->tstatus == "active")
 
 <div  class=" successalert" style="color:green;">Active</div>
 @endif

</div>

@endforeach

</div>
@endif
<h3> Install New Theme </h3>
<div class="row">


<div class="col-lg-11 col-md-11 bdstyle">
<label>Theme Name</label>
<input type="text" name="tname" id="tname">
<br><br>
<label>Theme Content created in form section</label>
<textarea rows="5" cols="70" id="newtheme"  class="form-control fc" required="required"></textarea> 
<br><br>
 <button id="install">Install</button>  
</div>

</div>




@endsection
@section('scripts')

 <script type="text/javascript">
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
  
  
    $("#load").click(function(){
        //alert("hi");


        var arrasso = {};
        
        var themeone = $('#themeone').val();
        var themetwo = $('#themetwo').val();
        var themethree = $('#themethree').val();
        var themefour = $('#themefour').val();
        var themefive = $('#themefive').val();
        var themesix = $('#themesix').val();
        
        
        

        arrasso =  {"themeone": themeone, "themetwo": themetwo, "themethree": themethree, "themefour": themefour, "themefive": themefive, "themesix": themesix};

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

          

    });
});
</script>

@endsection