@extends('admin.layouts.cformheader')


@section('content')
<div class="page-header">
        <h2>Create  Contact Form </h2>
            <hr>
      </div>

<a href="{{route('admin.cforms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

   <a href="#" id="getJSON" onClick="SaveForm('{{route('admin.cforms.fsave')}}')" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Save</b></a>

  

     

   <meta name="csrf-token" content="{{ csrf_token() }}">

 <br><br>
    <div class="form-group">
                <label for="tag">Contact Form Name :</label>
                <input type="text" name="cformname" id="cformname" placeholder="Enter Form Name" class="form-control">
            </div>

<div id="testcreate">
   
 
<div id="build-wrap"></div>

<div id="renderedform"></div>

 
    
  </div>   
@endsection
@section('scripts')

 <script type="text/javascript">
    
 
 
  /*var template = document.getElementById('build-wrap');
  $(template).formBuilder();*/
    var fbEditor = document.getElementById('build-wrap');
    var formBuilder = $(fbEditor).formBuilder();
   document.getElementById('getJSON').addEventListener('click', function() {
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

            url: "{{route('admin.cforms.fsave')}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
                  var newLocation = "{{ url('/admin/forms/preview/') }}"+result;
              window.location.href= newLocation;

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