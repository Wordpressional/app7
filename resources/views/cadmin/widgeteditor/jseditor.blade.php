@extends('cadmin.layouts.widget')


@section('content')
    <h1>JS Editor</h1>

 <select name="WidgetjsFile" id="dropdown_jschange">
<option value="">- Select javascript file -
<?php 
$dirPath = base_path().'/public/webhome/editjs/';
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

     $dirPath = base_path().'/public/webhome/editjs/';
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
            
             $cc = str_replace(".js","",$filename[$i]);
            //dd($cc);
            $ccstr = "$".$cc;
            $val =  $ccstr;
            ?>
           
            <textarea rows="40" cols="100" class="{{$cc}} test" style="display:none;">{{ $arrayfile[$i]}}</textarea>

            <input type="text" style="display:none;" name="{{$cc}}" id="{{$cc}}" />

            <?php
        }
	?>

 
<div onclick="writefilesjs('{{route('cadmin.jsupdate')}}')" class="btn btn-primary btn-sm align-self-center writefile"><b>Update</b></div>
@endsection
@section('scripts')
<script type="text/javascript">
 

        function writefilesjs(newLocation)
        {


            //alert("hi");
      var dc = document.getElementById("dropdown_jschange").value;

      
		<?php 
		$dirPath = base_path().'/public/webhome/editjs/';
		if (is_dir($dirPath)){
		if ($dh = opendir($dirPath)){
		while (($file = readdir($dh)) !== false)
		{
		if($file == "." || $file == "..")
		{

		}
		else
		{
			$cc = str_replace(".js","",$file);
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
              alert("successfully updated widget");
                var newLocation = "{{ url('/cadmin/jseditor') }}";
             // window.location.href= newLocation;
            }
             if(result == "false"){
              alert("select a file");
                var newLocation = "{{ url('/cadmin/jseditor') }}";
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
     $("#dropdown_jschange").change(function(){
     // alert("Selected value is : " + document.getElementById("dropdown_change").value);
      //var imgsliderw = $('#imgsliderw').html("k");
      var dc = document.getElementById("dropdown_jschange").value;
       $('.writefile').css("display","inline");
      $('.test').css("display","none");
       $('.testb').css("display","none");
		<?php 
		$dirPath = base_path().'/public/webhome/editjs/';
		if (is_dir($dirPath)){
		if ($dh = opendir($dirPath)){
		while (($file = readdir($dh)) !== false)
		{
		if($file == "." || $file == "..")
		{

		}
		else
		{
			$cc = str_replace(".js","",$file);
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