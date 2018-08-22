@extends('admin.layouts.cformheader')


@section('content')

     
      @include('admin.includes.errors')



     <div class="page-header">
        <h2>Preview Form:{{ $cform->cformname }}</h2>
        <hr />
      </div>

       <a href="{{route('admin.cforms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

      <a href="#" id="CreateSC" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Update Template</b></a>

     
<br /><br /> 


 <div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success  form-control">
 
</div>


    <div class="form-group">
                <label for="tag">Contact Form Name :</label>
                <input type="text" name="cformname" id="cformname" value="{{ $cform->cformname }}" class="form-control">
            </div>

  <div id="renderedform"></div>


@endsection
@section('scripts')

 <script type="text/javascript">
  $(function () {
           
     var fbTemplate =  '{!! $cform->htmlelements !!}' ;
     console.log(fbTemplate);
     formRenderOpts = {
      dataType: 'json',
      formData: fbTemplate
    };
     var renderedForm = $('#renderedform');
    renderedForm.formRender(formRenderOpts);

    console.log(renderedForm.html());
    
   });
 
  
  document.getElementById('CreateSC').addEventListener('click', function() {
     //alert(formBuilder.actions.getData('json'));
     var fileContent = $('#renderedform').html();
     
     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
              
                htmlcontent:fileContent
            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.cforms.createshortcode',['id'=>$cform->id])}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
              $('#successalert').css("display", "block");

                 $('#successalert').text("Successfully created shortcode");

                 

                 setTimeout(function(){ $('#successalert').css("display", "none");


                   var newLocation = "{{ url('/admin/cforms') }}";
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