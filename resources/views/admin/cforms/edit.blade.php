@extends('admin.layouts.cformheader')


@section('content')
<div class="page-header">
        <h2>Create  Contact Form </h2>
            <hr>
      </div>

<a href="{{route('admin.cforms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

   <a href="#" id="UpdateJSON" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Update</b></a>

   <a href="#" id="trash" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Reset</b></a>

  <a href="#" id="setData" class="btn btn-primary btn-sm align-self-center form-builder-save" style="display: none;"><b>Load Form</b></a>


     

   <meta name="csrf-token" content="{{ csrf_token() }}">

 
<br><br>
 <div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success  form-control">
 
</div>


    <div class="form-group">
                <label for="tag">Contact Form Name :</label>
                <input type="text" name="cformname" id="cformname" value="{{ $cform->cformname }}" class="form-control">
            </div>

<div id="testcreate">

 
<div id="build-wrap"></div>

<div id="renderedform"></div>

 
    
  </div>   
@endsection
@section('scripts')

 <script type="text/javascript">
    
  var fbEditor = document.getElementById('build-wrap');
  var fbOptions = {
      showActionButtons: false
    },
    formBuilder = $(fbEditor).formBuilder(fbOptions);

  
    $(document).ready(function () {

    $("#setData").click(function (e) {
        e.preventDefault();

        //alert("hi");
        var fbTemplate =  '{!! $cform->htmlelements !!}' ;
        console.log(fbTemplate);
        var cformname = $('#cformname').val();
        formBuilder.actions.setData(fbTemplate);

    });
    $('#setData').trigger('click');

});

    var trash = document.getElementById('trash');
    trash.onclick = function(){
    formBuilder.actions.clearFields();
  };

    document.getElementById('UpdateJSON').addEventListener('click', function() {
     //alert(formBuilder.actions.getData('json'));

     var cformname = $('#cformname').val();
     var fileContent = formBuilder.actions.getData('json');

     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                cformname:String(cformname),
                htmlelement:fileContent
            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.cforms.update',['id'=>$cform->id])}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
              $('#successalert').css("display", "block");

                 $('#successalert').text("Successfully updated the contact form");

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

       
        </script>

@endsection