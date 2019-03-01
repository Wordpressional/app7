@extends('admin.layouts.cformheader')


@section('content')
<div class="page-header">
        <h2>Update Contact Table Name </h2>
            <hr>
      </div>

 @if($stables != "tablenotcreated")
<a href="{{route('admin.stables.index')}}" class="btn btn-primary btn-sm align-self-center"><b>Back</b></a>

  
   <a href="#" id="UpdateJSON1" class="btn btn-primary btn-sm align-self-center form-builder-save"><b>Update Table Name</b></a> 


   <a href="{{route('admin.stables.contexportcsv',['id'=>$stablescform->id])}}" class="btn btn-primary btn-sm align-self-center somecsvfile"><b>Download CSV</b></a>

   
   <meta name="csrf-token" content="{{ csrf_token() }}">

 
<br><br>
 <div id="successalert" style="display:none; padding-bottom:35px;" class="alert alert-success  form-control">
 
</div>

  <div class="form-group">
      <label for="tag">Table Name  :</label>
      <input type="text" name="tablename" id="tablename" value="{{ $stablescform->cshortcode }}" class="form-control" >
  </div>

<div class="rs" style="overflow-x:auto;">
<table class="table table-hover table-striped table-sm table-responsive-md">
<thead>
<tbody>

<tr>
@if($stablef)

@foreach($stablef as $key => $val)
@if(substr( $val, 0, 6 ) === "header" || substr( $val, 0, 9 ) === "paragraph" || substr( $val, 0, 6 ) === "hidden")
@else

<th> {{ $val }} </th>

@endif
@endforeach
<th> Timestamp </th>
</tr>





@foreach($alldata as $m => $alld)
<tr>
@foreach($stablef as $key => $val)
@if(substr( $val, 0, 6 ) === "header" || substr( $val, 0, 9 ) === "paragraph" || substr( $val, 0, 6 ) === "hidden")
@else

<td>
@php $rest = substr($alld->$val, -4, 4) @endphp
@if($rest == ".jpg" || $rest == ".gif" || $rest == ".png")
<a href="{{ url('/uploads') }}/{{ $alld->$val }}" target="_blank">{{ $alld->$val }}</a>
@else

{{ $alld->$val }}
@endif

</td>
@endif
@endforeach


<td>

@foreach($tablecontents as $key1 => $stfield)
@if($m == $key1)
{{ humanize_date_with_timezone(Carbon::parse($stfield->created_at), 'd/m/Y H:i:s', $data['n_companyname']->timezone) }}
@endif

@endforeach
</td>
</tr>
@endforeach

@else 
<tr>
<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
No forms are created yet 
</th>
</tr>

@endif
</tbody>
</thead>
</table>
</div>

  <input type="hidden" id="fieldlen" name="fieldlen" value="{{  count($stables) }}">
 
@else

Table Not Created

@endif  
   
@endsection
@section('scripts')

 <script type="text/javascript">

$(function () {
    $(".gsortable").sortable({
        tolerance: 'pointer',
        revert: 'invalid',
        placeholder: 'span2 well placeholder tile',
        forceHelperSize: true
    });
});








/*$('.somecsvfiled').attr({target: '_blank', 
                    href  : "{{ url('data.csv') }}"});*/
/*document.getElementById('UpdateJSON').addEventListener('click', function() {

  var fieldlen = $('#fieldlen').val();
  var tablename = $('#tablename').val();
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
          var cfieldname1 = $('#'+i+'_o').val();
          //alert(cfieldname);
          fn1.push(cfieldname1);
      }

     
     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                cfs: String(fn),
                cfs1: String(fn1),
               
                tablename: tablename
                
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

                 setTimeout(function(){ 


                  $('#successalert').css("display", "none"); 

                   var newLocation = "{{ url('/admin/stables') }}";
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

       
    });*/
    
document.getElementById('UpdateJSON1').addEventListener('click', function() {

  var tablename = $('#tablename').val();
     //alert(fieldlen);
     
    

     
     var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                             
                tablename: tablename
                
            });

      $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: "{{route('admin.stables.updatetablename',['id'=>$stablescform->id])}}",
           
            type: 'post',
            data:  data,
            
          
            success: function(result) {
              $('#successalert').css("display", "block");

                 $('#successalert').text("Successfully updated the contact form");

                 setTimeout(function(){ 


                  $('#successalert').css("display", "none"); 

                   var newLocation = "{{ url('/admin/stables') }}";
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