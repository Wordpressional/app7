@extends('layouts.keditorheader')


@section('content')

    <div class="col-md-8">
    	<div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success  form-control"></div>
    	<form class="my-form" method="post">
      {!! $cforms->htmlcontents !!} 

      <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
      <input type="hidden" name="table_name" class="table_name" id="{{ $cforms->cshortcode }}" value="{{ $cforms->cshortcode }}" />
 		 </form>
  	</div>
   
   
   
@endsection
@section('scripts')

 

 <script type="text/javascript">
  $(function () {
           
     var fbTemplate =  '{!! $cforms->htmlelements !!}' ;
     //console.log(fbTemplate);
     formRenderOpts = {
      dataType: 'json',
      formData: fbTemplate
    };
     var renderedForm = $('.rendered-form');
    renderedForm.formRender(formRenderOpts);

    //console.log(renderedForm.html());
    $("button[type=submit]", $(".rendered-form").parents("form")).addClass('{{ $cforms->cshortcode }}');


});

  $('.my-form').on('submit', function (e) {
  e.preventDefault();

   var token = $('#csrf-token').val();
     //alert(formBuilder.actions.getData('json'));
     alert("hi");

     var $form = $(this);
	 var data = getFormData($form);
     data = JSON.stringify(data);
           
     console.log(data);
        
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.cforms.datacfsave')}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
            	console.log(result);
                  $('#successalert').css("display", "block");

                     $('#successalert').text("Successfully Saved");

                     setTimeout(function(){ $('#successalert').css("display", "none"); }, 3000);

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

  function getFormData($form){
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};

    $.map(unindexed_array, function(n, i){
        indexed_array[n['name']] = n['value'];
    });

    return indexed_array;
}
     
</script>

@endsection