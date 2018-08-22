@extends('admin.layouts.cformheader')


@section('content')
<div class="page-header">
        <h2>Create  Contact Form </h2>
            <hr>
      </div>

<a href="{{route('admin.stables.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

   <a href="#" id="UpdateJSON" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Update</b></a>

   

   

    
  
   <meta name="csrf-token" content="{{ csrf_token() }}">

 
<br><br>
 <div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success  form-control">
 
</div>

  <div class="form-group">
      <label for="tag">Table Name  :</label>
      <input type="text" name="tablename" id="tablename" value="{{ $stablescform->cshortcode }}" class="form-control">
  </div>

  @foreach($stablef as $key => $val)
  @if($val == 'updated_at' || $val == 'created_at' || $val == 'id')
  @else

 <div class="form-group">
      <label for="tag">Field Name {{ $key + 1}}  :</label>
      <input type="text" name="{{ $val }}" id="{{ $key }}" value="{{ $val }}" class="form-control" readonly="readonly">
  </div>

 @endif
@endforeach

@foreach($stables as $key => $val)
  @if($val == 'updated_at' || $val == 'created_at' || $val == 'id')
  @else
  <div class="form-group">
     <label for="tag">Old Field Name {{ $key }} :</label>
      <input type="text" name="{{ $val }}_" id="{{ $key }}_" value="{{ $val }}" class="form-control" readonly="readonly">
  </div>

 @endif
@endforeach



  <input type="hidden" id="fieldlen" name="fieldlen" value="{{  count($stables) }}">
 
    
  </div>   
@endsection
@section('scripts')

 <script type="text/javascript">

document.getElementById('UpdateJSON').addEventListener('click', function() {

  var fieldlen = $('#fieldlen').val();
     //alert(fieldlen);
     
     var fn = [];
     var fn1 = [];
      for(var i = 0; i < fieldlen; i++)
      {
          var cfieldname = $('#'+i).val();
          //alert(cfieldname);
          fn.push(cfieldname);
      }

      for(var i = 1; i < fieldlen; i++)
      {
          var cfieldname1 = $('#'+i+'_').val();
          //alert(cfieldname);
          fn1.push(cfieldname1);
      }
     // alert(fn);

     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                cfs: String(fn),
                cfs1: String(fn1)
                
            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.stables.update',['id'=>$stablescform->id])}}",
           
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