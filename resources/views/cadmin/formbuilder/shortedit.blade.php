@extends('cadmin.layouts.cformheader')


@section('content')
<div class="page-header">
        <h2>Update Widget Shortcode Name </h2>
            <hr>
      </div>

 
<a href="{{route('cadmin.forms.smanagement')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

  
   <a href="#" id="UpdateJSON1" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Update Shortcode Name</b></a> 

   
   <meta name="csrf-token" content="{{ csrf_token() }}">

 
<br><br>
 <div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success  form-control">
 
</div>

<div class="form-group">
      <label for="tag">Widget Form Name  :</label>
      <input type="text" name="widget" id="widget" value="{{ $form->formname }}" class="form-control" disabled="disabled">
  </div>

  <div class="form-group">
      <label for="tag">Shortcode Name  :</label>
      <input type="text" name="shortcode" id="shortcode" value="{{ $form->shortcode }}" class="form-control" >
  </div>
@endsection
@section('scripts')
<script>
    
document.getElementById('UpdateJSON1').addEventListener('click', function() {

  var shortcode = $('#shortcode').val();
     //alert(fieldlen);
     
    

     
     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                             
                shortcode: shortcode
                
            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('cadmin.forms.updateshortcode',['id'=>$form->id])}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
              $('#successalert').css("display", "block");

                 $('#successalert').text("Successfully updated the contact form");

                 setTimeout(function(){ 


                  $('#successalert').css("display", "none"); 

                   var newLocation = "{{ url('/cadmin/forms/smanagement') }}";
                  window.location.href= newLocation;

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
    

</script>

      

@endsection