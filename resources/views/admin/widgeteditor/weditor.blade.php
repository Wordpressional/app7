@extends('admin.layouts.widget')


@section('content')
    <h1>Widget Editor</h1>

 <select name="WidgetFile" id="dropdown_change">
<option value="">- Select widget script file -
<?php 
$dirPath = base_path().'/resources/views/shortcodes/plainhtml/';
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

<span style="float:right;">
<select name="WidgetFileback" id="dropdown_changebak">
<option value="">- Backup Scripts -
<?php 
$dirPath1 = base_path().'/resources/views/shortcodesbackup/';
if (is_dir($dirPath1)){
  if ($dh1 = opendir($dirPath1)){
while (($file1 = readdir($dh1)) !== false)
{
  if($file1 == "." || $file1 == "..")
  {

  }
  else
  {
    echo "<option value=\"" . trim($file1) . "\">" . $file1 . "</option>\n";
  }
   
}
}
}
 closedir($dh1);
?>
</select>


</span>

<?php

    $vpath1 = array();
        $filename1 = array();

     $dirPath1 = base_path().'/resources/views/shortcodesbackup/';
        if (is_dir($dirPath1)){
          if ($dh1 = opendir($dirPath1)){
        while (($file1 = readdir($dh1)) !== false)
        {
            if($file1 == "." || $file1 == "..")
            {

            }
            else
            {
                //echo "<option value=\"" . trim($file) . "\">" . $file . "\n";
                array_push($filename1, $file1);
                array_push($vpath1, $dirPath1.$file1);
            }
           
        }
        }
        }
        closedir($dh1);

    
  for($i=0;$i<count($filename1);$i++)
        {
            
             $cc1 = str_replace(".blade.php","",$filename1[$i]);
            //dd($cc);
            $ccstr1 = "$".$cc1;
            $val1 =  $ccstr1;
            $arrayfileb[$i] = htmlentities($arrayfileb[$i]);
            ?>
           
            <textarea rows="40" cols="100" class="{{$cc1}}b testb" style="display:none;">{{ $arrayfileb[$i]}}</textarea>

            <input type="text" style="display:none;" name="{{$cc1}}b" id="{{$cc1}}b" />

            <?php
        }
  ?>



    <meta name="csrf-token" content="{{ csrf_token() }}">
<?php

		$vpath = array();
        $filename = array();

     $dirPath = base_path().'/resources/views/shortcodes/plainhtml/';
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
            $arrayfile[$i] = htmlentities($arrayfile[$i]);
            ?>
           
            <textarea  rows="40" cols="100" class="{{$cc}} test myInputText" style="display:none;">{{ $arrayfile[$i]}}</textarea>

            <input type="text" style="display:none;" name="{{$cc}}" id="{{$cc}}" />

            <?php
        }
	?>

<p class="writefile">Copy this code and paste it into custom widget editor file, customize it and drag that into widget form and then preview it.</p> 
<!--<div onclick="writefiles('{{route('admin.widgetupdate')}}')" class="btn btn-primary btn-sm align-self-center writefile"><b>Update</b></div>-->
 <button onclick="copyFunction()" class="btn btn-primary btn-sm align-self-center writefile" data-clipboard-target=".myInputText">Copy to clipboard</button>
@endsection
@section('scripts')
<script type="text/javascript">
 

        function writefiles(newLocation)
        {


            //alert("hi");
      var dc = document.getElementById("dropdown_change").value;

      
		<?php 
		$dirPath = base_path().'/resources/views/shortcodes/plainhtml/';
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
              alert("successfully updated widget");
                var newLocation = "{{ url('/admin/widgeteditor') }}";
             // window.location.href= newLocation;
            }
             if(result == "false"){
              alert("select a file");
                var newLocation = "{{ url('/admin/widgeteditor') }}";
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
		$dirPath = base_path().'/resources/views/shortcodes/plainhtml/';
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

    $(document).ready(function(){

     $("#dropdown_changebak").change(function(){
      //alert("Selected value is : " + document.getElementById("dropdown_change").value);
      //var imgsliderw = $('#imgsliderw').html("k");
      var dc = document.getElementById("dropdown_changebak").value;
      $('.testb').css("display","none");
       $('.test').css("display","none");
      $('.writefile').css("display","none");
    <?php 
    $dirPath = base_path().'/resources/views/shortcodesbackup/';
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
      $('.{{$cc}}b').css("display","inline");
      $('.{{$cc}}b').html($('.{{$cc}}b').val());
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

    function copyFunction() {
  
  var copyText = $(".myInputText");
  //alert(copyText);
  copyText.select();

  document.execCommand("copy");
  alert("copied");

  
}
</script>
@endsection