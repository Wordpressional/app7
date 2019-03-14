@extends('admin.layouts.widget')


@section('content')
    <h1>Custom Widget Editor</h1>

 <select name="WidgetcFile" id="dropdown_change" class="selectpicker" data-live-search="true">
<option value="">- Select widget script file -
<?php 
$dirPath = base_path().'/resources/views/shortcodes/custom/';
if (is_dir($dirPath)){
  if ($dh = opendir($dirPath)){
while (($file = readdir($dh)) !== false)
{
	if($file == "." || $file == "..")
	{

	}
	else
	{
		echo "<option value=\"" . trim($file) . "\">" . $file . "</option>\n";
	}
   
}
}
}
 closedir($dh);
?>
</select>



    <meta name="csrf-token" content="{{ csrf_token() }}">
<?php

		$vpath = array();
        $filename = array();

     $dirPath = base_path().'/resources/views/shortcodes/custom/';
        if (is_dir($dirPath)){
          if ($dh = opendir($dirPath)){
        while (($file = readdir($dh)) !== false)
        {
            if($file == "." || $file == "..")
            {

            }
            else
            {
                //echo "<option value=\"" . trim($file) . "\">" . $file . "\n";
                array_push($filename, $file);
                array_push($vpath, $dirPath.$file);
            }
           
        }
        }
        }
        closedir($dh);

		
	for($i=0;$i<count($filename);$i++)
        {
            
             $cc = str_replace(".blade.php","",$filename[$i]);
            //dd($cc);
            $ccstr = "$".$cc;
            $val =  $ccstr;
            ?>
           
            <textarea rows="40" cols="100" class="{{$cc}} test" style="display:none;">{{ $arrayfile[$i]}}</textarea>

            <input type="text" style="display:none;" name="{{$cc}}" id="{{$cc}}" />

            <?php
        }
	?>

 
<div onclick="writefiles('{{route('admin.widgetcustupdate')}}')" class="btn btn-primary btn-sm align-self-center writefile"><b>Update</b></div>
@endsection
@section('scripts')
<script type="text/javascript">
 

        function writefiles(newLocation)
        {


            //alert("hi");
      var dc = document.getElementById("dropdown_change").value;

      
		<?php 
		$dirPath = base_path().'/resources/views/shortcodes/custom/';
		if (is_dir($dirPath)){
		if ($dh = opendir($dirPath)){
		while (($file = readdir($dh)) !== false)
		{
		if($file == "." || $file == "..")
		{

		}
		else
		{
			$cc = str_replace(".blade.php","",$file);
            //dd($cc);
            $ccstr = '$'.$cc;
		?>
		//$('{{$cc}}').css("display","inline");
		//$('{{$cc}}').html('k');
		if('{{$file}}' == dc){
			//alert($('.{{$cc}}').val());
			var filewname = '{{$file}}';
			var filew = $('.{{$cc}}').val();
			
		}
		<?php
		}

		}
		}
		}
		closedir($dh);
		?>
           

           //if($filename == undefined)
          // {
            //return false;
           //}


            //alert(imgsliderw);
            
            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
           

             var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                filew:String(filew),
                filewname:String(filewname)
                
            });

	       

            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: newLocation,
           
            type: 'post',
            data:  data,
            
            success: function(result) {
            if(result == "success"){
              alert("successfully updated custom widget");
                var newLocation = "{{ url('/admin/widgetcusteditor') }}";
             // window.location.href= newLocation;
            }
             if(result == "false"){
              alert("select a file");
                var newLocation = "{{ url('/admin/widgetcusteditor') }}";
             // window.location.href= newLocation;
            }
           
            //alert(result);
            //window.location.href= url('/');
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
       
    </script>
<script type="text/javascript">
    $(document).ready(function(){
     $("#dropdown_change").change(function(){
     // alert("Selected value is : " + document.getElementById("dropdown_change").value);
      //var imgsliderw = $('#imgsliderw').html("k");
      var dc = document.getElementById("dropdown_change").value;
       $('.writefile').css("display","inline");
      $('.test').css("display","none");
       $('.testb').css("display","none");
		<?php 
		$dirPath = base_path().'/resources/views/shortcodes/custom/';
		if (is_dir($dirPath)){
		if ($dh = opendir($dirPath)){
		while (($file = readdir($dh)) !== false)
		{
		if($file == "." || $file == "..")
		{

		}
		else
		{
			$cc = str_replace(".blade.php","",$file);
            //dd($cc);
            $ccstr = '$'.$cc;
		?>
		//$('{{$cc}}').css("display","inline");
		//$('{{$cc}}').html('k');
		if('{{$file}}' == dc){
			alert($('.{{$cc}}').val());
			$('.{{$cc}}').css("display","inline");
			$('.{{$cc}}').html($('.{{$cc}}').val());
		}
		<?php
		}

		}
		}
		}
		closedir($dh);
		?>
     });
   });

    
</script>
@endsection