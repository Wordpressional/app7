@extends('cadmin.layouts.cformheader')


@section('content')
<div class="page-header">
        <h2>Create  Contact Form </h2>
            <hr>
      </div>

<a href="{{route('cadmin.cforms.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

   <a href="#" id="getJSON" onClick="SaveForm('{{route('cadmin.cforms.fsave')}}')" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Save</b></a>

  

     

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
    
 /*var fields = [{
  label: 'Star Rating',
  attrs: {
    type: 'starRating'
  },
  icon: '🌟'
}];
var templates = {
  starRating: function(fieldData) {
    return {
      field: '<span id="'+fieldData.name+'">',
      onRender: function() {
        $(document.getElementById(fieldData.name)).rateYo({rating: 3.6});
      }
    };
  }
};*/
//$(container).formBuilder({fields, templates});  
 
  /*var template = document.getElementById('build-wrap');
  $(template).formBuilder();*/

    var fbEditor = document.getElementById('build-wrap');
    var fbOptions = {
      showActionButtons: false,

    };
   
    //formBuilder = $(fbEditor).formBuilder({fields, templates});
    formBuilder = $(fbEditor).formBuilder(fbOptions);
    

   document.getElementById('getJSON').addEventListener('click', function() {
     //alert(formBuilder.actions.getData('json'));

     console.log(formBuilder.formData);

        data1 = JSON.parse(formBuilder.formData);
        console.log(data1.length);

        var countarr = data1.length;

    //alert(countarr);
     var cformname = $('#cformname').val();
     var fileContent = formBuilder.actions.getData('json');

     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                cformname:String(cformname),
                htmlelement:fileContent,
                colcount:countarr
            });
        
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('cadmin.cforms.fsave')}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
                  var newLocation = "{{ url('/cadmin/cforms/preview') }}"+"/"+result;
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