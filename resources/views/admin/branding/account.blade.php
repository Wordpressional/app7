@extends('admin.layouts.adminpages')
@section('content')

<div style="display:none; padding-bottom:35px;" class="alert alert-success  form-control successalert"></div>

<form class="my-form" enctype="multipart/form-data" method="POST" onSubmit="{your_ajax_function2(); return false;}">
   
<div class="form-group">    
                       
                       
              
       <label for="compname">Company Name</label>
      
       <input name="compname" type="text" id="compnamess" value="{{ isset($account->cname) ? $account->cname : '' }}" class="form-control fc" required="required">            
       <br>   
       <label for="compaddr">Company Address</label>
       
         <textarea rows="5" cols="70" id="compaddrss"  class="form-control fc" required="required">{{ isset($account->caddr) ? $account->caddr : '' }}</textarea> 

          <br>    
       <label for="compphno">Company Phone Number</label>
      
       <input name="compphno" type="text" id="compphnoss" value="{{ isset($account->cphno) ? $account->cphno : '' }}" class="form-control fc" required="required">  
        
         <br>  
       <label for="compemail">Company Email Address</label>
      
       <input name="compemail" type="text" id="compemailss" value="{{ isset($account->cemail) ? $account->cemail : '' }}" class="form-control fc" required="required">

         <br>  
       <label for="timezfield">Timezone</label>
      

       @php {{
       
       
        $timezones = timezone_list();
        print '<select id="timezfield" class="form-control fc">';
        
        foreach($timezones as $timezone => $name)
        {
        if($account) {
        if($timezone == $account->timezone)
        {
          print '<option value="' . $timezone . '" selected="selected" class="active">' .$name . '</option>' . "\n";
        } 
        } 
        else 
        {
          print '<option value="' . $timezone . '">' . $name . '</option>' . "\n";
        }
        
        }

        print '</select>';

       }}
       @endphp
         
        
       <br>      
          <label for="cllogo">Company Logo</label>
             <br /><div class="form-group">
   
              <input type="file" name="filelogo" id="filelogo" required="required">
                   
               
            </div>

                
               @if($account) 
                <img src="{{url(isset($account->clogo) ? $account->clogo : '')}}" id="complogo" alt="photo" width="250" height="250"/>
                @else 
                <img src="{{url('/img/logo.png')}}" id="complogo" alt="photo" width="250" height="250"/>
               @endif

        <br>      
          <label for="cllogo">Favicon</label>
             <br /><div class="form-group">
   
              <input type="file" name="favicon" id="favicon" required="required">
                   
               
            </div>

                
               @if($account) 
                <img src="{{url(isset($account->favicon) ? $account->favicon : '')}}" id="flogo" alt="photo" width="32" height="32"/>
                @else 
                <img src="{{url('/img/logo.png')}}" id="flogo" alt="flogo" width="32" height="32"/>
               @endif


          <br>      
          <label for="cllogo">Default Profile Image</label>
             <br /><div class="form-group">
   
              <input type="file" name="pimg" id="pimg" required="required">
                   
               
            </div>

                
               @if($account) 
                <img src="{{url(isset($account->defaultprofileimg) ? $account->defaultprofileimg : '')}}" id="profileimg" alt="photo" width="250" height="250"/>
                @else 
                <img src="{{url('/img/profile.png')}}" id="profileimg" alt="photo" width="250" height="250"/>
               @endif

        <br>      
            
      
       </div>  

<meta name="_token" content="{{ csrf_token() }}"/>
<input type="hidden" id="ttoken" name="_token" value="{{ csrf_token() }}">
<input type="submit" id="savebranding" value="Save Details">
</form>
@php 

{{

function timezone_list() {
    static $timezones = null;

    if ($timezones === null) {
        $timezones = [];
        $offsets = [];
        $now = new DateTime('now', new DateTimeZone('UTC'));

        foreach (DateTimeZone::listIdentifiers() as $timezone) {
            $now->setTimezone(new DateTimeZone($timezone));
            $offsets[] = $offset = $now->getOffset();
            $timezones[$timezone] = '(' . format_GMT_offset($offset) . ') ' . format_timezone_name($timezone);
        }

        array_multisort($offsets, $timezones);
    }

    return $timezones;
}

function format_GMT_offset($offset) {
    $hours = intval($offset / 3600);
    $minutes = abs(intval($offset % 3600 / 60));
    return 'GMT' . ($offset ? sprintf('%+03d:%02d', $hours, $minutes) : '');
}

function format_timezone_name($name) {
    $name = str_replace('/', ', ', $name);
    $name = str_replace('_', ' ', $name);
    $name = str_replace('St ', 'St. ', $name);
    return $name;
}

}}

@endphp 
 
@endsection
@section('scripts')

 <script type="text/javascript">

  $(document).ready(function(){

 your_ajax_function2 = function()
{

  var fobject = {};
    var fobject1 = [{}];

  var token = document.getElementById('ttoken').value;
 img = $("#filelogo")[0].files[0];
 img2 = $("#favicon")[0].files[0];
 img3 = $("#pimg")[0].files[0];

    var file_data = img;
    var file_data2 = img2;
    var file_data3 = img3;
    if(file_data2){
    var fileName = file_data2.name;
    var fileSize = file_data2.size;
    alert("Uploading: "+fileName+" @ "+fileSize+"bytes");
    }
    var compnamess = $('#compnamess').val();
    var compaddrss = $('#compaddrss').val();
    var compphnoss = $('#compphnoss').val();
    var compemailss = $('#compemailss').val();
    var timezone = $('#timezfield').val();
    

        var form_data = new FormData();
        form_data.append('filed', file_data);
        form_data.append('cname', compnamess);
        form_data.append('caddr', compaddrss);
        form_data.append('cphno', compphnoss);
        form_data.append('cemail', compemailss);
        form_data.append('filed2', file_data2);
        form_data.append('filed3', file_data3);
       form_data.append('timezone', timezone);
       

       

  console.log(form_data);


    $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
              },

            url: "{{route('admin.polling.storeelecaccount')}}",
           
            type: 'POST',
            data: form_data,
           contentType: false,
            processData: false, 
            
           

            success: function(result) {
              //alert(result);

              console.log("result");
              console.log(result);
                  $('.successalert').css("display", "block");

                     $('.successalert').text("Successfully Saved");

                     setTimeout(function(){ 

                      window.location.reload();
                      $('.successalert').css("display", "none"); }, 3000);

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

</script>

@endsection