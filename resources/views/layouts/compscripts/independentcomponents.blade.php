<script>

$(document).ready(function(){ 

  $('span').attr('contenteditable', false);

});

$(document).ready(function(){  

$( ".boxmparallaxone1" )
 .on("mouseenter", function() {
   if ($(".boxmparallaxone1").hasClass("editable")) {
    $(".editmparallaxone1").hide();

   } 
   else
   {
    $(".editmparallaxone1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmparallaxone1").hide();

});

 $(".editmparallaxone1").click(function() {
  $(this).hide();
  $(".boxmparallaxone1").addClass("editable");
  $(".textmparallaxone1").attr("contenteditable", "true");
   $(".editmparallaxone1").hide();
  $(".savemparallaxone1").show();
 
});

$(".savemparallaxone1").click(function() {
  $(this).hide();
  $(".boxmparallaxone1").removeClass("editable");
 $(".textmparallaxone1").removeAttr("contenteditable");
  $(".editmparallaxone1").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){


   $(".imageUploadmparallaxone2").hide();

$( ".boxmparallaxone2" )
 .on("mouseenter", function() {
   if ($(".boxmparallaxone2").hasClass("editable")) {
    $(".editmparallaxone2").hide();

   } 
   else
   {
    
   
    $(".editmparallaxone2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmparallaxone2").hide();
 

});

 $(".editmparallaxone2").click(function() {
  $(this).hide();
  $(".boxmparallaxone2").addClass("editable");
   $(".editmparallaxone2").hide();
  $(".savemparallaxone2").show();
  $(".imageUploadmparallaxone2").show();
});

$(".savemparallaxone2").click(function() {
  $(this).hide();
  $(".boxmparallaxone2").removeClass("editable");
 
  $(".editmparallaxone2").hide();
  $(".imageUploadmparallaxone2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmparallaxone2").change(function() {
$("#imageUploadmparallaxone2").attr("name", "imageUploadmparallaxone2");
    readURLmone2(this);
});

});
function readURLmone2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmparallaxone2", "imageUploadmparallaxone2",".themeone .quote");
 
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.themeone .quote').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

function Uploadsavemone2(newLocation, id)
        {

           
            var fileContent = $('.precon').html();
            var id = id;
            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
          // alert(fileContent);

             var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                
                htmlcontent:String(fileContent),
                id: id
            });
             //alert(data);
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
              'Content-Type': 'application/json'
              },

            url: newLocation,
            dataType : "text",
           
            type: 'post',
            data:  data,
            
            success: function(result) {
            if(result == "success"){
              alert("updated");
                setTimeout(function(){ 

                  location.reload();
                 

              }, 1000);
            }
          
            
            },
             error: function (jqXHR, textStatus, errorThrown) {
                  if (jqXHR.status == 500) {
                      alert('Internal error: ' + jqXHR.responseText);
                  } else {
                      alert('Unexpected error.'+errorThrown);
                      console.log(jqXHR.status);
                  }
              }
            });
            
        
        }

        function Uploadimgtoserver(file, imgid, imgidwithouthash, imgpreview)
        {
          console.log(file);


          var file_data = $(imgid)[0].files[0];

                if(file_data){
          var fileName = file_data.name;
          var fileSize = file_data.size;
          alert("Uploading: "+fileName+" @ "+fileSize+"bytes");
          }
           var form_data = new FormData();
        form_data.append('filed', file_data);
        form_data.append('fname', file.name);
        form_data.append('imgid', imgidwithouthash);
        form_data.append('_token', String($('meta[name="csrf-token"]').attr('content')));
        
           console.log(form_data);

            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
          // alert(fileContent);

             /*var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                
                imgf:file
                
            });*/
             //alert(data);
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             
              },

            url: "{{ route('uploadimgfromfe') }}",
           
            type: 'post',
            data:  form_data,
            contentType: false,
            processData: false, 
            success: function(result) {
             relaceurl(imgpreview, result);
            
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


         function Uploadimgtoserver1(file, imgid, imgidwithouthash, imgpreview, imgpreview1)
        {
          console.log(file);
          

          var file_data = $(imgid)[0].files[0];

                if(file_data){
          var fileName = file_data.name;
          var fileSize = file_data.size;
          alert("Uploading: "+fileName+" @ "+fileSize+"bytes");
          }
           var form_data = new FormData();
        form_data.append('filed', file_data);
        form_data.append('fname', file.name);
        form_data.append('imgid', imgidwithouthash);
        form_data.append('_token', String($('meta[name="csrf-token"]').attr('content')));
        
           console.log(form_data);

            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
          // alert(fileContent);

             /*var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                
                imgf:file
                
            });*/
             //alert(data);
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             
              },

            url: "{{ route('uploadimgfromfe') }}",
           
            type: 'post',
            data:  form_data,
            contentType: false,
            processData: false, 
            success: function(result) {
             relaceurl1(imgpreview, imgpreview1, result);
            
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

         function Uploadimgtoserver2(file, imgid, imgidwithouthash, imgpreview, imgpreview2)
        {
          console.log(file);


          var file_data = $(imgid)[0].files[0];

                if(file_data){
          var fileName = file_data.name;
          var fileSize = file_data.size;
          alert("Uploading: "+fileName+" @ "+fileSize+"bytes");
          }
           var form_data = new FormData();
        form_data.append('filed', file_data);
        form_data.append('fname', file.name);
        form_data.append('imgid', imgidwithouthash);
        form_data.append('_token', String($('meta[name="csrf-token"]').attr('content')));
        
           console.log(form_data);

            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
          // alert(fileContent);

             /*var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                
                imgf:file
                
            });*/
             //alert(data);
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             
              },

            url: "{{ route('uploadimgfromfe') }}",
           
            type: 'post',
            data:  form_data,
            contentType: false,
            processData: false, 
            success: function(result) {
             relaceurl2(imgpreview, imgpreview2, result);
            
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



        function Uploadimgtoserverbakimg(file, imgid, imgidwithouthash, imgpreview)
        {
          console.log(file);


          var file_data = $(imgid)[0].files[0];

                if(file_data){
          var fileName = file_data.name;
          var fileSize = file_data.size;
          alert("Uploading: "+fileName+" @ "+fileSize+"bytes");
          }
           var form_data = new FormData();
        form_data.append('filed', file_data);
        form_data.append('fname', file.name);
        form_data.append('imgid', imgidwithouthash);
        form_data.append('_token', String($('meta[name="csrf-token"]').attr('content')));
        
           console.log(form_data);

            //var data = "_token="+$('meta[name="csrf-token"]').attr('content')+"&formname='test'&htmlcontent="+fileContent;
          // alert(fileContent);

             /*var data = JSON.stringify({
                _token:String($('meta[name="csrf-token"]').attr('content')),
                
                imgf:file
                
            });*/
             //alert(data);
            $.ajax({
            
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
             
              },

            url: "{{ route('uploadimgfromfe') }}",
           
            type: 'post',
            data:  form_data,
            contentType: false,
            processData: false, 
            success: function(result) {
             relaceurlbakimg(imgpreview, result);
            
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
<style>
  .editmparallaxone1, .savemparallaxone1 {
  width: 80px;
  height:30px;
  display: none;
  position: relative;
  top: 0px;
  right: 0px;
  padding: 6px 10px 5px;
  border-top-right-radius: 2px;
  border-bottom-left-radius: 10px;
  text-align: center;
  cursor: pointer;
  box-shadow: -1px 1px 4px rgba(0,0,0,0.5);
  z-index: 10000;
  line-height: 1.3em;
  font-size: 12px;
}

.editmparallaxone1 { 
  background: #557a11;
  color: #f0f0f0;
  
  transition: opacity .2s ease-in-out;
}

.savemparallaxone1 {
  display: none;
  background: #bd0f18;
  color: #f0f0f0;
}



.editmparallaxone2, .savemparallaxone2 {
  width: 90px;
  display: none;
  position: relative;
  top: 120px;
  right: 0px;
  padding: 4px 10px;
  border-top-right-radius: 2px;
  border-bottom-left-radius: 10px;
  text-align: center;
  cursor: pointer;
  box-shadow: -1px 1px 4px rgba(0,0,0,0.5);
  z-index: 10000;
  float: right;
   font-size: 12px;
}

.editmparallaxone2 { 
  background: blue;
  color: #f0f0f0;
  
  transition: opacity .2s ease-in-out;
}

.savemparallaxone2 {
  display: none;
  background: #bd0f18;
  color: #f0f0f0;
}

.labelmparallaxone2
{
  
  position: relative;
  top: 120px;
  right: 0px;
 
  z-index: 10000;
  float: right;
}





img#imagePreviewmparallaxone2 {
    display: inline;
   
}



#imageUploadmparallaxone2  {
  display:none;
}

label.imageUploadmparallaxone2:after {
  content: "\f093";
  font-family: "FontAwesome";
  color: black;
  width: 30px;
  display: inline;
  position: relative;
  top: 0px;
  right:-10px;
  padding: 8px 10px;
  border-top-right-radius: 2px;
  border-bottom-left-radius: 10px;
  text-align: center;
  cursor: pointer;
  box-shadow: -1px 1px 4px rgba(0,0,0,0.5);
  z-index: 10000;
  margin: auto;
  background-color: white;
   font-size: 12px;
}
</style>

<script>
$(document).ready(function(){
 
  
   $(".mcolorlibimageUpload2").hide();
   $(".mcolorlibimageUpload3").hide();
   $(".mcolorlibimageUpload4").hide();
   $(".mcolorlibimageUpload5").hide();
   $(".mcolorlibimageUpload6").hide();
   $(".mcolorlibimageUpload7").hide();
   $(".mcolorlibimageUpload8").hide();
   $(".mcolorlibimageUpload9").hide();
   $(".mcolorlibimageUpload10").hide();
   $(".mcolorlibimageUpload11").hide();
   


  
  $(".mcolorlibedit2").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   $(".mcolorlibtext").attr("contenteditable", "true");
  $(".mcolorlibsave2").show();
  $(".mcolorlibimageUpload2").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave2").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
   $(".mcolorlibtext").removeAttr("contenteditable");
  $(".mcolorlibedit2").show();
  $(".mcolorlibimageUpload2").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});


$(".mcolorlibedit3").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave3").show();
  $(".mcolorlibimageUpload3").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave3").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit3").show();
  $(".mcolorlibimageUpload3").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});



  $(".mcolorlibedit4").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
  
  $(".mcolorlibsave4").show();
  $(".mcolorlibimageUpload4").show();
   
});

  $(".mcolorlibsave4").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit4").show();
  $(".mcolorlibimageUpload4").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});



  $(".mcolorlibedit5").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave5").show();
  $(".mcolorlibimageUpload5").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave5").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit5").show();
  $(".mcolorlibimageUpload5").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});



  $(".mcolorlibedit6").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave6").show();
  $(".mcolorlibimageUpload6").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave6").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit6").show();
  $(".mcolorlibimageUpload6").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});


  $(".mcolorlibedit7").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave7").show();
  $(".mcolorlibimageUpload7").show();
  $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave7").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit7").show();
  $(".mcolorlibimageUpload7").hide();
   
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});



  $(".mcolorlibedit8").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave8").show();
  $(".mcolorlibimageUpload8").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave8").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit8").show();
  $(".mcolorlibimageUpload8").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});


  $(".mcolorlibedit9").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave9").show();
  $(".mcolorlibimageUpload9").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave9").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit9").show();
  $(".mcolorlibimageUpload9").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});



  $(".mcolorlibedit10").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave10").show();
  $(".mcolorlibimageUpload10").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave10").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit10").show();
  $(".mcolorlibimageUpload10").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

  $(".mcolorlibedit11").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave11").show();
  $(".mcolorlibimageUpload11").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave11").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit11").show();
  $(".mcolorlibimageUpload11").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

   $(".mcolorlibedit12").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave12").show();
  $(".mcolorlibimageUpload12").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave12").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit12").show();
  $(".mcolorlibimageUpload12").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});


$(".mcolorlibedit13").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave13").show();
  $(".mcolorlibimageUpload13").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave13").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit13").show();
  $(".mcolorlibimageUpload13").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

  $(".mcolorlibedit14").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave14").show();
  $(".mcolorlibimageUpload14").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave14").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit14").show();
  $(".mcolorlibimageUpload14").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

   $(".mcolorlibedit15").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave15").show();
  $(".mcolorlibimageUpload15").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave15").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit15").show();
  $(".mcolorlibimageUpload15").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

  $(".mcolorlibedit16").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave16").show();
  $(".mcolorlibimageUpload16").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave16").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit16").show();
  $(".mcolorlibimageUpload16").hide();
    
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

   $(".mcolorlibedit17").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave17").show();
  $(".mcolorlibimageUpload17").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave17").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit17").show();
  $(".mcolorlibimageUpload17").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 $(".mcolorlibedit18").click(function() {
  $(this).hide();
  $(".mcolorlibbox").addClass("editable");
   
  $(".mcolorlibsave18").show();
  $(".mcolorlibimageUpload18").show();
   $('.projects_text a h4,.projects_text p').css('color','red');
});

  $(".mcolorlibsave18").click(function() {
  $(this).hide();
  $(".mcolorlibbox").removeClass("editable");
  
  $(".mcolorlibedit18").show();
  $(".mcolorlibimageUpload18").hide();
    
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});

  

function readURL1N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload3", "mcolorlibimageUpload3","#mcolorlibimagePreview3");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload1").change(function() {
$("#mcolorlibimageUpload1").attr("name", "mcolorlibimageUpload1");

    readURL1N(this);
});

function readURL2N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload3", "mcolorlibimageUpload3","#mcolorlibimagePreview3");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload2").change(function() {
$("#mcolorlibimageUpload2").attr("name", "mcolorlibimageUpload2");

    readURL2N(this);
});



function readURL3N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload3", "mcolorlibimageUpload3","#mcolorlibimagePreview3");

     //alert("hi");

    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/

}

function relaceurl(imgpreview, result)
{
  //alert(imgpreview);
  $(imgpreview).attr('data-cke-saved-src', result);
 
   $(imgpreview).attr('src', result);
}

function relaceurl1(imgpreview, imgpreview1, result)
{
  //alert(imgpreview);
  $(imgpreview).attr('data-cke-saved-src', result);
  
  $(imgpreview).attr('src', result);
  $(imgpreview1).attr('data-image', result);
}

function relaceurl2(imgpreview, imgpreview2, result)
{
  //alert(imgpreview);
  $(imgpreview).attr('data-cke-saved-src', result);
  
  $(imgpreview).attr('src', result);
  $(imgpreview2).attr('href', result);
}

function relaceurlbakimg(imgpreview, result)
{
  //alert(imgpreview);
  
   $(imgpreview).css('background-image', 'url('+result+')');
}
          

$("#mcolorlibimageUpload3").change(function() {
$("#mcolorlibimageUpload3").attr("name", "mcolorlibimageUpload3");
   readURL3N(this);
});

function readURL4N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload4", "mcolorlibimageUpload4","#mcolorlibimagePreview4");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview4').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/


    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload4").change(function() {
$("#mcolorlibimageUpload4").attr("name", "mcolorlibimageUpload4");
    readURL4N(this);
});



function readURL5N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload5", "mcolorlibimageUpload5","#mcolorlibimagePreview5");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload5").change(function() {
$("#mcolorlibimageUpload5").attr("name", "mcolorlibimageUpload5");
    readURL5N(this);
});

function readURL6N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload6", "mcolorlibimageUpload6","#mcolorlibimagePreview6");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview6').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload6").change(function() {
$("#mcolorlibimageUpload6").attr("name", "mcolorlibimageUpload6");
    readURL6N(this);
});



function readURL7N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload7", "mcolorlibimageUpload7","#mcolorlibimagePreview7");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload7").change(function() {
$("#mcolorlibimageUpload7").attr("name", "mcolorlibimageUpload7");
    readURL7N(this);
});

function readURL8N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload8", "mcolorlibimageUpload8","#mcolorlibimagePreview8");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview8').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload8").change(function() {
$("#mcolorlibimageUpload8").attr("name", "mcolorlibimageUpload8");
    readURL8N(this);
});

function readURL9N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload9", "mcolorlibimageUpload9","#mcolorlibimagePreview9");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview9').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload9").change(function() {
$("#mcolorlibimageUpload9").attr("name", "mcolorlibimageUpload9");
    readURL9N(this);
});

function readURL10N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload10", "mcolorlibimageUpload10","#mcolorlibimagePreview10");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview10').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload10").change(function() {
$("#mcolorlibimageUpload10").attr("name", "mcolorlibimageUpload10");
    readURL10N(this);
});


function readURL11N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload11", "mcolorlibimageUpload11","#mcolorlibimagePreview11");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview11').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload11").change(function() {
$("#mcolorlibimageUpload11").attr("name", "mcolorlibimageUpload11");
    readURL11N(this);
});

function readURL12N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload12", "mcolorlibimageUpload12","#mcolorlibimagePreview12");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview12').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload12").change(function() {
$("#mcolorlibimageUpload12").attr("name", "mcolorlibimageUpload12");
    readURL12N(this);
});


function readURL13N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload13", "mcolorlibimageUpload13","#mcolorlibimagePreview13");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview13').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    /*if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }*/
}

$("#mcolorlibimageUpload13").change(function() {
$("#mcolorlibimageUpload13").attr("name", "mcolorlibimageUpload13");
    readURL13N(this);
});


function readURL14N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload14", "mcolorlibimageUpload14","#mcolorlibimagePreview14");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview14').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    
}

$("#mcolorlibimageUpload14").change(function() {
$("#mcolorlibimageUpload14").attr("name", "mcolorlibimageUpload14");
    readURL14N(this);
});


function readURL15N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload15", "mcolorlibimageUpload15","#mcolorlibimagePreview15");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview15').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
   
}

$("#mcolorlibimageUpload15").change(function() {
$("#mcolorlibimageUpload15").attr("name", "mcolorlibimageUpload15");
    readURL15N(this);
});


function readURL16N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload16", "mcolorlibimageUpload16","#mcolorlibimagePreview16");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview16').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    
}

$("#mcolorlibimageUpload16").change(function() {
$("#mcolorlibimageUpload16").attr("name", "mcolorlibimageUpload16");
    readURL16N(this);
});


function readURL17N(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload17", "mcolorlibimageUpload17","#mcolorlibimagePreview17");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview17').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
   
}

$("#mcolorlibimageUpload17").change(function() {
$("#mcolorlibimageUpload17").attr("name", "mcolorlibimageUpload17");
    readURL17N(this);
});



function readURL18N(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#mcolorlibimageUpload18", "mcolorlibimageUpload18","#mcolorlibimagePreview18");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview18').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
    
}

$("#mcolorlibimageUpload18").change(function() {
$("#mcolorlibimageUpload18").attr("name", "mcolorlibimageUpload18");
    readURL18N(this);
});



</script>
<script> 
$(document).ready(function(){

  

$( ".boxmlaboutspathemeone1" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone1").hasClass("editable")) {
    $(".editmlaboutspathemeone1").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone1").hide();

});

 $(".editmlaboutspathemeone1").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone1").addClass("editable");
  $(".textmlaboutspathemeone1").attr("contenteditable", "true");
   $(".editmlaboutspathemeone1").hide();
  $(".savemlaboutspathemeone1").show();
 
});

$(".savemlaboutspathemeone1").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone1").removeClass("editable");
 $(".textmlaboutspathemeone1").removeAttr("contenteditable");
  $(".editmlaboutspathemeone1").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmlaboutspathemeone2" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone2").hasClass("editable")) {
    $(".editmlaboutspathemeone2").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone2").hide();

});

 $(".editmlaboutspathemeone2").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone2").addClass("editable");
  $(".textmlaboutspathemeone2").attr("contenteditable", "true");
   $(".editmlaboutspathemeone2").hide();
  $(".savemlaboutspathemeone2").show();
 
});

$(".savemlaboutspathemeone2").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone2").removeClass("editable");
 $(".textmlaboutspathemeone2").removeAttr("contenteditable");
  $(".editmlaboutspathemeone2").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmlaboutspathemeone3" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone3").hasClass("editable")) {
    $(".editmlaboutspathemeone3").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone3").hide();

});

 $(".editmlaboutspathemeone3").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone3").addClass("editable");
  $(".textmlaboutspathemeone3").attr("contenteditable", "true");
   $(".editmlaboutspathemeone3").hide();
  $(".savemlaboutspathemeone3").show();
 
});

$(".savemlaboutspathemeone3").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone3").removeClass("editable");
 $(".textmlaboutspathemeone3").removeAttr("contenteditable");
  $(".editmlaboutspathemeone3").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

   $(".contmaboutfacebook4").hide();

   $( ".boxmlaboutspathemeone4" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone4").hasClass("editable")) {
    $(".editmlaboutspathemeone4").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone4").hide();

});


$(".editmlaboutspathemeone4").click(function(e) {
 $(".boxmlaboutspathemeone4").addClass("editable");

  
  
  $(".contmaboutfacebook4").show();

 
});

$(".submitmaboutfacebook4").click(function() {
  $(".boxmlaboutspathemeone4").removeClass("editable");
  $(".contmaboutfacebook4").hide();
addHrefmabout4();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout4() {
var inputmaboutfacebook4 = $('.inputmaboutfacebook4').val();
if(inputmaboutfacebook4 != ""){
  $('#hrefchangemaboutfacebook4').attr("href",inputmaboutfacebook4);
}
}




$(document).ready(function(){

   $(".contmabouttwitter5").hide();

   $( ".boxmlaboutspathemeone5" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone5").hasClass("editable")) {
    $(".editmlaboutspathemeone5").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone5").hide();

});


$(".editmlaboutspathemeone5").click(function(e) {
 $(".boxmlaboutspathemeone5").addClass("editable");

  
  
  $(".contmabouttwitter5").show();

 
});

$(".submitmabouttwitter5").click(function() {
  $(".boxmlaboutspathemeone5").removeClass("editable");
  $(".contmabouttwitter5").hide();
addHrefmabout5();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout5() {
var inputmabouttwitter5 = $('.inputmabouttwitter5').val();
if(inputmabouttwitter5 != ""){
  $('#hrefchangemabouttwitter5').attr("href",inputmabouttwitter5);
}
}




$(document).ready(function(){

   $(".contmabouttelegram6").hide();

   $( ".boxmlaboutspathemeone6" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone6").hasClass("editable")) {
    $(".editmlaboutspathemeone6").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone6").hide();

});


$(".editmlaboutspathemeone6").click(function(e) {
 $(".boxmlaboutspathemeone6").addClass("editable");

  
  
  $(".contmabouttelegram6").show();

 
});

$(".submitmabouttelegram6").click(function() {
  $(".boxmlaboutspathemeone6").removeClass("editable");
  $(".contmabouttelegram6").hide();
addHrefmabout6();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout6() {
var inputmabouttelegram6 = $('.inputmabouttelegram6').val();
if(inputmabouttelegram6 != ""){
  $('#hrefchangemabouttelegram6').attr("href",inputmabouttelegram6);
}
}



$(document).ready(function(){

  

$( ".boxmlaboutspathemeone7" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone7").hasClass("editable")) {
    $(".editmlaboutspathemeone7").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone7").hide();

});

 $(".editmlaboutspathemeone7").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone7").addClass("editable");
  $(".textmlaboutspathemeone7").attr("contenteditable", "true");
   $(".editmlaboutspathemeone7").hide();
  $(".savemlaboutspathemeone7").show();
 
});

$(".savemlaboutspathemeone7").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone7").removeClass("editable");
 $(".textmlaboutspathemeone7").removeAttr("contenteditable");
  $(".editmlaboutspathemeone7").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});






$(document).ready(function(){

  

$( ".boxmlaboutspathemeone8" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone8").hasClass("editable")) {
    $(".editmlaboutspathemeone8").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone8").hide();

});

 $(".editmlaboutspathemeone8").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone8").addClass("editable");
  $(".textmlaboutspathemeone8").attr("contenteditable", "true");
   $(".editmlaboutspathemeone8").hide();
  $(".savemlaboutspathemeone8").show();
 
});

$(".savemlaboutspathemeone8").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone8").removeClass("editable");
 $(".textmlaboutspathemeone8").removeAttr("contenteditable");
  $(".editmlaboutspathemeone8").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});


$(document).ready(function(){

   $(".contmaboutfacebook9").hide();

   $( ".boxmlaboutspathemeone9" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone9").hasClass("editable")) {
    $(".editmlaboutspathemeone9").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone9").hide();

});


$(".editmlaboutspathemeone9").click(function(e) {
 $(".boxmlaboutspathemeone9").addClass("editable");

  
  
  $(".contmaboutfacebook9").show();

 
});

$(".submitmaboutfacebook9").click(function() {
  $(".boxmlaboutspathemeone9").removeClass("editable");
  $(".contmaboutfacebook9").hide();
addHrefmabout9();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout9() {
var inputmaboutfacebook9 = $('.inputmaboutfacebook9').val();
if(inputmaboutfacebook9 != ""){
  $('#hrefchangemaboutfacebook9').attr("href",inputmaboutfacebook9);
}
}




$(document).ready(function(){

   $(".contmabouttwitter10").hide();

   $( ".boxmlaboutspathemeone10" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone10").hasClass("editable")) {
    $(".editmlaboutspathemeone10").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone10").hide();

});


$(".editmlaboutspathemeone10").click(function(e) {
 $(".boxmlaboutspathemeone10").addClass("editable");

  
  
  $(".contmabouttwitter10").show();

 
});

$(".submitmabouttwitter10").click(function() {
  $(".boxmlaboutspathemeone10").removeClass("editable");
  $(".contmabouttwitter10").hide();
addHrefmabout10();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout10() {
var inputmabouttwitter10 = $('.inputmabouttwitter10').val();
if(inputmabouttwitter10 != ""){
  $('#hrefchangemabouttwitter10').attr("href",inputmabouttwitter10);
}
}




$(document).ready(function(){

   $(".contmabouttelegram11").hide();

   $( ".boxmlaboutspathemeone11" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone11").hasClass("editable")) {
    $(".editmlaboutspathemeone11").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone11").hide();

});


$(".editmlaboutspathemeone11").click(function(e) {
 $(".boxmlaboutspathemeone11").addClass("editable");

  
  
  $(".contmabouttelegram11").show();

 
});

$(".submitmabouttelegram11").click(function() {
  $(".boxmlaboutspathemeone11").removeClass("editable");
  $(".contmabouttelegram11").hide();
addHrefmabout11();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout11() {
var inputmabouttelegram11 = $('.inputmabouttelegram11').val();
if(inputmabouttelegram11 != ""){
  $('#hrefchangemabouttelegram11').attr("href",inputmabouttelegram11);
}
}





$(document).ready(function(){

  

$( ".boxmlaboutspathemeone12" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone12").hasClass("editable")) {
    $(".editmlaboutspathemeone12").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone12").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone12").hide();

});

 $(".editmlaboutspathemeone12").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone12").addClass("editable");
  $(".textmlaboutspathemeone12").attr("contenteditable", "true");
   $(".editmlaboutspathemeone12").hide();
  $(".savemlaboutspathemeone12").show();
 
});

$(".savemlaboutspathemeone12").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone12").removeClass("editable");
 $(".textmlaboutspathemeone12").removeAttr("contenteditable");
  $(".editmlaboutspathemeone12").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmlaboutspathemeone13" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone13").hasClass("editable")) {
    $(".editmlaboutspathemeone13").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone13").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone13").hide();

});

 $(".editmlaboutspathemeone13").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone13").addClass("editable");
  $(".textmlaboutspathemeone13").attr("contenteditable", "true");
   $(".editmlaboutspathemeone13").hide();
  $(".savemlaboutspathemeone13").show();
 
});

$(".savemlaboutspathemeone13").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone13").removeClass("editable");
 $(".textmlaboutspathemeone13").removeAttr("contenteditable");
  $(".editmlaboutspathemeone13").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

   $(".contmaboutfacebook14").hide();

   $( ".boxmlaboutspathemeone14" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone14").hasClass("editable")) {
    $(".editmlaboutspathemeone14").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone14").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone14").hide();

});


$(".editmlaboutspathemeone14").click(function(e) {
 $(".boxmlaboutspathemeone14").addClass("editable");

  
  
  $(".contmaboutfacebook14").show();

 
});

$(".submitmaboutfacebook14").click(function() {
  $(".boxmlaboutspathemeone14").removeClass("editable");
  $(".contmaboutfacebook14").hide();
addHrefmabout14();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout14() {
var inputmaboutfacebook14 = $('.inputmaboutfacebook14').val();
if(inputmaboutfacebook14 != ""){
  $('#hrefchangemaboutfacebook14').attr("href",inputmaboutfacebook14);
}
}



$(document).ready(function(){

   $(".contmabouttwitter15").hide();

   $( ".boxmlaboutspathemeone15" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone15").hasClass("editable")) {
    $(".editmlaboutspathemeone15").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone15").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone15").hide();

});


$(".editmlaboutspathemeone15").click(function(e) {
 $(".boxmlaboutspathemeone15").addClass("editable");

  
  
  $(".contmabouttwitter15").show();

 
});

$(".submitmabouttwitter15").click(function() {
  $(".boxmlaboutspathemeone15").removeClass("editable");
  $(".contmabouttwitter15").hide();
addHrefmabout15();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout15() {
var inputmabouttwitter15 = $('.inputmabouttwitter15').val();
if(inputmabouttwitter15 != ""){
  $('#hrefchangemabouttwitter15').attr("href",inputmabouttwitter15);
}
}




$(document).ready(function(){

   $(".contmabouttelegram16").hide();

   $( ".boxmlaboutspathemeone16" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone16").hasClass("editable")) {
    $(".editmlaboutspathemeone16").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone16").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone16").hide();

});


$(".editmlaboutspathemeone16").click(function(e) {
 $(".boxmlaboutspathemeone16").addClass("editable");

  
  
  $(".contmabouttelegram16").show();

 
});

$(".submitmabouttelegram16").click(function() {
  $(".boxmlaboutspathemeone16").removeClass("editable");
  $(".contmabouttelegram16").hide();
addHrefmabout16();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmabout16() {
var inputmabouttelegram16 = $('.inputmabouttelegram16').val();
if(inputmabouttelegram16 != ""){
  $('#hrefchangemabouttelegram16').attr("href",inputmabouttelegram16);
}
}




$(document).ready(function(){

   $(".imageUploadmlaboutspathemeone17").hide();

$( ".boxmlaboutspathemeone17" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone17").hasClass("editable")) {
    $(".editmlaboutspathemeone17").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone17").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone17").hide();

});

 $(".editmlaboutspathemeone17").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone17").addClass("editable");
   $(".editmlaboutspathemeone17").hide();
  $(".savemlaboutspathemeone17").show();
  $(".imageUploadmlaboutspathemeone17").show();
});

$(".savemlaboutspathemeone17").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone17").removeClass("editable");
 
  $(".editmlaboutspathemeone17").hide();
  $(".imageUploadmlaboutspathemeone17").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlaboutspathemeone17").change(function() {
$("#imageUploadmlaboutspathemeone17").attr("name", "imageUploadmlaboutspathemeone17");
    readURLmabout17(this);
});

});
function readURLmabout17(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlaboutspathemeone17", "imageUploadmlaboutspathemeone17","#imagePreviewmlaboutspathemeone17");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutspathemeone17').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmlaboutspathemeone18").hide();

$( ".boxmlaboutspathemeone18" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone18").hasClass("editable")) {
    $(".editmlaboutspathemeone18").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone18").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone18").hide();

});

 $(".editmlaboutspathemeone18").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone18").addClass("editable");
   $(".editmlaboutspathemeone18").hide();
  $(".savemlaboutspathemeone18").show();
  $(".imageUploadmlaboutspathemeone18").show();
});

$(".savemlaboutspathemeone18").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone18").removeClass("editable");
 
  $(".editmlaboutspathemeone18").hide();
  $(".imageUploadmlaboutspathemeone18").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlaboutspathemeone18").change(function() {
$("#imageUploadmlaboutspathemeone18").attr("name", "imageUploadmlaboutspathemeone18");
    readURLmabout18(this);
});

});
function readURLmabout18(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlaboutspathemeone18", "imageUploadmlaboutspathemeone18","#imagePreviewmlaboutspathemeone18");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutspathemeone18').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmlaboutspathemeone19").hide();

$( ".boxmlaboutspathemeone19" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutspathemeone19").hasClass("editable")) {
    $(".editmlaboutspathemeone19").hide();

   } 
   else
   {
    $(".editmlaboutspathemeone19").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutspathemeone19").hide();

});

 $(".editmlaboutspathemeone19").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone19").addClass("editable");
   $(".editmlaboutspathemeone19").hide();
  $(".savemlaboutspathemeone19").show();
  $(".imageUploadmlaboutspathemeone19").show();
});

$(".savemlaboutspathemeone19").click(function() {
  $(this).hide();
  $(".boxmlaboutspathemeone19").removeClass("editable");
 
  $(".editmlaboutspathemeone19").hide();
  $(".imageUploadmlaboutspathemeone19").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlaboutspathemeone19").change(function() {
$("#imageUploadmlaboutspathemeone19").attr("name", "imageUploadmlaboutspathemeone19");
    readURLmabout19(this);
});

});
function readURLmabout19(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlaboutspathemeone19", "imageUploadmlaboutspathemeone19","#imagePreviewmlaboutspathemeone19");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutspathemeone19').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

</script>
<script>
$(document).ready(function(){

   $(".imageUploadmlaboutt1theme1").hide();
    

$( ".boxmlaboutt1theme1" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutt1theme1").hasClass("editable")) {
    $(".editmlaboutt1theme1").hide();

   } 
   else
   {
    $(".editmlaboutt1theme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutt1theme1").hide();

});

 $(".editmlaboutt1theme1").click(function() {
  $(this).hide();
  $(".boxmlaboutt1theme1").addClass("editable");
   $(".editmlaboutt1theme1").hide();
  $(".savemlaboutt1theme1").show();
  $(".imageUploadmlaboutt1theme1").show();
});

$(".savemlaboutt1theme1").click(function() {
  $(this).hide();
  $(".boxmlaboutt1theme1").removeClass("editable");
 
  $(".editmlaboutt1theme1").hide();
  $(".imageUploadmlaboutt1theme1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlaboutt1theme1").change(function() {
$("#imageUploadmlaboutt1theme1").attr("name", "imageUploadmlaboutt1theme1");
    readURLabt1(this);
});

});
function readURLabt1(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlaboutt1theme1", "imageUploadmlaboutt1theme1","#imagePreviewmlaboutt1theme1");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutt1theme1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

  

$( ".boxmlaboutt1theme2" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutt1theme2").hasClass("editable")) {
    $(".editmlaboutt1theme2").hide();

   } 
   else
   {
    $(".editmlaboutt1theme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutt1theme2").hide();

});

 $(".editmlaboutt1theme2").click(function() {
  $(this).hide();
  $(".boxmlaboutt1theme2").addClass("editable");
  $(".textmlaboutt1theme2").attr("contenteditable", "true");
   $(".editmlaboutt1theme2").hide();
  $(".savemlaboutt1theme2").show();
 
});

$(".savemlaboutt1theme2").click(function() {
  $(this).hide();
  $(".boxmlaboutt1theme2").removeClass("editable");
 $(".textmlaboutt1theme2").removeAttr("contenteditable");
  $(".editmlaboutt1theme2").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlaboutt1theme3" )
 .on("mouseenter", function() {
   if ($(".boxmlaboutt1theme3").hasClass("editable")) {
    $(".editmlaboutt1theme3").hide();

   } 
   else
   {
    $(".editmlaboutt1theme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlaboutt1theme3").hide();

});

 $(".editmlaboutt1theme3").click(function() {
  $(this).hide();
  $(".boxmlaboutt1theme3").addClass("editable");
  $(".textmlaboutt1theme3").attr("contenteditable", "true");
   $(".editmlaboutt1theme3").hide();
  $(".savemlaboutt1theme3").show();
 
});

$(".savemlaboutt1theme3").click(function() {
  $(this).hide();
  $(".boxmlaboutt1theme3").removeClass("editable");
 $(".textmlaboutt1theme3").removeAttr("contenteditable");
  $(".editmlaboutt1theme3").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});

$(document).ready(function(){

  

$( ".boxmlbannertheme1" )
 .on("mouseenter", function() {
   if ($(".boxmlbannertheme1").hasClass("editable")) {
    $(".editmlbannertheme1").hide();

   } 
   else
   {
    $(".editmlbannertheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlbannertheme1").hide();

});

 $(".editmlbannertheme1").click(function() {
  $(this).hide();
  $(".boxmlbannertheme1").addClass("editable");
  $(".textmlbannertheme1").attr("contenteditable", "true");
   $(".editmlbannertheme1").hide();
  $(".savemlbannertheme1").show();
 
});

$(".savemlbannertheme1").click(function() {
  $(this).hide();
  $(".boxmlbannertheme1").removeClass("editable");
 $(".textmlbannertheme1").removeAttr("contenteditable");
  $(".editmlbannertheme1").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

   $(".imageUploadmlbannertheme2").hide();

$( ".boxmlbannertheme2" )
 .on("mouseenter", function() {
   if ($(".boxmlbannertheme2").hasClass("editable")) {
    $(".editmlbannertheme2").hide();

   } 
   else
   {
    
   
    $(".editmlbannertheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlbannertheme2").hide();
 

});

 $(".editmlbannertheme2").click(function() {
  $(this).hide();
  $(".boxmlbannertheme2").addClass("editable");
   $(".editmlbannertheme2").hide();
  $(".savemlbannertheme2").show();
  $(".imageUploadmlbannertheme2").show();
});

$(".savemlbannertheme2").click(function() {
  $(this).hide();
  $(".boxmlbannertheme2").removeClass("editable");
 
  $(".editmlbannertheme2").hide();
  $(".imageUploadmlbannertheme2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");

});





$("#imageUploadmlbannertheme2").change(function() {
$("#imageUploadmlbannertheme2").attr("name", "imageUploadmlbannertheme2");
    readURLmbanner2(this);
});

});
function readURLmbanner2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlbannertheme2", "imageUploadmlbannertheme2",".themeone .welcome-image-area");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.themeone .welcome-image-area').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

  

$( ".boxmlfactsblabethemeone1" )
 .on("mouseenter", function() {
   if ($(".boxmlfactsblabethemeone1").hasClass("editable")) {
    $(".editmlfactsblabethemeone1").hide();

   } 
   else
   {
    $(".editmlfactsblabethemeone1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfactsblabethemeone1").hide();

});

 $(".editmlfactsblabethemeone1").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone1").addClass("editable");
  $(".textmlfactsblabethemeone1").attr("contenteditable", "true");
   $(".editmlfactsblabethemeone1").hide();
  $(".savemlfactsblabethemeone1").show();
 
});

$(".savemlfactsblabethemeone1").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone1").removeClass("editable");
 $(".textmlfactsblabethemeone1").removeAttr("contenteditable");
  $(".editmlfactsblabethemeone1").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlfactsblabethemeone2" )
 .on("mouseenter", function() {
   if ($(".boxmlfactsblabethemeone2").hasClass("editable")) {
    $(".editmlfactsblabethemeone2").hide();

   } 
   else
   {
    $(".editmlfactsblabethemeone2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfactsblabethemeone2").hide();

});

 $(".editmlfactsblabethemeone2").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone2").addClass("editable");
  $(".textmlfactsblabethemeone2").attr("contenteditable", "true");
   $(".editmlfactsblabethemeone2").hide();
  $(".savemlfactsblabethemeone2").show();
 
});

$(".savemlfactsblabethemeone2").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone2").removeClass("editable");
 $(".textmlfactsblabethemeone2").removeAttr("contenteditable");
  $(".editmlfactsblabethemeone2").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlfactsblabethemeone3" )
 .on("mouseenter", function() {
   if ($(".boxmlfactsblabethemeone3").hasClass("editable")) {
    $(".editmlfactsblabethemeone3").hide();

   } 
   else
   {
    $(".editmlfactsblabethemeone3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfactsblabethemeone3").hide();

});

 $(".editmlfactsblabethemeone3").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone3").addClass("editable");
  $(".textmlfactsblabethemeone3").attr("contenteditable", "true");
   $(".editmlfactsblabethemeone3").hide();
  $(".savemlfactsblabethemeone3").show();
 
});

$(".savemlfactsblabethemeone3").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone3").removeClass("editable");
 $(".textmlfactsblabethemeone3").removeAttr("contenteditable");
  $(".editmlfactsblabethemeone3").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlfactsblabethemeone4" )
 .on("mouseenter", function() {
   if ($(".boxmlfactsblabethemeone4").hasClass("editable")) {
    $(".editmlfactsblabethemeone4").hide();

   } 
   else
   {
    $(".editmlfactsblabethemeone4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfactsblabethemeone4").hide();

});

 $(".editmlfactsblabethemeone4").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone4").addClass("editable");
  $(".textmlfactsblabethemeone4").attr("contenteditable", "true");
   $(".editmlfactsblabethemeone4").hide();
  $(".savemlfactsblabethemeone4").show();
 
});

$(".savemlfactsblabethemeone4").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone4").removeClass("editable");
 $(".textmlfactsblabethemeone4").removeAttr("contenteditable");
  $(".editmlfactsblabethemeone4").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});


$(document).ready(function(){

   $(".imageUploadmlfactsblabethemeone5").hide();

$( ".boxmlfactsblabethemeone5" )
 .on("mouseenter", function() {
   if ($(".boxmlfactsblabethemeone5").hasClass("editable")) {
    $(".editmlfactsblabethemeone5").hide();

   } 
   else
   {
    
   
    $(".editmlfactsblabethemeone5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfactsblabethemeone5").hide();
 

});

 $(".editmlfactsblabethemeone5").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone5").addClass("editable");
   $(".editmlfactsblabethemeone5").hide();
  $(".savemlfactsblabethemeone5").show();
  $(".imageUploadmlfactsblabethemeone5").show();
});

$(".savemlfactsblabethemeone5").click(function() {
  $(this).hide();
  $(".boxmlfactsblabethemeone5").removeClass("editable");
 
  $(".editmlfactsblabethemeone5").hide();
  $(".imageUploadmlfactsblabethemeone5").hide();
 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});





$("#imageUploadmlfactsblabethemeone5").change(function() {
$("#imageUploadmlfactsblabethemeone5").attr("name", "imageUploadmlfactsblabethemeone5");
    readURLmthree1(this);
});

});
function readURLmthree1(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlfactsblabethemeone5", "imageUploadmlfactsblabethemeone5",".themeone .facts");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.themeone .facts').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

  

$( ".boxmlfaqtheme1" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme1").hasClass("editable")) {
    $(".editmlfaqtheme1").hide();

   } 
   else
   {
    $(".editmlfaqtheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme1").hide();

});

 $(".editmlfaqtheme1").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme1").addClass("editable");
  $(".textmlfaqtheme1").attr("contenteditable", "true");
   $(".editmlfaqtheme1").hide();
  $(".savemlfaqtheme1").show();
 
});

$(".savemlfaqtheme1").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme1").removeClass("editable");
 $(".textmlfaqtheme1").removeAttr("contenteditable");
  $(".editmlfaqtheme1").hide();

Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");  
});
});




$(document).ready(function(){

  

$( ".boxmlfaqtheme2" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme2").hasClass("editable")) {
    $(".editmlfaqtheme2").hide();

   } 
   else
   {
    $(".editmlfaqtheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme2").hide();

});

 $(".editmlfaqtheme2").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme2").addClass("editable");
  $(".textmlfaqtheme2").attr("contenteditable", "true");
   $(".editmlfaqtheme2").hide();
  $(".savemlfaqtheme2").show();
 
});

$(".savemlfaqtheme2").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme2").removeClass("editable");
 $(".textmlfaqtheme2").removeAttr("contenteditable");
  $(".editmlfaqtheme2").hide();

Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");  
});
});




$(document).ready(function(){

  

$( ".boxmlfaqtheme3" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme3").hasClass("editable")) {
    $(".editmlfaqtheme3").hide();

   } 
   else
   {
    $(".editmlfaqtheme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme3").hide();

});

 $(".editmlfaqtheme3").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme3").addClass("editable");
  $(".textmlfaqtheme3").attr("contenteditable", "true");
   $(".editmlfaqtheme3").hide();
  $(".savemlfaqtheme3").show();
 
});

$(".savemlfaqtheme3").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme3").removeClass("editable");
 $(".textmlfaqtheme3").removeAttr("contenteditable");
  $(".editmlfaqtheme3").hide();

Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");  
});
});




$(document).ready(function(){

  

$( ".boxmlfaqtheme4" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme4").hasClass("editable")) {
    $(".editmlfaqtheme4").hide();

   } 
   else
   {
    $(".editmlfaqtheme4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme4").hide();

});

 $(".editmlfaqtheme4").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme4").addClass("editable");
  $(".textmlfaqtheme4").attr("contenteditable", "true");
   $(".editmlfaqtheme4").hide();
  $(".savemlfaqtheme4").show();
 
});

$(".savemlfaqtheme4").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme4").removeClass("editable");
 $(".textmlfaqtheme4").removeAttr("contenteditable");
  $(".editmlfaqtheme4").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmlfaqtheme5" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme5").hasClass("editable")) {
    $(".editmlfaqtheme5").hide();

   } 
   else
   {
    $(".editmlfaqtheme5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme5").hide();

});

 $(".editmlfaqtheme5").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme5").addClass("editable");
  $(".textmlfaqtheme5").attr("contenteditable", "true");
   $(".editmlfaqtheme5").hide();
  $(".savemlfaqtheme5").show();
 
});

$(".savemlfaqtheme5").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme5").removeClass("editable");
 $(".textmlfaqtheme5").removeAttr("contenteditable");
  $(".editmlfaqtheme5").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlfaqtheme6" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme6").hasClass("editable")) {
    $(".editmlfaqtheme6").hide();

   } 
   else
   {
    $(".editmlfaqtheme6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme6").hide();

});

 $(".editmlfaqtheme6").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme6").addClass("editable");
  $(".textmlfaqtheme6").attr("contenteditable", "true");
   $(".editmlfaqtheme6").hide();
  $(".savemlfaqtheme6").show();
 
});

$(".savemlfaqtheme6").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme6").removeClass("editable");
 $(".textmlfaqtheme6").removeAttr("contenteditable");
  $(".editmlfaqtheme6").hide();

Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");  
});
});



$(document).ready(function(){

  

$( ".boxmlfaqtheme7" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme7").hasClass("editable")) {
    $(".editmlfaqtheme7").hide();

   } 
   else
   {
    $(".editmlfaqtheme7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme7").hide();

});

 $(".editmlfaqtheme7").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme7").addClass("editable");
  $(".textmlfaqtheme7").attr("contenteditable", "true");
   $(".editmlfaqtheme7").hide();
  $(".savemlfaqtheme7").show();
 
});

$(".savemlfaqtheme7").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme7").removeClass("editable");
 $(".textmlfaqtheme7").removeAttr("contenteditable");
  $(".editmlfaqtheme7").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlfaqtheme8" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme8").hasClass("editable")) {
    $(".editmlfaqtheme8").hide();

   } 
   else
   {
    $(".editmlfaqtheme8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme8").hide();

});

 $(".editmlfaqtheme8").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme8").addClass("editable");
  $(".textmlfaqtheme8").attr("contenteditable", "true");
   $(".editmlfaqtheme8").hide();
  $(".savemlfaqtheme8").show();
 
});

$(".savemlfaqtheme8").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme8").removeClass("editable");
 $(".textmlfaqtheme8").removeAttr("contenteditable");
  $(".editmlfaqtheme8").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});




$(document).ready(function(){

  

$( ".boxmlfaqtheme9" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme9").hasClass("editable")) {
    $(".editmlfaqtheme9").hide();

   } 
   else
   {
    $(".editmlfaqtheme9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme9").hide();

});

 $(".editmlfaqtheme9").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme9").addClass("editable");
  $(".textmlfaqtheme9").attr("contenteditable", "true");
   $(".editmlfaqtheme9").hide();
  $(".savemlfaqtheme9").show();
 
});

$(".savemlfaqtheme9").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme9").removeClass("editable");
 $(".textmlfaqtheme9").removeAttr("contenteditable");
  $(".editmlfaqtheme9").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmlfaqtheme10" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme10").hasClass("editable")) {
    $(".editmlfaqtheme10").hide();

   } 
   else
   {
    $(".editmlfaqtheme10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme10").hide();

});

 $(".editmlfaqtheme10").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme10").addClass("editable");
  $(".textmlfaqtheme10").attr("contenteditable", "true");
   $(".editmlfaqtheme10").hide();
  $(".savemlfaqtheme10").show();
 
});

$(".savemlfaqtheme10").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme10").removeClass("editable");
 $(".textmlfaqtheme10").removeAttr("contenteditable");
  $(".editmlfaqtheme10").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlfaqtheme11" )
 .on("mouseenter", function() {
   if ($(".boxmlfaqtheme11").hasClass("editable")) {
    $(".editmlfaqtheme11").hide();

   } 
   else
   {
    $(".editmlfaqtheme11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfaqtheme11").hide();

});

 $(".editmlfaqtheme11").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme11").addClass("editable");
  $(".textmlfaqtheme11").attr("contenteditable", "true");
   $(".editmlfaqtheme11").hide();
  $(".savemlfaqtheme11").show();
 
});

$(".savemlfaqtheme11").click(function() {
  $(this).hide();
  $(".boxmlfaqtheme11").removeClass("editable");
 $(".textmlfaqtheme11").removeAttr("contenteditable");
  $(".editmlfaqtheme11").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});

$(document).ready(function(){

   $(".imageUploadmlactheme2").hide();

$( ".boxmlactheme2" )
 .on("mouseenter", function() {
   if ($(".boxmlactheme2").hasClass("editable")) {
    $(".editmlactheme2").hide();

   } 
   else
   {
    
   
    $(".editmlactheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlactheme2").hide();
 

});

 $(".editmlactheme2").click(function() {
  $(this).hide();
  $(".boxmlactheme2").addClass("editable");
   $(".editmlactheme2").hide();
  $(".savemlactheme2").show();
  $(".imageUploadmlactheme2").show();
});

$(".savemlactheme2").click(function() {
  $(this).hide();
  $(".boxmlactheme2").removeClass("editable");
 
  $(".editmlactheme2").hide();
  $(".imageUploadmlactheme2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlactheme2").change(function() {
$("#imageUploadmlactheme2").attr("name", "imageUploadmlactheme2");
    readURLmac2(this);
});

});
function readURLmac2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlactheme2", "imageUploadmlactheme2",".cbakimg");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.cbakimg').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){
$(".boxmlfooterbladethemeone2").removeClass("editable");
   $(".contmfooterfacebook2").hide();

   $( ".boxmlfooterbladethemeone2" )
 .on("mouseenter", function() {
   if ($(".boxmlfooterbladethemeone2").hasClass("editable")) {
    $(".editmlfooterbladethemeone2").hide();

   } 
   else
   {
    $(".editmlfooterbladethemeone2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfooterbladethemeone2").hide();

});


$(".editmlfooterbladethemeone2").click(function(e) {
 $(".boxmlfooterbladethemeone2").addClass("editable");

  
  
  $(".contmfooterfacebook2").show();
  //$(".contmfooterfacebook2").hide();
    $(".contmfootertwitter3").hide();
    $(".contmfooterrss4").hide();
    $(".contmfooteryoutube5").hide();
     $(".contmfooterlinkedin6").hide();
    $(".contmfootergoogleplus7").hide();

 
});

$(".submitmfooterfacebook2").click(function() {
  $(".boxmlfooterbladethemeone2").removeClass("editable");
  $(".contmfooterfacebook2").hide();
addHrefmfooter2();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmfooter2() {
var inputmfooterfacebook2 = $('.inputmfooterfacebook2').val();
if(inputmabouttelegram16 != ""){
  $('#hrefchangemfooterfacebook2').attr("href",inputmfooterfacebook2);
}
}

$(document).ready(function(){
$(".boxmlfooterbladethemeone3").removeClass("editable");
   $(".contmfootertwitter3").hide();

   $( ".boxmlfooterbladethemeone3" )
 .on("mouseenter", function() {
   if ($(".boxmlfooterbladethemeone3").hasClass("editable")) {
    $(".editmlfooterbladethemeone3").hide();

   } 
   else
   {
    $(".editmlfooterbladethemeone3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfooterbladethemeone3").hide();

});


$(".editmlfooterbladethemeone3").click(function(e) {
 $(".boxmlfooterbladethemeone3").addClass("editable");

  
  
  $(".contmfootertwitter3").show();
  $(".contmfooterfacebook2").hide();
    //$(".contmfootertwitter3").hide();
    $(".contmfooterrss4").hide();
    $(".contmfooteryoutube5").hide();
    $(".contmfooterlinkedin6").hide();
    $(".contmfootergoogleplus7").hide();


 
});

$(".submitmfootertwitter3").click(function() {

  $(".boxmlfooterbladethemeone3").removeClass("editable");
  $(".contmfootertwitter3").hide();
addHrefmfooter3();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmfooter3() {
var inputmfootertwitter3 = $('.inputmfootertwitter3').val();
if(inputmfootertwitter3 != ""){
  $('#hrefchangemfootertwitter3').attr("href",inputmfootertwitter3);
}
}


$(document).ready(function(){
$(".boxmlfooterbladethemeone4").removeClass("editable");
   $(".contmfooterrss4").hide();

   $( ".boxmlfooterbladethemeone4" )
 .on("mouseenter", function() {
   if ($(".boxmlfooterbladethemeone4").hasClass("editable")) {
    $(".editmlfooterbladethemeone4").hide();

   } 
   else
   {
    $(".editmlfooterbladethemeone4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfooterbladethemeone4").hide();

});


$(".editmlfooterbladethemeone4").click(function(e) {
 $(".boxmlfooterbladethemeone4").addClass("editable");

  
  
  $(".contmfooterrss4").show();

  $(".contmfooterfacebook2").hide();
    $(".contmfootertwitter3").hide();
    //$(".contmfooterrss4").hide();
    $(".contmfooteryoutube5").hide();
     $(".contmfooterlinkedin6").hide();
    $(".contmfootergoogleplus7").hide();


 
});

$(".submitmfooterrss4").click(function() {

  $(".boxmlfooterbladethemeone4").removeClass("editable");
  $(".contmfooterrss4").hide();
addHrefmfooter4();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmfooter4() {
var inputmfooterrss4 = $('.inputmfooterrss4').val();
if(inputmfooterrss4 != ""){
  $('#hrefchangemfooterrss4').attr("href",inputmfooterrss4);
}
}



$(document).ready(function(){
 $(".boxmlfooterbladethemeone5").removeClass("editable");
   $(".contmfooteryoutube5").hide();

   $( ".boxmlfooterbladethemeone5" )
 .on("mouseenter", function() {
   if ($(".boxmlfooterbladethemeone5").hasClass("editable")) {
    $(".editmlfooterbladethemeone5").hide();

   } 
   else
   {
    $(".editmlfooterbladethemeone5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfooterbladethemeone5").hide();

});


$(".editmlfooterbladethemeone5").click(function(e) {
 $(".boxmlfooterbladethemeone5").addClass("editable");

  
  
  $(".contmfooteryoutube5").show();
  $(".contmfooterfacebook2").hide();
    $(".contmfootertwitter3").hide();
    $(".contmfooterrss4").hide();
    //$(".contmfooteryoutube5").hide();
     $(".contmfooterlinkedin6").hide();
    $(".contmfootergoogleplus7").hide();


 
});

$(".submitmfooteryoutube5").click(function() {

  $(".boxmlfooterbladethemeone5").removeClass("editable");
  $(".contmfooteryoutube5").hide();
addHrefmfooter5();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmfooter5() {
var inputmfooteryoutube5 = $('.inputmfooteryoutube5').val();
if(inputmfooteryoutube5 != ""){
  $('#hrefchangemfooteryoutube5').attr("href",inputmfooteryoutube5);
}
}


$(document).ready(function(){
 $(".boxmlfooterbladethemeone6").removeClass("editable");
   $(".contmfooterlinkedin6").hide();

   $( ".boxmlfooterbladethemeone6" )
 .on("mouseenter", function() {
   if ($(".boxmlfooterbladethemeone6").hasClass("editable")) {
    $(".editmlfooterbladethemeone6").hide();

   } 
   else
   {
    $(".editmlfooterbladethemeone6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfooterbladethemeone6").hide();

});


$(".editmlfooterbladethemeone6").click(function(e) {
 $(".boxmlfooterbladethemeone6").addClass("editable");

  
  
  $(".contmfooterlinkedin6").show();

   $(".contmfooterfacebook2").hide();
    $(".contmfootertwitter3").hide();
    $(".contmfooterrss4").hide();
    $(".contmfooteryoutube5").hide();
     //$(".contmfooterlinkedin6").hide();
    $(".contmfootergoogleplus7").hide();
 
});

$(".submitmfooterlinkedin6").click(function() {

  $(".boxmlfooterbladethemeone6").removeClass("editable");
  $(".contmfooterlinkedin6").hide();
addHrefmfooter6();
 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});

 
});

function addHrefmfooter6() {
var inputmfooterlinkedin6 = $('.inputmfooterlinkedin6').val();
if(inputmfooterlinkedin6 != ""){
  $('#hrefchangemfooterlinkedin6').attr("href",inputmfooterlinkedin6);
}
}



$(document).ready(function(){
 $(".boxmlfooterbladethemeone7").removeClass("editable");
   $(".contmfootergoogleplus7").hide();

   $( ".boxmlfooterbladethemeone7" )
 .on("mouseenter", function() {
   if ($(".boxmlfooterbladethemeone7").hasClass("editable")) {
    $(".editmlfooterbladethemeone7").hide();

   } 
   else
   {
    $(".editmlfooterbladethemeone7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlfooterbladethemeone7").hide();

});


$(".editmlfooterbladethemeone7").click(function(e) {
 $(".boxmlfooterbladethemeone7").addClass("editable");

  
  
  $(".contmfootergoogleplus7").show();
  $(".contmfooterfacebook2").hide();
    $(".contmfootertwitter3").hide();
    $(".contmfooterrss4").hide();
    $(".contmfooteryoutube5").hide();
     $(".contmfooterlinkedin6").hide();
    //$(".contmfootergoogleplus7").hide();

 
});

$(".submitmfootergoogleplus7").click(function() {

  $(".boxmlfooterbladethemeone7").removeClass("editable");
  $(".contmfootergoogleplus7").hide();
addHrefmfooter7();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmfooter7() {
var inputmfootergoogleplus7 = $('.inputmfootergoogleplus7').val();
if(inputmfootergoogleplus7 != ""){
  $('#hrefchangemfootergoogleplus7').attr("href",inputmfootergoogleplus7);
}
}

$(document).ready(function(){

   $(".imageUploadmlservice0theme1").hide();

$( ".boxmlservice0theme1" )
 .on("mouseenter", function() {
   if ($(".boxmlservice0theme1").hasClass("editable")) {
    $(".editmlservice0theme1").hide();

   } 
   else
   {
    
   
    $(".editmlservice0theme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice0theme1").hide();
 

});

 $(".editmlservice0theme1").click(function() {
  $(this).hide();
  $(".boxmlservice0theme1").addClass("editable");
   $(".editmlservice0theme1").hide();
  $(".savemlservice0theme1").show();
  $(".imageUploadmlservice0theme1").show();
});

$(".savemlservice0theme1").click(function() {
  $(this).hide();
  $(".boxmlservice0theme1").removeClass("editable");
 
  $(".editmlservice0theme1").hide();
  $(".imageUploadmlservice0theme1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");

});





$("#imageUploadmlservice0theme1").change(function() {
$("#imageUploadmlservice0theme1").attr("name", "imageUploadmlservice0theme1");
    readURLmservice0theme1(this);
});

});
function readURLmservice0theme1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.footer-widgets').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

  

$( ".boxmlservice1theme1" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme1").hasClass("editable")) {
    $(".editmlservice1theme1").hide();

   } 
   else
   {
    $(".editmlservice1theme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme1").hide();

});

 $(".editmlservice1theme1").click(function() {
  $(this).hide();
  $(".boxmlservice1theme1").addClass("editable");
  $(".textmlservice1theme1").attr("contenteditable", "true");
   $(".editmlservice1theme1").hide();
  $(".savemlservice1theme1").show();
 
});

$(".savemlservice1theme1").click(function() {
  $(this).hide();
  $(".boxmlservice1theme1").removeClass("editable");
 $(".textmlservice1theme1").removeAttr("contenteditable");
  $(".editmlservice1theme1").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlservice1theme2" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme2").hasClass("editable")) {
    $(".editmlservice1theme2").hide();

   } 
   else
   {
    $(".editmlservice1theme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme2").hide();

});

 $(".editmlservice1theme2").click(function() {
  $(this).hide();
  $(".boxmlservice1theme2").addClass("editable");
  $(".textmlservice1theme2").attr("contenteditable", "true");
   $(".editmlservice1theme2").hide();
  $(".savemlservice1theme2").show();
 
});

$(".savemlservice1theme2").click(function() {
  $(this).hide();
  $(".boxmlservice1theme2").removeClass("editable");
 $(".textmlservice1theme2").removeAttr("contenteditable");
  $(".editmlservice1theme2").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmlservice1theme3" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme3").hasClass("editable")) {
    $(".editmlservice1theme3").hide();

   } 
   else
   {
    $(".editmlservice1theme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme3").hide();

});

 $(".editmlservice1theme3").click(function() {
  $(this).hide();
  $(".boxmlservice1theme3").addClass("editable");
  $(".textmlservice1theme3").attr("contenteditable", "true");
   $(".editmlservice1theme3").hide();
  $(".savemlservice1theme3").show();
 
});

$(".savemlservice1theme3").click(function() {
  $(this).hide();
  $(".boxmlservice1theme3").removeClass("editable");
 $(".textmlservice1theme3").removeAttr("contenteditable");
  $(".editmlservice1theme3").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});




$(document).ready(function(){

  

$( ".boxmlservice1theme4" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme4").hasClass("editable")) {
    $(".editmlservice1theme4").hide();

   } 
   else
   {
    $(".editmlservice1theme4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme4").hide();

});

 $(".editmlservice1theme4").click(function() {
  $(this).hide();
  $(".boxmlservice1theme4").addClass("editable");
  $(".textmlservice1theme4").attr("contenteditable", "true");
   $(".editmlservice1theme4").hide();
  $(".savemlservice1theme4").show();
 
});

$(".savemlservice1theme4").click(function() {
  $(this).hide();
  $(".boxmlservice1theme4").removeClass("editable");
 $(".textmlservice1theme4").removeAttr("contenteditable");
  $(".editmlservice1theme4").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});





$(document).ready(function(){

  

$( ".boxmlservice1theme5" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme5").hasClass("editable")) {
    $(".editmlservice1theme5").hide();

   } 
   else
   {
    $(".editmlservice1theme5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme5").hide();

});

 $(".editmlservice1theme5").click(function() {
  $(this).hide();
  $(".boxmlservice1theme5").addClass("editable");
  $(".textmlservice1theme5").attr("contenteditable", "true");
   $(".editmlservice1theme5").hide();
  $(".savemlservice1theme5").show();
 
});

$(".savemlservice1theme5").click(function() {
  $(this).hide();
  $(".boxmlservice1theme5").removeClass("editable");
 $(".textmlservice1theme5").removeAttr("contenteditable");
  $(".editmlservice1theme5").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});





$(document).ready(function(){

  

$( ".boxmlservice1theme6" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme6").hasClass("editable")) {
    $(".editmlservice1theme6").hide();

   } 
   else
   {
    $(".editmlservice1theme6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme6").hide();

});

 $(".editmlservice1theme6").click(function() {
  $(this).hide();
  $(".boxmlservice1theme6").addClass("editable");
  $(".textmlservice1theme6").attr("contenteditable", "true");
   $(".editmlservice1theme6").hide();
  $(".savemlservice1theme6").show();
 
});

$(".savemlservice1theme6").click(function() {
  $(this).hide();
  $(".boxmlservice1theme6").removeClass("editable");
 $(".textmlservice1theme6").removeAttr("contenteditable");
  $(".editmlservice1theme6").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

   $(".contmservice1facebook7").hide();

   $( ".boxmlservice1theme7" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme7").hasClass("editable")) {
    $(".editmlservice1theme7").hide();

   } 
   else
   {
    $(".editmlservice1theme7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme7").hide();

});


$(".editmlservice1theme7").click(function(e) {
 $(".boxmlservice1theme7").addClass("editable");

  
  
  $(".contmservice1facebook7").show();

 
});

$(".submitmservice1facebook7").click(function() {
  $(".boxmlservice1theme7").removeClass("editable");
  $(".contmservice1facebook7").hide();
addHrefmserviceone7();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmserviceone7() {
var inputmservice1facebook7 = $('.inputmservice1facebook7').val();
if(inputmservice1facebook7 != ""){
  $('#hrefchangemservice1facebook7').attr("href",inputmservice1facebook7);
}
}




$(document).ready(function(){

   $(".contmservice1twitter8").hide();

   $( ".boxmlservice1theme8" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme8").hasClass("editable")) {
    $(".editmlservice1theme8").hide();

   } 
   else
   {
    $(".editmlservice1theme8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme8").hide();

});


$(".editmlservice1theme8").click(function(e) {
 $(".boxmlservice1theme8").addClass("editable");

  
  
  $(".contmservice1twitter8").show();

 
});

$(".submitmservice1twitter8").click(function() {
  $(".boxmlservice1theme8").removeClass("editable");
  $(".contmservice1twitter8").hide();
addHrefmserviceone8();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmserviceone8() {
var inputmservice1twitter8 = $('.inputmservice1twitter8').val();
if(inputmservice1twitter8 != ""){
  $('#hrefchangemservice1twitter8').attr("href",inputmservice1twitter8);
}

}



$(document).ready(function(){

   $(".contmservice1telegram9").hide();

   $( ".boxmlservice1theme9" )
 .on("mouseenter", function() {
   if ($(".boxmlservice1theme9").hasClass("editable")) {
    $(".editmlservice1theme9").hide();

   } 
   else
   {
    $(".editmlservice1theme9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservice1theme9").hide();

});


$(".editmlservice1theme9").click(function(e) {
 $(".boxmlservice1theme9").addClass("editable");

  
  
  $(".contmservice1telegram9").show();

 
});

$(".submitmservice1telegram9").click(function() {
  $(".boxmlservice1theme9").removeClass("editable");
  $(".contmservice1telegram9").hide();
addHrefmserviceone9();
 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});

 
});

function addHrefmserviceone9() {
var inputmservice1telegram9 = $('.inputmservice1telegram9').val();
if(inputmservice1telegram9 != ""){
  $('#hrefchangemservice1telegram9').attr("href",inputmservice1telegram9);
}
}

$(document).ready(function(){

  

$( ".boxmlparallaxonetheme1" )
 .on("mouseenter", function() {
   if ($(".boxmlparallaxonetheme1").hasClass("editable")) {
    $(".editmlparallaxonetheme1").hide();

   } 
   else
   {
    $(".editmlparallaxonetheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlparallaxonetheme1").hide();

});

 $(".editmlparallaxonetheme1").click(function() {
  $(this).hide();
  $(".boxmlparallaxonetheme1").addClass("editable");
  $(".textmlparallaxonetheme1").attr("contenteditable", "true");
   $(".editmlparallaxonetheme1").hide();
  $(".savemlparallaxonetheme1").show();
 
});

$(".savemlparallaxonetheme1").click(function() {
  $(this).hide();
  $(".boxmlparallaxonetheme1").removeClass("editable");
 $(".textmlparallaxonetheme1").removeAttr("contenteditable");
  $(".editmlparallaxonetheme1").hide();

   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

   $(".imageUploadmlparallaxonetheme2").hide();

$( ".boxmlparallaxonetheme2" )
 .on("mouseenter", function() {
   if ($(".boxmlparallaxonetheme2").hasClass("editable")) {
    $(".editmlparallaxonetheme2").hide();

   } 
   else
   {
    
   
    $(".editmlparallaxonetheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlparallaxonetheme2").hide();
 

});

 $(".editmlparallaxonetheme2").click(function() {
  $(this).hide();
  $(".boxmlparallaxonetheme2").addClass("editable");
   $(".editmlparallaxonetheme2").hide();
  $(".savemlparallaxonetheme2").show();
  $(".imageUploadmlparallaxonetheme2").show();
});

$(".savemlparallaxonetheme2").click(function() {
  $(this).hide();
  $(".boxmlparallaxonetheme2").removeClass("editable");
 
  $(".editmlparallaxonetheme2").hide();
  $(".imageUploadmlparallaxonetheme2").hide();
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlparallaxonetheme2").change(function() {
$("#imageUploadmlparallaxonetheme2").attr("name", "imageUploadmlparallaxonetheme2");
    readURLparallaxtwo2(this);
});

});
function readURLparallaxtwo2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlparallaxonetheme2", "imageUploadmlparallaxonetheme2",".backstretchtwo");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.backstretchtwo').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmlparallaxonetheme3").hide();

$( ".boxmlparallaxonetheme3" )
 .on("mouseenter", function() {
   if ($(".boxmlparallaxonetheme3").hasClass("editable")) {
    $(".editmlparallaxonetheme3").hide();

   } 
   else
   {
    
   
    $(".editmlparallaxonetheme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlparallaxonetheme3").hide();
 

});

 $(".editmlparallaxonetheme3").click(function() {
  $(this).hide();
  $(".boxmlparallaxonetheme3").addClass("editable");
   $(".editmlparallaxonetheme3").hide();
  $(".savemlparallaxonetheme3").show();
  $(".imageUploadmlparallaxonetheme3").show();
});

$(".savemlparallaxonetheme3").click(function() {
  $(this).hide();
  $(".boxmlparallaxonetheme3").removeClass("editable");
 
  $(".editmlparallaxonetheme3").hide();
  $(".imageUploadmlparallaxonetheme3").hide();
   Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlparallaxonetheme3").change(function() {
$("#imageUploadmlparallaxonetheme3").attr("name", "imageUploadmlparallaxonetheme3");
    readURLparallaxtwo3(this);
});

});
function readURLparallaxtwo3(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlparallaxonetheme3", "imageUploadmlparallaxonetheme3",".backstretchone");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
              console.log(e.target.result);
               $('.backstretchone').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

  

$( ".boxmlservices1theme1" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme1").hasClass("editable")) {
    $(".editmlservices1theme1").hide();

   } 
   else
   {
    $(".editmlservices1theme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme1").hide();

});

 $(".editmlservices1theme1").click(function() {
  $(this).hide();
  $(".boxmlservices1theme1").addClass("editable");
  $(".textmlservices1theme1").attr("contenteditable", "true");
   $(".editmlservices1theme1").hide();
  $(".savemlservices1theme1").show();
 
});

$(".savemlservices1theme1").click(function() {
  $(this).hide();
  $(".boxmlservices1theme1").removeClass("editable");
 $(".textmlservices1theme1").removeAttr("contenteditable");
  $(".editmlservices1theme1").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmlservices1theme2" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme2").hasClass("editable")) {
    $(".editmlservices1theme2").hide();

   } 
   else
   {
    $(".editmlservices1theme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme2").hide();

});

 $(".editmlservices1theme2").click(function() {
  $(this).hide();
  $(".boxmlservices1theme2").addClass("editable");
  $(".textmlservices1theme2").attr("contenteditable", "true");
   $(".editmlservices1theme2").hide();
  $(".savemlservices1theme2").show();
 
});

$(".savemlservices1theme2").click(function() {
  $(this).hide();
  $(".boxmlservices1theme2").removeClass("editable");
 $(".textmlservices1theme2").removeAttr("contenteditable");
  $(".editmlservices1theme2").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});



$(document).ready(function(){

  

$( ".boxmlservices1theme3" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme3").hasClass("editable")) {
    $(".editmlservices1theme3").hide();

   } 
   else
   {
    $(".editmlservices1theme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme3").hide();

});

 $(".editmlservices1theme3").click(function() {
  $(this).hide();
  $(".boxmlservices1theme3").addClass("editable");
  $(".textmlservices1theme3").attr("contenteditable", "true");
   $(".editmlservices1theme3").hide();
  $(".savemlservices1theme3").show();
 
});

$(".savemlservices1theme3").click(function() {
  $(this).hide();
  $(".boxmlservices1theme3").removeClass("editable");
 $(".textmlservices1theme3").removeAttr("contenteditable");
  $(".editmlservices1theme3").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlservices1theme4" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme4").hasClass("editable")) {
    $(".editmlservices1theme4").hide();

   } 
   else
   {
    $(".editmlservices1theme4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme4").hide();

});

 $(".editmlservices1theme4").click(function() {
  $(this).hide();
  $(".boxmlservices1theme4").addClass("editable");
  $(".textmlservices1theme4").attr("contenteditable", "true");
   $(".editmlservices1theme4").hide();
  $(".savemlservices1theme4").show();
 
});

$(".savemlservices1theme4").click(function() {
  $(this).hide();
  $(".boxmlservices1theme4").removeClass("editable");
 $(".textmlservices1theme4").removeAttr("contenteditable");
  $(".editmlservices1theme4").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlservices1theme5" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme5").hasClass("editable")) {
    $(".editmlservices1theme5").hide();

   } 
   else
   {
    $(".editmlservices1theme5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme5").hide();

});

 $(".editmlservices1theme5").click(function() {
  $(this).hide();
  $(".boxmlservices1theme5").addClass("editable");
  $(".textmlservices1theme5").attr("contenteditable", "true");
   $(".editmlservices1theme5").hide();
  $(".savemlservices1theme5").show();
 
});

$(".savemlservices1theme5").click(function() {
  $(this).hide();
  $(".boxmlservices1theme5").removeClass("editable");
 $(".textmlservices1theme5").removeAttr("contenteditable");
  $(".editmlservices1theme5").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmlservices1theme6" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme6").hasClass("editable")) {
    $(".editmlservices1theme6").hide();

   } 
   else
   {
    $(".editmlservices1theme6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme6").hide();

});

 $(".editmlservices1theme6").click(function() {
  $(this).hide();
  $(".boxmlservices1theme6").addClass("editable");
  $(".textmlservices1theme6").attr("contenteditable", "true");
   $(".editmlservices1theme6").hide();
  $(".savemlservices1theme6").show();
 
});

$(".savemlservices1theme6").click(function() {
  $(this).hide();
  $(".boxmlservices1theme6").removeClass("editable");
 $(".textmlservices1theme6").removeAttr("contenteditable");
  $(".editmlservices1theme6").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlservices1theme7" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme7").hasClass("editable")) {
    $(".editmlservices1theme7").hide();

   } 
   else
   {
    $(".editmlservices1theme7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme7").hide();

});

 $(".editmlservices1theme7").click(function() {
  $(this).hide();
  $(".boxmlservices1theme7").addClass("editable");
  $(".textmlservices1theme7").attr("contenteditable", "true");
   $(".editmlservices1theme7").hide();
  $(".savemlservices1theme7").show();
 
});

$(".savemlservices1theme7").click(function() {
  $(this).hide();
  $(".boxmlservices1theme7").removeClass("editable");
 $(".textmlservices1theme7").removeAttr("contenteditable");
  $(".editmlservices1theme7").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

   $(".imageUploadmlservices1theme8").hide();

$( ".boxmlservices1theme8" )
 .on("mouseenter", function() {
   if ($(".boxmlservices1theme8").hasClass("editable")) {
    $(".editmlservices1theme8").hide();

   } 
   else
   {
    $(".editmlservices1theme8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservices1theme8").hide();

});

 $(".editmlservices1theme8").click(function() {
  $(this).hide();
  $(".boxmlservices1theme8").addClass("editable");
   $(".editmlservices1theme8").hide();
  $(".savemlservices1theme8").show();
  $(".imageUploadmlservices1theme8").show();
});

$(".savemlservices1theme8").click(function() {
  $(this).hide();
  $(".boxmlservices1theme8").removeClass("editable");
 
  $(".editmlservices1theme8").hide();
  $(".imageUploadmlservices1theme8").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlservices1theme8").change(function() {
$("#imageUploadmlservices1theme8").attr("name", "imageUploadmlservices1theme8");
    readURLms8(this);
});

});
function readURLms8(input) {
var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlservices1theme8", "imageUploadmlservices1theme8",".mlservicechangeclass");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('.mlservicechangeclass').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}
$(document).ready(function(){
  $(".boxmlservicetheme1").removeClass("editable");
  $(".contpresentationcolor").hide(); 

$( ".boxmlservicetheme1" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme1").hasClass("editable")) {
    $(".editmlservicetheme1").hide();
    $(".editpresentationcolor").hide();

   } 
   else
   {
    $(".editmlservicetheme1").show();
    $(".editpresentationcolor").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme1").hide();
   $(".editpresentationcolor").hide();
});

 $(".editmlservicetheme1").click(function() {
  $(this).hide();
  $(".boxmlservicetheme1").addClass("editable");
  $(".textmlservicetheme1").attr("contenteditable", "true");
   $(".editmlservicetheme1").hide();
  $(".savemlservicetheme1").show();
 
});

  $(".editpresentationcolor").click(function() {
    $(".boxmlservicetheme1").addClass("editable");
  $(".editpresentationcolor").hide();
  $(".contpresentationcolor").show(); 

 
});

  $(".submitpresentationcolor").click(function() {
  
  $(".contpresentationcolor").hide();
   $(".boxmlservicetheme1").removeClass("editable");
addpresentationcolor();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});

$(".savemlservicetheme1").click(function() {
  $(this).hide();
  $(".boxmlservicetheme1").removeClass("editable");
 $(".textmlservicetheme1").removeAttr("contenteditable");
  $(".editmlservicetheme1").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});

function addpresentationcolor() {
var inputpresentationcolor = $('.inputpresentationcolor').val();
  $('.presentation').css("background",inputpresentationcolor);
}




$(document).ready(function(){

  $(".contpur").hide(); 

$( ".boxmlservicetheme2" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme2").hasClass("editable")) {
    $(".editmlservicetheme2").hide();
    $(".editcontpur").hide();
   } 
   else
   {
    $(".editmlservicetheme2").show();
    $(".editcontpur").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme2").hide();
   $(".editcontpur").hide();

});

 $(".editmlservicetheme2").click(function() {
  $(this).hide();
  $(".boxmlservicetheme2").addClass("editable");
  $(".textmlservicetheme2").attr("contenteditable", "true");
   $(".editmlservicetheme2").hide();
  $(".savemlservicetheme2").show();
 
});

$(".savemlservicetheme2").click(function() {
  $(this).hide();
  $(".boxmlservicetheme2").removeClass("editable");
 $(".textmlservicetheme2").removeAttr("contenteditable");
  $(".editmlservicetheme2").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});


 $(".editcontpur").click(function() {
   $(".boxmlservicetheme2").addClass("editable");
  $(this).hide();
  $(".contpur").show(); 
 
});

  $(".submitcontpur").click(function() {
  
  $(".contpur").hide();
   $(".boxmlservicetheme2").removeClass("editable");
addfontawesomecontpur();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addfontawesomecontpur() {
var inputcontpur = $('.inputcontpur').val();
 $('#pur').removeClass();
  $('#pur').addClass(inputcontpur);
  if(inputcontpur == "")
  {
    $('.service-icon1').css('font-size','0px');
  }
  else
  {
    $('.service-icon1').css('font-size','90px');
  }
}


$(document).ready(function(){

   $(".contpur2").hide(); 

$( ".boxmlservicetheme3" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme3").hasClass("editable")) {
    $(".editmlservicetheme3").hide();
    $(".editcontpur2").hide();

   } 
   else
   {
    $(".editmlservicetheme3").show();
    $(".editcontpur2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme3").hide();
  $(".editcontpur2").hide();
});

 $(".editmlservicetheme3").click(function() {
  $(this).hide();
  $(".boxmlservicetheme3").addClass("editable");
  $(".textmlservicetheme3").attr("contenteditable", "true");
   $(".editmlservicetheme3").hide();
  $(".savemlservicetheme3").show();
 
});

$(".savemlservicetheme3").click(function() {
  $(this).hide();
  $(".boxmlservicetheme3").removeClass("editable");
 $(".textmlservicetheme3").removeAttr("contenteditable");
  $(".editmlservicetheme3").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});

$(".editcontpur2").click(function() {
   $(".boxmlservicetheme3").addClass("editable");
  $(this).hide();
  $(".contpur2").show(); 
 
});

  $(".submitcontpur2").click(function() {
  
  $(".contpur2").hide();
  $(".boxmlservicetheme3").removeClass("editable");
addfontawesomecontpur2();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addfontawesomecontpur2() {
var inputcontpur2 = $('.inputcontpur2').val();
 $('#pur2').removeClass();
  $('#pur2').addClass(inputcontpur2);
  if(inputcontpur2 == "")
  {
    $('.service-icon2').css('font-size','0px');
  }
  else
  {
    $('.service-icon2').css('font-size','90px');
  }
}


$(document).ready(function(){

  $(".contpur3").hide(); 

$( ".boxmlservicetheme4" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme4").hasClass("editable")) {
    $(".editmlservicetheme4").hide();
    $(".editcontpur3").hide();
   } 
   else
   {
    $(".editmlservicetheme4").show();
    $(".editcontpur3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme4").hide();
  $(".editcontpur3").hide();

});

 $(".editmlservicetheme4").click(function() {
  $(this).hide();
  $(".boxmlservicetheme4").addClass("editable");
  $(".textmlservicetheme4").attr("contenteditable", "true");
   $(".editmlservicetheme4").hide();
  $(".savemlservicetheme4").show();
 
});

$(".savemlservicetheme4").click(function() {
  $(this).hide();
  $(".boxmlservicetheme4").removeClass("editable");
 $(".textmlservicetheme4").removeAttr("contenteditable");
  $(".editmlservicetheme4").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  });

$(".editcontpur3").click(function() {
   $(".boxmlservicetheme4").addClass("editable");
  $(this).hide();
  $(".contpur3").show(); 
 
});

  $(".submitcontpur3").click(function() {
  
  $(".contpur3").hide();
  $(".boxmlservicetheme4").removeClass("editable");
addfontawesomecontpur3();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addfontawesomecontpur3() {
var inputcontpur3 = $('.inputcontpur3').val();
 $('#cur').removeClass();
  $('#cur').addClass(inputcontpur3);
  if(inputcontpur3 == "")
  {
    $('.service-icon3').css('font-size','0px');
  }
  else
  {
    $('.service-icon3').css('font-size','90px');
  }
}





$(document).ready(function(){

   $(".contpur4").hide(); 

$( ".boxmlservicetheme5" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme5").hasClass("editable")) {
    $(".editmlservicetheme5").hide();
     $(".editcontpur4").hide();
   } 
   else
   {
    $(".editmlservicetheme5").show();
    $(".editcontpur4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme5").hide();
  $(".editcontpur4").hide();
});

 $(".editmlservicetheme5").click(function() {
  $(this).hide();
  $(".boxmlservicetheme5").addClass("editable");
  $(".textmlservicetheme5").attr("contenteditable", "true");
   $(".editmlservicetheme5").hide();
  $(".savemlservicetheme5").show();
 
});

$(".savemlservicetheme5").click(function() {
  $(this).hide();
  $(".boxmlservicetheme5").removeClass("editable");
 $(".textmlservicetheme5").removeAttr("contenteditable");
  $(".editmlservicetheme5").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
$(".editcontpur4").click(function() {
   $(".boxmlservicetheme5").addClass("editable");
  $(this).hide();
  $(".contpur4").show(); 
 
});

  $(".submitcontpur4").click(function() {
  
  $(".contpur4").hide();
  $(".boxmlservicetheme5").removeClass("editable");
addfontawesomecontpur4();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addfontawesomecontpur4() {
var inputcontpur4 = $('.inputcontpur4').val();
 $('#src').removeClass();
  $('#src').addClass(inputcontpur4);
  if(inputcontpur4 == "")
  {
    $('.service-icon4').css('font-size','0px');
  }
  else
  {
    $('.service-icon4').css('font-size','90px');
  }
}

$(document).ready(function(){

  $(".contpur5").hide();

$( ".boxmlservicetheme5a" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme5a").hasClass("editable")) {
    $(".editmlservicetheme5a").hide();
    $(".editcontpur5").hide();
   } 
   else
   {
    $(".editmlservicetheme5a").show();
    $(".editcontpur5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme5a").hide();
  $(".editcontpur5").hide();

});

 $(".editmlservicetheme5a").click(function() {
  $(this).hide();
  $(".boxmlservicetheme5a").addClass("editable");
  $(".textmlservicetheme5a").attr("contenteditable", "true");
   $(".editmlservicetheme5a").hide();
  $(".savemlservicetheme5a").show();
 
});

$(".savemlservicetheme5a").click(function() {
  $(this).hide();
  $(".boxmlservicetheme5a").removeClass("editable");
 $(".textmlservicetheme5a").removeAttr("contenteditable");
  $(".editmlservicetheme5a").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
$(".editcontpur5").click(function() {
   $(".boxmlservicetheme5a").addClass("editable");
  $(this).hide();
  $(".contpur5").show(); 
 
});

  $(".submitcontpur5").click(function() {
  
  $(".contpur5").hide();
  $(".boxmlservicetheme5a").removeClass("editable");
addfontawesomecontpur5();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addfontawesomecontpur5() {
var inputcontpur5 = $('.inputcontpur5').val();
 $('#sec').removeClass();
  $('#sec').addClass(inputcontpur5);
  if(inputcontpur5 == "")
  {
    $('.service-icon5').css('font-size','0px');
  }
  else
  {
    $('.service-icon5').css('font-size','90px');
  }
}



$(document).ready(function(){

   $(".contpur6").hide();

$( ".boxmlservicetheme6" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme6").hasClass("editable")) {
    $(".editmlservicetheme6").hide();
    $(".editcontpur6").hide();

   } 
   else
   {
    $(".editmlservicetheme6").show();
    $(".editcontpur6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme6").hide();
  $(".editcontpur6").hide();

});

 $(".editmlservicetheme6").click(function() {
  $(this).hide();
  $(".boxmlservicetheme6").addClass("editable");
  $(".textmlservicetheme6").attr("contenteditable", "true");
   $(".editmlservicetheme6").hide();
  $(".savemlservicetheme6").show();
 
});

$(".savemlservicetheme6").click(function() {
  $(this).hide();
  $(".boxmlservicetheme6").removeClass("editable");
 $(".textmlservicetheme6").removeAttr("contenteditable");
  $(".editmlservicetheme6").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
$(".editcontpur6").click(function() {
   $(".boxmlservicetheme6").addClass("editable");
  $(this).hide();
  $(".contpur6").show(); 
 
});

  $(".submitcontpur6").click(function() {
  
  $(".contpur6").hide();
  $(".boxmlservicetheme6").removeClass("editable");
addfontawesomecontpur6();
 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});

function addfontawesomecontpur6() {
var inputcontpur6 = $('.inputcontpur6').val();
 $('#doc').removeClass();
  $('#doc').addClass(inputcontpur6);
  if(inputcontpur6 == "")
  {
    $('.service-icon6').css('font-size','0px');
  }
  else
  {
    $('.service-icon6').css('font-size','90px');
  }
}



$(document).ready(function(){

   $(".contpur7").hide();

$( ".boxmlservicetheme7" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme7").hasClass("editable")) {
    $(".editmlservicetheme7").hide();
     $(".editcontpur7").hide();
   } 
   else
   {
    $(".editmlservicetheme7").show();
     $(".editcontpur7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme7").hide();
   $(".editcontpur7").hide();

});

 $(".editmlservicetheme7").click(function() {
  $(this).hide();
  $(".boxmlservicetheme7").addClass("editable");
  $(".textmlservicetheme7").attr("contenteditable", "true");
   $(".editmlservicetheme7").hide();
  $(".savemlservicetheme7").show();
 
});

$(".savemlservicetheme7").click(function() {
  $(this).hide();
  $(".boxmlservicetheme7").removeClass("editable");
 $(".textmlservicetheme7").removeAttr("contenteditable");
  $(".editmlservicetheme7").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
$(".editcontpur7").click(function() {
   $(".boxmlservicetheme7").addClass("editable");
  $(this).hide();
  $(".contpur7").show(); 
 
});

  $(".submitcontpur7").click(function() {
  
  $(".contpur7").hide();
  $(".boxmlservicetheme7").removeClass("editable");
addfontawesomecontpur7();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addfontawesomecontpur7() {
var inputcontpur7 = $('.inputcontpur7').val();
 $('#hist').removeClass();
  $('#hist').addClass(inputcontpur7);
  if(inputcontpur7 == "")
  {
    $('.service-icon7').css('font-size','0px');
  }
  else
  {
    $('.service-icon7').css('font-size','90px');
  }
}




$(document).ready(function(){

   $(".contpur8").hide();

$( ".boxmlservicetheme7a" )
 .on("mouseenter", function() {
   if ($(".boxmlservicetheme7a").hasClass("editable")) {
    $(".editmlservicetheme7a").hide();
     $(".editcontpur8").hide();
   } 
   else
   {
    $(".editmlservicetheme7a").show();
     $(".editcontpur8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlservicetheme7a").hide();
   $(".editcontpur8").hide();

});

 $(".editmlservicetheme7a").click(function() {
  $(this).hide();
  $(".boxmlservicetheme7a").addClass("editable");
  $(".textmlservicetheme7a").attr("contenteditable", "true");
   $(".editmlservicetheme7a").hide();
  $(".savemlservicetheme7a").show();
 
});

$(".savemlservicetheme7a").click(function() {
  $(this).hide();
  $(".boxmlservicetheme7a").removeClass("editable");
 $(".textmlservicetheme7a").removeAttr("contenteditable");
  $(".editmlservicetheme7a").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
  
});
$(".editcontpur8").click(function() {
   $(".boxmlservicetheme8").addClass("editable");
  $(this).hide();
  $(".contpur8").show(); 
 
});

  $(".submitcontpur8").click(function() {
  
  $(".contpur8").hide();
  $(".boxmlservicetheme8").removeClass("editable");
addfontawesomecontpur8();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addfontawesomecontpur8() {
var inputcontpur8 = $('.inputcontpur8').val();
 $('#pow').removeClass();
  $('#pow').addClass(inputcontpur8);
  if(inputcontpur8 == "")
  {
    $('.service-icon8').css('font-size','0px');
  }
  else
  {
    $('.service-icon8').css('font-size','90px');
  }
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone1").hide();

$( ".boxmmultithemeone1" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone1").hasClass("editable")) {
    $(".editmmultithemeone1").hide();

   } 
   else
   {
    $(".editmmultithemeone1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone1").hide();

});

 $(".editmmultithemeone1").click(function() {
  $(this).hide();
  $(".boxmmultithemeone1").addClass("editable");
   $(".editmmultithemeone1").hide();
  $(".savemmultithemeone1").show();
  $(".imageUploadmmultithemeone1").show();
});

$(".savemmultithemeone1").click(function() {
  $(this).hide();
  $(".boxmmultithemeone1").removeClass("editable");
 
  $(".editmmultithemeone1").hide();
  $(".imageUploadmmultithemeone1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone1").change(function() {
$("#imageUploadmmultithemeone1").attr("name", "imageUploadmmultithemeone1");
    readURLmmulti1(this);
});

});
function readURLmmulti1(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone1", "imageUploadmmultithemeone1","#imagePreviewmmultithemeone1");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone2").hide();

$( ".boxmmultithemeone2" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone2").hasClass("editable")) {
    $(".editmmultithemeone2").hide();

   } 
   else
   {
    $(".editmmultithemeone2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone2").hide();

});

 $(".editmmultithemeone2").click(function() {
  $(this).hide();
  $(".boxmmultithemeone2").addClass("editable");
   $(".editmmultithemeone2").hide();
  $(".savemmultithemeone2").show();
  $(".imageUploadmmultithemeone2").show();
});

$(".savemmultithemeone2").click(function() {
  $(this).hide();
  $(".boxmmultithemeone2").removeClass("editable");
 
  $(".editmmultithemeone2").hide();
  $(".imageUploadmmultithemeone2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone2").change(function() {
$("#imageUploadmmultithemeone2").attr("name", "imageUploadmmultithemeone2");
    readURLmmulti2(this);
});

});
function readURLmmulti2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone2", "imageUploadmmultithemeone2","#imagePreviewmmultithemeone2");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

  

$( ".boxmmultithemeone3" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone3").hasClass("editable")) {
    $(".editmmultithemeone3").hide();

   } 
   else
   {
    $(".editmmultithemeone3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone3").hide();

});

 $(".editmmultithemeone3").click(function() {
  $(this).hide();
  $(".boxmmultithemeone3").addClass("editable");
  $(".textmmultithemeone3").attr("contenteditable", "true");
   $(".editmmultithemeone3").hide();
  $(".savemmultithemeone3").show();
 
});

$(".savemmultithemeone3").click(function() {
  $(this).hide();
  $(".boxmmultithemeone3").removeClass("editable");
 $(".textmmultithemeone3").removeAttr("contenteditable");
  $(".editmmultithemeone3").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmmultithemeone4" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone4").hasClass("editable")) {
    $(".editmmultithemeone4").hide();

   } 
   else
   {
    $(".editmmultithemeone4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone4").hide();

});

 $(".editmmultithemeone4").click(function() {
  $(this).hide();
  $(".boxmmultithemeone4").addClass("editable");
  $(".textmmultithemeone4").attr("contenteditable", "true");
   $(".editmmultithemeone4").hide();
  $(".savemmultithemeone4").show();
 
});

$(".savemmultithemeone4").click(function() {
  $(this).hide();
  $(".boxmmultithemeone4").removeClass("editable");
 $(".textmmultithemeone4").removeAttr("contenteditable");
  $(".editmmultithemeone4").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

   $(".imageUploadmmultithemeone5").hide();

$( ".boxmmultithemeone5" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone5").hasClass("editable")) {
    $(".editmmultithemeone5").hide();

   } 
   else
   {
    $(".editmmultithemeone5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone5").hide();

});

 $(".editmmultithemeone5").click(function() {
  $(this).hide();
  $(".boxmmultithemeone5").addClass("editable");
   $(".editmmultithemeone5").hide();
  $(".savemmultithemeone5").show();
  $(".imageUploadmmultithemeone5").show();
});

$(".savemmultithemeone5").click(function() {
  $(this).hide();
  $(".boxmmultithemeone5").removeClass("editable");
 
  $(".editmmultithemeone5").hide();
  $(".imageUploadmmultithemeone5").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone5").change(function() {
$("#imageUploadmmultithemeone5").attr("name", "imageUploadmmultithemeone5");
    readURLmmulti5(this);
});

});
function readURLmmulti5(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone5", "imageUploadmmultithemeone5","#imageUploadmmultithemeone5");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

  

$( ".boxmmultithemeone6" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone6").hasClass("editable")) {
    $(".editmmultithemeone6").hide();

   } 
   else
   {
    $(".editmmultithemeone6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone6").hide();

});

 $(".editmmultithemeone6").click(function() {
  $(this).hide();
  $(".boxmmultithemeone6").addClass("editable");
  $(".textmmultithemeone6").attr("contenteditable", "true");
   $(".editmmultithemeone6").hide();
  $(".savemmultithemeone6").show();
 
});

$(".savemmultithemeone6").click(function() {
  $(this).hide();
  $(".boxmmultithemeone6").removeClass("editable");
 $(".textmmultithemeone6").removeAttr("contenteditable");
  $(".editmmultithemeone6").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

   $(".imageUploadmmultithemeone7").hide();

$( ".boxmmultithemeone7" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone7").hasClass("editable")) {
    $(".editmmultithemeone7").hide();

   } 
   else
   {
    $(".editmmultithemeone7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone7").hide();

});

 $(".editmmultithemeone7").click(function() {
  $(this).hide();
  $(".boxmmultithemeone7").addClass("editable");
   $(".editmmultithemeone7").hide();
  $(".savemmultithemeone7").show();
  $(".imageUploadmmultithemeone7").show();
});

$(".savemmultithemeone7").click(function() {
  $(this).hide();
  $(".boxmmultithemeone7").removeClass("editable");
 
  $(".editmmultithemeone7").hide();
  $(".imageUploadmmultithemeone7").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone7").change(function() {
$("#imageUploadmmultithemeone7").attr("name", "imageUploadmmultithemeone7");
    readURLmmulti7(this);
});

});
function readURLmmulti7(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone7", "imageUploadmmultithemeone7","#imagePreviewmmultithemeone7");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

  

$( ".boxmmultithemeone8" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone8").hasClass("editable")) {
    $(".editmmultithemeone8").hide();

   } 
   else
   {
    $(".editmmultithemeone8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone8").hide();

});

 $(".editmmultithemeone8").click(function() {
  $(this).hide();
  $(".boxmmultithemeone8").addClass("editable");
  $(".textmmultithemeone8").attr("contenteditable", "true");
   $(".editmmultithemeone8").hide();
  $(".savemmultithemeone8").show();
 
});

$(".savemmultithemeone8").click(function() {
  $(this).hide();
  $(".boxmmultithemeone8").removeClass("editable");
 $(".textmmultithemeone8").removeAttr("contenteditable");
  $(".editmmultithemeone8").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});

$(document).ready(function(){

   $(".imageUploadmmultithemeone9").hide();

$( ".boxmmultithemeone9" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone9").hasClass("editable")) {
    $(".editmmultithemeone9").hide();

   } 
   else
   {
    $(".editmmultithemeone9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone9").hide();

});

 $(".editmmultithemeone9").click(function() {
  $(this).hide();
  $(".boxmmultithemeone9").addClass("editable");
   $(".editmmultithemeone9").hide();
  $(".savemmultithemeone9").show();
  $(".imageUploadmmultithemeone9").show();
});

$(".savemmultithemeone9").click(function() {
  $(this).hide();
  $(".boxmmultithemeone9").removeClass("editable");
 
  $(".editmmultithemeone9").hide();
  $(".imageUploadmmultithemeone9").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone9").change(function() {
$("#imageUploadmmultithemeone9").attr("name", "imageUploadmmultithemeone9");
    readURLmmulti9(this);
});

});
function readURLmmulti9(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone9", "imageUploadmmultithemeone9","#imagePreviewmmultithemeone9");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone9').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone10").hide();

$( ".boxmmultithemeone10" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone10").hasClass("editable")) {
    $(".editmmultithemeone10").hide();

   } 
   else
   {
    $(".editmmultithemeone10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone10").hide();

});

 $(".editmmultithemeone10").click(function() {
  $(this).hide();
  $(".boxmmultithemeone10").addClass("editable");
   $(".editmmultithemeone10").hide();
  $(".savemmultithemeone10").show();
  $(".imageUploadmmultithemeone10").show();
});

$(".savemmultithemeone10").click(function() {
  $(this).hide();
  $(".boxmmultithemeone10").removeClass("editable");
 
  $(".editmmultithemeone10").hide();
  $(".imageUploadmmultithemeone10").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone10").change(function() {
$("#imageUploadmlbannertheme2").attr("name", "imageUploadmlbannertheme2");
    readURLmmulti10(this);
});

});
function readURLmmulti10(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlbannertheme2", "imageUploadmlbannertheme2","#imagePreviewmmultithemeone10");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone10').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone11").hide();

$( ".boxmmultithemeone11" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone11").hasClass("editable")) {
    $(".editmmultithemeone11").hide();

   } 
   else
   {
    $(".editmmultithemeone11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone11").hide();

});

 $(".editmmultithemeone11").click(function() {
  $(this).hide();
  $(".boxmmultithemeone11").addClass("editable");
   $(".editmmultithemeone11").hide();
  $(".savemmultithemeone11").show();
  $(".imageUploadmmultithemeone11").show();
});

$(".savemmultithemeone11").click(function() {
  $(this).hide();
  $(".boxmmultithemeone11").removeClass("editable");
 
  $(".editmmultithemeone11").hide();
  $(".imageUploadmmultithemeone11").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone11").change(function() {
$("#imageUploadmmultithemeone11").attr("name", "imageUploadmmultithemeone11");
    readURLmmulti11(this);
});

});
function readURLmmulti11(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone11", "imageUploadmmultithemeone11","#imagePreviewmmultithemeone11");

  /*
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone11').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmmultithemeone12").hide();

$( ".boxmmultithemeone12" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone12").hasClass("editable")) {
    $(".editmmultithemeone12").hide();

   } 
   else
   {
    $(".editmmultithemeone12").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone12").hide();

});

 $(".editmmultithemeone12").click(function() {
  $(this).hide();
  $(".boxmmultithemeone12").addClass("editable");
   $(".editmmultithemeone12").hide();
  $(".savemmultithemeone12").show();
  $(".imageUploadmmultithemeone12").show();
});

$(".savemmultithemeone12").click(function() {
  $(this).hide();
  $(".boxmmultithemeone12").removeClass("editable");
 
  $(".editmmultithemeone12").hide();
  $(".imageUploadmmultithemeone12").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone12").change(function() {
$("#imageUploadmmultithemeone12").attr("name", "imageUploadmmultithemeone12");
    readURLmmulti12(this);
});

});
function readURLmmulti12(input) {
   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone12", "imageUploadmmultithemeone12","#imagePreviewmmultithemeone12");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone12').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

  

$( ".boxmmultithemeone13" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone13").hasClass("editable")) {
    $(".editmmultithemeone13").hide();

   } 
   else
   {
    $(".editmmultithemeone13").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone13").hide();

});

 $(".editmmultithemeone13").click(function() {
  $(this).hide();
  $(".boxmmultithemeone13").addClass("editable");
  $(".textmmultithemeone13").attr("contenteditable", "true");
   $(".editmmultithemeone13").hide();
  $(".savemmultithemeone13").show();
 
});

$(".savemmultithemeone13").click(function() {
  $(this).hide();
  $(".boxmmultithemeone13").removeClass("editable");
 $(".textmmultithemeone13").removeAttr("contenteditable");
  $(".editmmultithemeone13").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone14" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone14").hasClass("editable")) {
    $(".editmmultithemeone14").hide();

   } 
   else
   {
    $(".editmmultithemeone14").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone14").hide();

});

 $(".editmmultithemeone14").click(function() {
  $(this).hide();
  $(".boxmmultithemeone14").addClass("editable");
  $(".textmmultithemeone14").attr("contenteditable", "true");
   $(".editmmultithemeone14").hide();
  $(".savemmultithemeone14").show();
 
});

$(".savemmultithemeone14").click(function() {
  $(this).hide();
  $(".boxmmultithemeone14").removeClass("editable");
 $(".textmmultithemeone14").removeAttr("contenteditable");
  $(".editmmultithemeone14").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmmultithemeone15" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone15").hasClass("editable")) {
    $(".editmmultithemeone15").hide();

   } 
   else
   {
    $(".editmmultithemeone15").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone15").hide();

});

 $(".editmmultithemeone15").click(function() {
  $(this).hide();
  $(".boxmmultithemeone15").addClass("editable");
  $(".textmmultithemeone15").attr("contenteditable", "true");
   $(".editmmultithemeone15").hide();
  $(".savemmultithemeone15").show();
 
});

$(".savemmultithemeone15").click(function() {
  $(this).hide();
  $(".boxmmultithemeone15").removeClass("editable");
 $(".textmmultithemeone15").removeAttr("contenteditable");
  $(".editmmultithemeone15").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone16" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone16").hasClass("editable")) {
    $(".editmmultithemeone16").hide();

   } 
   else
   {
    $(".editmmultithemeone16").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone16").hide();

});

 $(".editmmultithemeone16").click(function() {
  $(this).hide();
  $(".boxmmultithemeone16").addClass("editable");
  $(".textmmultithemeone16").attr("contenteditable", "true");
   $(".editmmultithemeone16").hide();
  $(".savemmultithemeone16").show();
 
});

$(".savemmultithemeone16").click(function() {
  $(this).hide();
  $(".boxmmultithemeone16").removeClass("editable");
 $(".textmmultithemeone16").removeAttr("contenteditable");
  $(".editmmultithemeone16").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});



$(document).ready(function(){

  

$( ".boxmmultithemeone17" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone17").hasClass("editable")) {
    $(".editmmultithemeone17").hide();

   } 
   else
   {
    $(".editmmultithemeone17").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone17").hide();

});

 $(".editmmultithemeone17").click(function() {
  $(this).hide();
  $(".boxmmultithemeone17").addClass("editable");
  $(".textmmultithemeone17").attr("contenteditable", "true");
   $(".editmmultithemeone17").hide();
  $(".savemmultithemeone17").show();
 
});

$(".savemmultithemeone17").click(function() {
  $(this).hide();
  $(".boxmmultithemeone17").removeClass("editable");
 $(".textmmultithemeone17").removeAttr("contenteditable");
  $(".editmmultithemeone17").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone18" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone18").hasClass("editable")) {
    $(".editmmultithemeone18").hide();

   } 
   else
   {
    $(".editmmultithemeone18").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone18").hide();

});

 $(".editmmultithemeone18").click(function() {
  $(this).hide();
  $(".boxmmultithemeone18").addClass("editable");
  $(".textmmultithemeone18").attr("contenteditable", "true");
   $(".editmmultithemeone18").hide();
  $(".savemmultithemeone18").show();
 
});

$(".savemmultithemeone18").click(function() {
  $(this).hide();
  $(".boxmmultithemeone18").removeClass("editable");
 $(".textmmultithemeone18").removeAttr("contenteditable");
  $(".editmmultithemeone18").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone19" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone19").hasClass("editable")) {
    $(".editmmultithemeone19").hide();

   } 
   else
   {
    $(".editmmultithemeone19").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone19").hide();

});

 $(".editmmultithemeone19").click(function() {
  $(this).hide();
  $(".boxmmultithemeone19").addClass("editable");
  $(".textmmultithemeone19").attr("contenteditable", "true");
   $(".editmmultithemeone19").hide();
  $(".savemmultithemeone19").show();
 
});

$(".savemmultithemeone19").click(function() {
  $(this).hide();
  $(".boxmmultithemeone19").removeClass("editable");
 $(".textmmultithemeone19").removeAttr("contenteditable");
  $(".editmmultithemeone19").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone20" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone20").hasClass("editable")) {
    $(".editmmultithemeone20").hide();

   } 
   else
   {
    $(".editmmultithemeone20").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone20").hide();

});

 $(".editmmultithemeone20").click(function() {
  $(this).hide();
  $(".boxmmultithemeone20").addClass("editable");
  $(".textmmultithemeone20").attr("contenteditable", "true");
   $(".editmmultithemeone20").hide();
  $(".savemmultithemeone20").show();
 
});

$(".savemmultithemeone20").click(function() {
  $(this).hide();
  $(".boxmmultithemeone20").removeClass("editable");
 $(".textmmultithemeone20").removeAttr("contenteditable");
  $(".editmmultithemeone20").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone21" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone21").hasClass("editable")) {
    $(".editmmultithemeone21").hide();

   } 
   else
   {
    $(".editmmultithemeone21").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone21").hide();

});

 $(".editmmultithemeone21").click(function() {
  $(this).hide();
  $(".boxmmultithemeone21").addClass("editable");
  $(".textmmultithemeone21").attr("contenteditable", "true");
   $(".editmmultithemeone21").hide();
  $(".savemmultithemeone21").show();
 
});

$(".savemmultithemeone21").click(function() {
  $(this).hide();
  $(".boxmmultithemeone21").removeClass("editable");
 $(".textmmultithemeone21").removeAttr("contenteditable");
  $(".editmmultithemeone21").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone22" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone22").hasClass("editable")) {
    $(".editmmultithemeone22").hide();

   } 
   else
   {
    $(".editmmultithemeone22").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone22").hide();

});

 $(".editmmultithemeone22").click(function() {
  $(this).hide();
  $(".boxmmultithemeone22").addClass("editable");
  $(".textmmultithemeone22").attr("contenteditable", "true");
   $(".editmmultithemeone22").hide();
  $(".savemmultithemeone22").show();
 
});

$(".savemmultithemeone22").click(function() {
  $(this).hide();
  $(".boxmmultithemeone22").removeClass("editable");
 $(".textmmultithemeone22").removeAttr("contenteditable");
  $(".editmmultithemeone22").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone23" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone23").hasClass("editable")) {
    $(".editmmultithemeone23").hide();

   } 
   else
   {
    $(".editmmultithemeone23").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone23").hide();

});

 $(".editmmultithemeone23").click(function() {
  $(this).hide();
  $(".boxmmultithemeone23").addClass("editable");
  $(".textmmultithemeone23").attr("contenteditable", "true");
   $(".editmmultithemeone23").hide();
  $(".savemmultithemeone23").show();
 
});

$(".savemmultithemeone23").click(function() {
  $(this).hide();
  $(".boxmmultithemeone23").removeClass("editable");
 $(".textmmultithemeone23").removeAttr("contenteditable");
  $(".editmmultithemeone23").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

   $(".imageUploadmmultithemeone24").hide();

$( ".boxmmultithemeone24" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone24").hasClass("editable")) {
    $(".editmmultithemeone24").hide();

   } 
   else
   {
    $(".editmmultithemeone24").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone24").hide();

});

 $(".editmmultithemeone24").click(function() {
  $(this).hide();
  $(".boxmmultithemeone24").addClass("editable");
   $(".editmmultithemeone24").hide();
  $(".savemmultithemeone24").show();
  $(".imageUploadmmultithemeone24").show();
});

$(".savemmultithemeone24").click(function() {
  $(this).hide();
  $(".boxmmultithemeone24").removeClass("editable");
 
  $(".editmmultithemeone24").hide();
  $(".imageUploadmmultithemeone24").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone24").change(function() {
$("#imageUploadmmultithemeone24").attr("name", "imageUploadmmultithemeone24");
    readURLmmulti24(this);
});

});
function readURLmmulti24(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone24", "imageUploadmmultithemeone24","#imagePreviewmmultithemeone24");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone24').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone25").hide();

$( ".boxmmultithemeone25" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone25").hasClass("editable")) {
    $(".editmmultithemeone25").hide();

   } 
   else
   {
    $(".editmmultithemeone25").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone25").hide();

});

 $(".editmmultithemeone25").click(function() {
  $(this).hide();
  $(".boxmmultithemeone25").addClass("editable");
   $(".editmmultithemeone25").hide();
  $(".savemmultithemeone25").show();
  $(".imageUploadmmultithemeone25").show();
});

$(".savemmultithemeone25").click(function() {
  $(this).hide();
  $(".boxmmultithemeone25").removeClass("editable");
 
  $(".editmmultithemeone25").hide();
  $(".imageUploadmmultithemeone25").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone25").change(function() {
$("#imageUploadmmultithemeone25").attr("name", "imageUploadmmultithemeone25");
    readURLmmulti25(this);
});

});
function readURLmmulti25(input) {


  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone25", "imageUploadmmultithemeone25","#imagePreviewmmultithemeone25");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone25').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone26").hide();

$( ".boxmmultithemeone26" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone26").hasClass("editable")) {
    $(".editmmultithemeone26").hide();

   } 
   else
   {
    $(".editmmultithemeone26").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone26").hide();

});

 $(".editmmultithemeone26").click(function() {
  $(this).hide();
  $(".boxmmultithemeone26").addClass("editable");
   $(".editmmultithemeone26").hide();
  $(".savemmultithemeone26").show();
  $(".imageUploadmmultithemeone26").show();
});

$(".savemmultithemeone26").click(function() {
  $(this).hide();
  $(".boxmmultithemeone26").removeClass("editable");
 
  $(".editmmultithemeone26").hide();
  $(".imageUploadmmultithemeone26").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone26").change(function() {
$("#imageUploadmmultithemeone26").attr("name", "imageUploadmmultithemeone26");
    readURLmmulti26(this);
});

});
function readURLmmulti26(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone26", "imageUploadmmultithemeone26","#imagePreviewmmultithemeone26");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone26').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone27").hide();

$( ".boxmmultithemeone27" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone27").hasClass("editable")) {
    $(".editmmultithemeone27").hide();

   } 
   else
   {
    $(".editmmultithemeone27").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone27").hide();

});

 $(".editmmultithemeone27").click(function() {
  $(this).hide();
  $(".boxmmultithemeone27").addClass("editable");
   $(".editmmultithemeone27").hide();
  $(".savemmultithemeone27").show();
  $(".imageUploadmmultithemeone27").show();
});

$(".savemmultithemeone27").click(function() {
  $(this).hide();
  $(".boxmmultithemeone27").removeClass("editable");
 
  $(".editmmultithemeone27").hide();
  $(".imageUploadmmultithemeone27").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone27").change(function() {
$("#imageUploadmmultithemeone27").attr("name", "imageUploadmmultithemeone27");
    readURLmmulti27(this);
});

});
function readURLmmulti27(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone27", "imageUploadmmultithemeone27","#imagePreviewmmultithemeone27");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone27').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone28").hide();

$( ".boxmmultithemeone28" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone28").hasClass("editable")) {
    $(".editmmultithemeone28").hide();

   } 
   else
   {
    $(".editmmultithemeone28").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone28").hide();

});

 $(".editmmultithemeone28").click(function() {
  $(this).hide();
  $(".boxmmultithemeone28").addClass("editable");
   $(".editmmultithemeone28").hide();
  $(".savemmultithemeone28").show();
  $(".imageUploadmmultithemeone28").show();
});

$(".savemmultithemeone28").click(function() {
  $(this).hide();
  $(".boxmmultithemeone28").removeClass("editable");
 
  $(".editmmultithemeone28").hide();
  $(".imageUploadmmultithemeone28").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone28").change(function() {
$("#imageUploadmmultithemeone28").attr("name", "imageUploadmmultithemeone28");
    readURLmmulti28(this);
});

});
function readURLmmulti28(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone28", "imageUploadmmultithemeone28","#imagePreviewmmultithemeone28");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone28').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone29").hide();

$( ".boxmmultithemeone29" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone29").hasClass("editable")) {
    $(".editmmultithemeone29").hide();

   } 
   else
   {
    $(".editmmultithemeone29").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone29").hide();

});

 $(".editmmultithemeone29").click(function() {
  $(this).hide();
  $(".boxmmultithemeone29").addClass("editable");
   $(".editmmultithemeone29").hide();
  $(".savemmultithemeone29").show();
  $(".imageUploadmmultithemeone29").show();
});

$(".savemmultithemeone29").click(function() {
  $(this).hide();
  $(".boxmmultithemeone29").removeClass("editable");
 
  $(".editmmultithemeone29").hide();
  $(".imageUploadmmultithemeone29").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone29").change(function() {
$("#imageUploadmmultithemeone29").attr("name", "imageUploadmmultithemeone29");
    readURLmmulti29(this);
});

});
function readURLmmulti29(input) {

 var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone29", "imageUploadmmultithemeone29","#imagePreviewmmultithemeone29");
      
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone29').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

  

$( ".boxmmultithemeone30" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone30").hasClass("editable")) {
    $(".editmmultithemeone30").hide();

   } 
   else
   {
    $(".editmmultithemeone30").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone30").hide();

});

 $(".editmmultithemeone30").click(function() {
  $(this).hide();
  $(".boxmmultithemeone30").addClass("editable");
  $(".textmmultithemeone30").attr("contenteditable", "true");
   $(".editmmultithemeone30").hide();
  $(".savemmultithemeone30").show();
 
});

$(".savemmultithemeone30").click(function() {
  $(this).hide();
  $(".boxmmultithemeone30").removeClass("editable");
 $(".textmmultithemeone30").removeAttr("contenteditable");
  $(".editmmultithemeone30").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone31" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone31").hasClass("editable")) {
    $(".editmmultithemeone31").hide();

   } 
   else
   {
    $(".editmmultithemeone31").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone31").hide();

});

 $(".editmmultithemeone31").click(function() {
  $(this).hide();
  $(".boxmmultithemeone31").addClass("editable");
  $(".textmmultithemeone31").attr("contenteditable", "true");
   $(".editmmultithemeone31").hide();
  $(".savemmultithemeone31").show();
 
});

$(".savemmultithemeone31").click(function() {
  $(this).hide();
  $(".boxmmultithemeone31").removeClass("editable");
 $(".textmmultithemeone31").removeAttr("contenteditable");
  $(".editmmultithemeone31").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone32" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone32").hasClass("editable")) {
    $(".editmmultithemeone32").hide();

   } 
   else
   {
    $(".editmmultithemeone32").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone32").hide();

});

 $(".editmmultithemeone32").click(function() {
  $(this).hide();
  $(".boxmmultithemeone32").addClass("editable");
  $(".textmmultithemeone32").attr("contenteditable", "true");
   $(".editmmultithemeone32").hide();
  $(".savemmultithemeone32").show();
 
});

$(".savemmultithemeone32").click(function() {
  $(this).hide();
  $(".boxmmultithemeone32").removeClass("editable");
 $(".textmmultithemeone32").removeAttr("contenteditable");
  $(".editmmultithemeone32").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone33" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone33").hasClass("editable")) {
    $(".editmmultithemeone33").hide();

   } 
   else
   {
    $(".editmmultithemeone33").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone33").hide();

});

 $(".editmmultithemeone33").click(function() {
  $(this).hide();
  $(".boxmmultithemeone33").addClass("editable");
  $(".textmmultithemeone33").attr("contenteditable", "true");
   $(".editmmultithemeone33").hide();
  $(".savemmultithemeone33").show();
 
});

$(".savemmultithemeone33").click(function() {
  $(this).hide();
  $(".boxmmultithemeone33").removeClass("editable");
 $(".textmmultithemeone33").removeAttr("contenteditable");
  $(".editmmultithemeone33").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

   $(".imageUploadmmultithemeone34").hide();

$( ".boxmmultithemeone34" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone34").hasClass("editable")) {
    $(".editmmultithemeone34").hide();

   } 
   else
   {
    $(".editmmultithemeone34").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone34").hide();

});

 $(".editmmultithemeone34").click(function() {
  $(this).hide();
  $(".boxmmultithemeone34").addClass("editable");
   $(".editmmultithemeone34").hide();
  $(".savemmultithemeone34").show();
  $(".imageUploadmmultithemeone34").show();
});

$(".savemmultithemeone34").click(function() {
  $(this).hide();
  $(".boxmmultithemeone34").removeClass("editable");
 
  $(".editmmultithemeone34").hide();
  $(".imageUploadmmultithemeone34").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone34").change(function() {
$("#imageUploadmmultithemeone34").attr("name", "imageUploadmmultithemeone34");
    readURLmmulti34(this);
});

});
function readURLmmulti34(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone34", "imageUploadmmultithemeone34","#imagePreviewmmultithemeone34");
      

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone34').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone35").hide();

$( ".boxmmultithemeone35" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone35").hasClass("editable")) {
    $(".editmmultithemeone35").hide();

   } 
   else
   {
    $(".editmmultithemeone35").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone35").hide();

});

 $(".editmmultithemeone35").click(function() {
  $(this).hide();
  $(".boxmmultithemeone35").addClass("editable");
   $(".editmmultithemeone35").hide();
  $(".savemmultithemeone35").show();
  $(".imageUploadmmultithemeone35").show();
});

$(".savemmultithemeone35").click(function() {
  $(this).hide();
  $(".boxmmultithemeone35").removeClass("editable");
 
  $(".editmmultithemeone35").hide();
  $(".imageUploadmmultithemeone35").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone35").change(function() {
$("#imageUploadmmultithemeone35").attr("name", "imageUploadmmultithemeone35");
    readURLmmulti35(this);
});

});
function readURLmmulti35(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone35", "imageUploadmmultithemeone35","#imagePreviewmmultithemeone35");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone35').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone36").hide();

$( ".boxmmultithemeone36" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone36").hasClass("editable")) {
    $(".editmmultithemeone36").hide();

   } 
   else
   {
    $(".editmmultithemeone36").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone36").hide();

});

 $(".editmmultithemeone36").click(function() {
  $(this).hide();
  $(".boxmmultithemeone36").addClass("editable");
   $(".editmmultithemeone36").hide();
  $(".savemmultithemeone36").show();
  $(".imageUploadmmultithemeone36").show();
});

$(".savemmultithemeone36").click(function() {
  $(this).hide();
  $(".boxmmultithemeone36").removeClass("editable");
 
  $(".editmmultithemeone36").hide();
  $(".imageUploadmmultithemeone36").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone36").change(function() {
$("#imageUploadmmultithemeone36").attr("name", "imageUploadmmultithemeone36");
    readURLmmulti36(this);
});

});
function readURLmmulti36(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone36", "imageUploadmmultithemeone36","#imagePreviewmmultithemeone36");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone36').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

  

$( ".boxmmultithemeone37" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone37").hasClass("editable")) {
    $(".editmmultithemeone37").hide();

   } 
   else
   {
    $(".editmmultithemeone37").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone37").hide();

});

 $(".editmmultithemeone37").click(function() {
  $(this).hide();
  $(".boxmmultithemeone37").addClass("editable");
  $(".textmmultithemeone37").attr("contenteditable", "true");
   $(".editmmultithemeone37").hide();
  $(".savemmultithemeone37").show();
 
});

$(".savemmultithemeone37").click(function() {
  $(this).hide();
  $(".boxmmultithemeone37").removeClass("editable");
 $(".textmmultithemeone37").removeAttr("contenteditable");
  $(".editmmultithemeone37").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone38" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone38").hasClass("editable")) {
    $(".editmmultithemeone38").hide();

   } 
   else
   {
    $(".editmmultithemeone38").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone38").hide();

});

 $(".editmmultithemeone38").click(function() {
  $(this).hide();
  $(".boxmmultithemeone38").addClass("editable");
  $(".textmmultithemeone38").attr("contenteditable", "true");
   $(".editmmultithemeone38").hide();
  $(".savemmultithemeone38").show();
 
});

$(".savemmultithemeone38").click(function() {
  $(this).hide();
  $(".boxmmultithemeone38").removeClass("editable");
 $(".textmmultithemeone38").removeAttr("contenteditable");
  $(".editmmultithemeone38").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone39" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone39").hasClass("editable")) {
    $(".editmmultithemeone39").hide();

   } 
   else
   {
    $(".editmmultithemeone39").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone39").hide();

});

 $(".editmmultithemeone39").click(function() {
  $(this).hide();
  $(".boxmmultithemeone39").addClass("editable");
  $(".textmmultithemeone39").attr("contenteditable", "true");
   $(".editmmultithemeone39").hide();
  $(".savemmultithemeone39").show();
 
});

$(".savemmultithemeone39").click(function() {
  $(this).hide();
  $(".boxmmultithemeone39").removeClass("editable");
 $(".textmmultithemeone39").removeAttr("contenteditable");
  $(".editmmultithemeone39").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone40" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone40").hasClass("editable")) {
    $(".editmmultithemeone40").hide();

   } 
   else
   {
    $(".editmmultithemeone40").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone40").hide();

});

 $(".editmmultithemeone40").click(function() {
  $(this).hide();
  $(".boxmmultithemeone40").addClass("editable");
  $(".textmmultithemeone40").attr("contenteditable", "true");
   $(".editmmultithemeone40").hide();
  $(".savemmultithemeone40").show();
 
});

$(".savemmultithemeone40").click(function() {
  $(this).hide();
  $(".boxmmultithemeone40").removeClass("editable");
 $(".textmmultithemeone40").removeAttr("contenteditable");
  $(".editmmultithemeone40").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone41" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone41").hasClass("editable")) {
    $(".editmmultithemeone41").hide();

   } 
   else
   {
    $(".editmmultithemeone41").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone41").hide();

});

 $(".editmmultithemeone41").click(function() {
  $(this).hide();
  $(".boxmmultithemeone41").addClass("editable");
  $(".textmmultithemeone41").attr("contenteditable", "true");
   $(".editmmultithemeone41").hide();
  $(".savemmultithemeone41").show();
 
});

$(".savemmultithemeone41").click(function() {
  $(this).hide();
  $(".boxmmultithemeone41").removeClass("editable");
 $(".textmmultithemeone41").removeAttr("contenteditable");
  $(".editmmultithemeone41").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone42" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone42").hasClass("editable")) {
    $(".editmmultithemeone42").hide();

   } 
   else
   {
    $(".editmmultithemeone42").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone42").hide();

});

 $(".editmmultithemeone42").click(function() {
  $(this).hide();
  $(".boxmmultithemeone42").addClass("editable");
  $(".textmmultithemeone42").attr("contenteditable", "true");
   $(".editmmultithemeone42").hide();
  $(".savemmultithemeone42").show();
 
});

$(".savemmultithemeone42").click(function() {
  $(this).hide();
  $(".boxmmultithemeone42").removeClass("editable");
 $(".textmmultithemeone42").removeAttr("contenteditable");
  $(".editmmultithemeone42").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone43" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone43").hasClass("editable")) {
    $(".editmmultithemeone43").hide();

   } 
   else
   {
    $(".editmmultithemeone43").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone43").hide();

});

 $(".editmmultithemeone43").click(function() {
  $(this).hide();
  $(".boxmmultithemeone43").addClass("editable");
  $(".textmmultithemeone43").attr("contenteditable", "true");
   $(".editmmultithemeone43").hide();
  $(".savemmultithemeone43").show();
 
});

$(".savemmultithemeone43").click(function() {
  $(this).hide();
  $(".boxmmultithemeone43").removeClass("editable");
 $(".textmmultithemeone43").removeAttr("contenteditable");
  $(".editmmultithemeone43").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone44" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone44").hasClass("editable")) {
    $(".editmmultithemeone44").hide();

   } 
   else
   {
    $(".editmmultithemeone44").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone44").hide();

});

 $(".editmmultithemeone44").click(function() {
  $(this).hide();
  $(".boxmmultithemeone44").addClass("editable");
  $(".textmmultithemeone44").attr("contenteditable", "true");
   $(".editmmultithemeone44").hide();
  $(".savemmultithemeone44").show();
 
});

$(".savemmultithemeone44").click(function() {
  $(this).hide();
  $(".boxmmultithemeone44").removeClass("editable");
 $(".textmmultithemeone44").removeAttr("contenteditable");
  $(".editmmultithemeone44").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone45" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone45").hasClass("editable")) {
    $(".editmmultithemeone45").hide();

   } 
   else
   {
    $(".editmmultithemeone45").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone45").hide();

});

 $(".editmmultithemeone45").click(function() {
  $(this).hide();
  $(".boxmmultithemeone45").addClass("editable");
  $(".textmmultithemeone45").attr("contenteditable", "true");
   $(".editmmultithemeone45").hide();
  $(".savemmultithemeone45").show();
 
});

$(".savemmultithemeone45").click(function() {
  $(this).hide();
  $(".boxmmultithemeone45").removeClass("editable");
 $(".textmmultithemeone45").removeAttr("contenteditable");
  $(".editmmultithemeone45").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmmultithemeone46" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone46").hasClass("editable")) {
    $(".editmmultithemeone46").hide();

   } 
   else
   {
    $(".editmmultithemeone46").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone46").hide();

});

 $(".editmmultithemeone46").click(function() {
  $(this).hide();
  $(".boxmmultithemeone46").addClass("editable");
  $(".textmmultithemeone46").attr("contenteditable", "true");
   $(".editmmultithemeone46").hide();
  $(".savemmultithemeone46").show();
 
});

$(".savemmultithemeone46").click(function() {
  $(this).hide();
  $(".boxmmultithemeone46").removeClass("editable");
 $(".textmmultithemeone46").removeAttr("contenteditable");
  $(".editmmultithemeone46").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});



$(document).ready(function(){

   $(".imageUploadmmultithemeone47").hide();

$( ".boxmmultithemeone47" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone47").hasClass("editable")) {
    $(".editmmultithemeone47").hide();

   } 
   else
   {
    $(".editmmultithemeone47").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone47").hide();

});

 $(".editmmultithemeone47").click(function() {
  $(this).hide();
  $(".boxmmultithemeone47").addClass("editable");
   $(".editmmultithemeone47").hide();
  $(".savemmultithemeone47").show();
  $(".imageUploadmmultithemeone47").show();
});

$(".savemmultithemeone47").click(function() {
  $(this).hide();
  $(".boxmmultithemeone47").removeClass("editable");
 
  $(".editmmultithemeone47").hide();
  $(".imageUploadmmultithemeone47").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone47").change(function() {
$("#imageUploadmmultithemeone47").attr("name", "imageUploadmmultithemeone47");
    readURLmmulti47(this);
});

});
function readURLmmulti47(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone47", "imageUploadmmultithemeone47","#imagePreviewmmultithemeone47");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone47').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone48").hide();

$( ".boxmmultithemeone48" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone48").hasClass("editable")) {
    $(".editmmultithemeone48").hide();

   } 
   else
   {
    $(".editmmultithemeone48").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone48").hide();

});

 $(".editmmultithemeone48").click(function() {
  $(this).hide();
  $(".boxmmultithemeone48").addClass("editable");
   $(".editmmultithemeone48").hide();
  $(".savemmultithemeone48").show();
  $(".imageUploadmmultithemeone48").show();
});

$(".savemmultithemeone48").click(function() {
  $(this).hide();
  $(".boxmmultithemeone48").removeClass("editable");
 
  $(".editmmultithemeone48").hide();
  $(".imageUploadmmultithemeone48").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone48").change(function() {
$("#imageUploadmmultithemeone48").attr("name", "imageUploadmmultithemeone48");
    readURLmmulti48(this);
});

});
function readURLmmulti48(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone48", "imageUploadmmultithemeone48","#imagePreviewmmultithemeone48");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone48').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone49").hide();

$( ".boxmmultithemeone49" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone49").hasClass("editable")) {
    $(".editmmultithemeone49").hide();

   } 
   else
   {
    $(".editmmultithemeone49").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone49").hide();

});

 $(".editmmultithemeone49").click(function() {
  $(this).hide();
  $(".boxmmultithemeone49").addClass("editable");
   $(".editmmultithemeone49").hide();
  $(".savemmultithemeone49").show();
  $(".imageUploadmmultithemeone49").show();
});

$(".savemmultithemeone49").click(function() {
  $(this).hide();
  $(".boxmmultithemeone49").removeClass("editable");
 
  $(".editmmultithemeone49").hide();
  $(".imageUploadmmultithemeone49").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone49").change(function() {
$("#imageUploadmmultithemeone49").attr("name", "imageUploadmmultithemeone49");
    readURLmmulti49(this);
});

});
function readURLmmulti49(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone49", "imageUploadmmultithemeone49","#imagePreviewmmultithemeone49");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone49').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone50").hide();

$( ".boxmmultithemeone50" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone50").hasClass("editable")) {
    $(".editmmultithemeone50").hide();

   } 
   else
   {
    $(".editmmultithemeone50").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone50").hide();

});

 $(".editmmultithemeone50").click(function() {
  $(this).hide();
  $(".boxmmultithemeone50").addClass("editable");
   $(".editmmultithemeone50").hide();
  $(".savemmultithemeone50").show();
  $(".imageUploadmmultithemeone50").show();
});

$(".savemmultithemeone50").click(function() {
  $(this).hide();
  $(".boxmmultithemeone50").removeClass("editable");
 
  $(".editmmultithemeone50").hide();
  $(".imageUploadmmultithemeone50").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone50").change(function() {
$("#imageUploadmmultithemeone50").attr("name", "imageUploadmmultithemeone50");
    readURLmmulti50(this);
});

});
function readURLmmulti50(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone50", "imageUploadmmultithemeone50","#imagePreviewmmultithemeone50");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone50').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone51").hide();

$( ".boxmmultithemeone51" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone51").hasClass("editable")) {
    $(".editmmultithemeone51").hide();

   } 
   else
   {
    $(".editmmultithemeone51").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone51").hide();

});

 $(".editmmultithemeone51").click(function() {
  $(this).hide();
  $(".boxmmultithemeone51").addClass("editable");
   $(".editmmultithemeone51").hide();
  $(".savemmultithemeone51").show();
  $(".imageUploadmmultithemeone51").show();
});

$(".savemmultithemeone51").click(function() {
  $(this).hide();
  $(".boxmmultithemeone51").removeClass("editable");
 
  $(".editmmultithemeone51").hide();
  $(".imageUploadmmultithemeone51").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone51").change(function() {
$("#imageUploadmmultithemeone51").attr("name", "imageUploadmmultithemeone51");
    readURLmmulti51(this);
});

});
function readURLmmulti51(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone51", "imageUploadmmultithemeone51","#imagePreviewmmultithemeone51");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone51').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone52").hide();

$( ".boxmmultithemeone52" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone52").hasClass("editable")) {
    $(".editmmultithemeone52").hide();

   } 
   else
   {
    $(".editmmultithemeone52").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone52").hide();

});

 $(".editmmultithemeone52").click(function() {
  $(this).hide();
  $(".boxmmultithemeone52").addClass("editable");
   $(".editmmultithemeone52").hide();
  $(".savemmultithemeone52").show();
  $(".imageUploadmmultithemeone52").show();
});

$(".savemmultithemeone52").click(function() {
  $(this).hide();
  $(".boxmmultithemeone52").removeClass("editable");
 
  $(".editmmultithemeone52").hide();
  $(".imageUploadmmultithemeone52").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone52").change(function() {
$("#imageUploadmmultithemeone52").attr("name", "imageUploadmmultithemeone52");
    readURLmmulti52(this);
});

});
function readURLmmulti52(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone52", "imageUploadmmultithemeone52","#imagePreviewmmultithemeone52");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone52').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone53").hide();

$( ".boxmmultithemeone53" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone53").hasClass("editable")) {
    $(".editmmultithemeone53").hide();

   } 
   else
   {
    $(".editmmultithemeone53").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone53").hide();

});

 $(".editmmultithemeone53").click(function() {
  $(this).hide();
  $(".boxmmultithemeone53").addClass("editable");
   $(".editmmultithemeone53").hide();
  $(".savemmultithemeone53").show();
  $(".imageUploadmmultithemeone53").show();
});

$(".savemmultithemeone53").click(function() {
  $(this).hide();
  $(".boxmmultithemeone53").removeClass("editable");
 
  $(".editmmultithemeone53").hide();
  $(".imageUploadmmultithemeone53").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone53").change(function() {
$("#imageUploadmmultithemeone53").attr("name", "imageUploadmmultithemeone53");
    readURLmmulti53(this);
});

});
function readURLmmulti53(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone53", "imageUploadmmultithemeone53","#imagePreviewmmultithemeone53");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone53').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone54").hide();

$( ".boxmmultithemeone54" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone54").hasClass("editable")) {
    $(".editmmultithemeone54").hide();

   } 
   else
   {
    $(".editmmultithemeone54").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone54").hide();

});

 $(".editmmultithemeone54").click(function() {
  $(this).hide();
  $(".boxmmultithemeone54").addClass("editable");
   $(".editmmultithemeone54").hide();
  $(".savemmultithemeone54").show();
  $(".imageUploadmmultithemeone54").show();
});

$(".savemmultithemeone54").click(function() {
  $(this).hide();
  $(".boxmmultithemeone54").removeClass("editable");
 
  $(".editmmultithemeone54").hide();
  $(".imageUploadmmultithemeone54").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone54").change(function() {
$("#imageUploadmmultithemeone54").attr("name", "imageUploadmmultithemeone54");
    readURLmmulti54(this);
});

});
function readURLmmulti54(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone54", "imageUploadmmultithemeone54","#imagePreviewmmultithemeone54");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone54').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmmultithemeone55").hide();

$( ".boxmmultithemeone55" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone55").hasClass("editable")) {
    $(".editmmultithemeone55").hide();

   } 
   else
   {
    $(".editmmultithemeone55").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone55").hide();

});

 $(".editmmultithemeone55").click(function() {
  $(this).hide();
  $(".boxmmultithemeone55").addClass("editable");
   $(".editmmultithemeone55").hide();
  $(".savemmultithemeone55").show();
  $(".imageUploadmmultithemeone55").show();
});

$(".savemmultithemeone55").click(function() {
  $(this).hide();
  $(".boxmmultithemeone55").removeClass("editable");
 
  $(".editmmultithemeone55").hide();
  $(".imageUploadmmultithemeone55").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone55").change(function() {
$("#imageUploadmmultithemeone55").attr("name", "imageUploadmmultithemeone55");
    readURLmmulti55(this);
});

});
function readURLmmulti55(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmmultithemeone55", "imageUploadmmultithemeone55","#imagePreviewmmultithemeone55");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone55').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

  

$( ".boxmmultithemeone56" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone56").hasClass("editable")) {
    $(".editmmultithemeone56").hide();

   } 
   else
   {
    $(".editmmultithemeone56").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone56").hide();

});

 $(".editmmultithemeone56").click(function() {
  $(this).hide();
  $(".boxmmultithemeone56").addClass("editable");
  $(".textmmultithemeone56").attr("contenteditable", "true");
   $(".editmmultithemeone56").hide();
  $(".savemmultithemeone56").show();
 
});

$(".savemmultithemeone56").click(function() {
  $(this).hide();
  $(".boxmmultithemeone56").removeClass("editable");
 $(".textmmultithemeone56").removeAttr("contenteditable");
  $(".editmmultithemeone56").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

$( ".boxmmultithemeone57" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone57").hasClass("editable")) {
    $(".editmmultithemeone57").hide();

   } 
   else
   {
    $(".editmmultithemeone57").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone57").hide();

});

 $(".editmmultithemeone57").click(function() {
  $(this).hide();
  $(".boxmmultithemeone57").addClass("editable");
  $(".textmmultithemeone57").attr("contenteditable", "true");
   $(".editmmultithemeone57").hide();
  $(".savemmultithemeone57").show();
 
});

$(".savemmultithemeone57").click(function() {
  $(this).hide();
  $(".boxmmultithemeone57").removeClass("editable");
 $(".textmmultithemeone57").removeAttr("contenteditable");
  $(".editmmultithemeone57").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmmultithemeone58" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone58").hasClass("editable")) {
    $(".editmmultithemeone58").hide();

   } 
   else
   {
    $(".editmmultithemeone58").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone58").hide();

});

 $(".editmmultithemeone58").click(function() {
  $(this).hide();
  $(".boxmmultithemeone58").addClass("editable");
  $(".textmmultithemeone58").attr("contenteditable", "true");
   $(".editmmultithemeone58").hide();
  $(".savemmultithemeone58").show();
 
});

$(".savemmultithemeone58").click(function() {
  $(this).hide();
  $(".boxmmultithemeone58").removeClass("editable");
 $(".textmmultithemeone58").removeAttr("contenteditable");
  $(".editmmultithemeone58").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmmultithemeone59" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone59").hasClass("editable")) {
    $(".editmmultithemeone59").hide();

   } 
   else
   {
    $(".editmmultithemeone59").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone59").hide();

});

 $(".editmmultithemeone59").click(function() {
  $(this).hide();
  $(".boxmmultithemeone59").addClass("editable");
  $(".textmmultithemeone59").attr("contenteditable", "true");
   $(".editmmultithemeone59").hide();
  $(".savemmultithemeone59").show();
 
});

$(".savemmultithemeone59").click(function() {
  $(this).hide();
  $(".boxmmultithemeone59").removeClass("editable");
 $(".textmmultithemeone59").removeAttr("contenteditable");
  $(".editmmultithemeone59").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

   $(".imageUploadmmultithemeone60").hide();

$( ".boxmmultithemeone60" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone60").hasClass("editable")) {
    $(".editmmultithemeone60").hide();

   } 
   else
   {
    
   
    $(".editmmultithemeone60").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone60").hide();
 

});

 $(".editmmultithemeone60").click(function() {
  $(this).hide();
  $(".boxmmultithemeone60").addClass("editable");
   $(".editmmultithemeone60").hide();
  $(".savemmultithemeone60").show();
  $(".imageUploadmmultithemeone60").show();
});

$(".savemmultithemeone60").click(function() {
  $(this).hide();
  $(".boxmmultithemeone60").removeClass("editable");
 
  $(".editmmultithemeone60").hide();
  $(".imageUploadmmultithemeone60").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone60").change(function() {
$("#imageUploadmmultithemeone60").attr("name", "imageUploadmmultithemeone60");
    readURLmmulti60(this);
});

});
function readURLmmulti60(input) {
   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmmultithemeone60", "imageUploadmmultithemeone60",".mmultithemeone.demo-banner");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mmultithemeone.demo-banner').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmmultithemeone61").hide();

$( ".boxmmultithemeone61" )
 .on("mouseenter", function() {
   if ($(".boxmmultithemeone61").hasClass("editable")) {
    $(".editmmultithemeone61").hide();

   } 
   else
   {
    
   
    $(".editmmultithemeone61").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmmultithemeone61").hide();
 

});

 $(".editmmultithemeone61").click(function() {
  $(this).hide();
  $(".boxmmultithemeone61").addClass("editable");
   $(".editmmultithemeone61").hide();
  $(".savemmultithemeone61").show();
  $(".imageUploadmmultithemeone61").show();
});

$(".savemmultithemeone61").click(function() {
  $(this).hide();
  $(".boxmmultithemeone61").removeClass("editable");
 
  $(".editmmultithemeone61").hide();
  $(".imageUploadmmultithemeone61").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmmultithemeone61").change(function() {
$("#imageUploadmmultithemeone61").attr("name", "imageUploadmmultithemeone61");
    readURLmmulti61(this);
});

});
function readURLmmulti61(input) {

    var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmmultithemeone61", "imageUploadmmultithemeone61",".mmultithemeone.responsive_retina_support");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mmultithemeone.responsive_retina_support').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone1").hide();

$( ".boxmlthemeone1" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone1").hasClass("editable")) {
    $(".editmlthemeone1").hide();

   } 
   else
   {
    $(".editmlthemeone1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone1").hide();

});

 $(".editmlthemeone1").click(function() {
  $(this).hide();
  $(".boxmlthemeone1").addClass("editable");
   $(".editmlthemeone1").hide();
  $(".savemlthemeone1").show();
  $(".imageUploadmlthemeone1").show();
});

$(".savemlthemeone1").click(function() {
  $(this).hide();
  $(".boxmlthemeone1").removeClass("editable");
 
  $(".editmlthemeone1").hide();
  $(".imageUploadmlthemeone1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone1").change(function() {
$("#imageUploadmlthemeone1").attr("name", "imageUploadmlthemeone1");
    readURL1(this);
});

});
function readURL1(input) {
  
 var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone1", "imageUploadmlthemeone1","#imagePreviewmlthemeone1");
      
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmlthemeone2").hide();

$( ".boxmlthemeone2" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone2").hasClass("editable")) {
    $(".editmlthemeone2").hide();

   } 
   else
   {
    $(".editmlthemeone2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone2").hide();

});

 $(".editmlthemeone2").click(function() {
  $(this).hide();
  $(".boxmlthemeone2").addClass("editable");
   $(".editmlthemeone2").hide();
  $(".savemlthemeone2").show();
  $(".imageUploadmlthemeone2").show();
});

$(".savemlthemeone2").click(function() {
  $(this).hide();
  $(".boxmlthemeone2").removeClass("editable");
 
  $(".editmlthemeone2").hide();
  $(".imageUploadmlthemeone2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone2").change(function() {
$("#imageUploadmlthemeone2").attr("name", "imageUploadmlthemeone2");
    readURL2(this);
});

});
function readURL2(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone2", "imageUploadmlthemeone2","#imagePreviewmlthemeone2");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone3").hide();

$( ".boxmlthemeone3" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone3").hasClass("editable")) {
    $(".editmlthemeone3").hide();

   } 
   else
   {
    $(".editmlthemeone3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone3").hide();

});

 $(".editmlthemeone3").click(function() {
  $(this).hide();
  $(".boxmlthemeone3").addClass("editable");
   $(".editmlthemeone3").hide();
  $(".savemlthemeone3").show();
  $(".imageUploadmlthemeone3").show();
});

$(".savemlthemeone3").click(function() {
  $(this).hide();
  $(".boxmlthemeone3").removeClass("editable");
 
  $(".editmlthemeone3").hide();
  $(".imageUploadmlthemeone3").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone3").change(function() {
$("#imageUploadmlthemeone3").attr("name", "imageUploadmlthemeone3");
    readURL3(this);
});

});
function readURL3(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone3", "imageUploadmlthemeone3","#imagePreviewmlthemeone3");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone4").hide();

$( ".boxmlthemeone4" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone4").hasClass("editable")) {
    $(".editmlthemeone4").hide();

   } 
   else
   {
    $(".editmlthemeone4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone4").hide();

});

 $(".editmlthemeone4").click(function() {
  $(this).hide();
  $(".boxmlthemeone4").addClass("editable");
   $(".editmlthemeone4").hide();
  $(".savemlthemeone4").show();
  $(".imageUploadmlthemeone4").show();
});

$(".savemlthemeone4").click(function() {
  $(this).hide();
  $(".boxmlthemeone4").removeClass("editable");
 
  $(".editmlthemeone4").hide();
  $(".imageUploadmlthemeone4").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone4").change(function() {
$("#imageUploadmlthemeone4").attr("name", "imageUploadmlthemeone4");
    readURL4(this);
});

});
function readURL4(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone4", "imageUploadmlthemeone4","#imagePreviewmlthemeone4");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone4').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone5").hide();

$( ".boxmlthemeone5" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone5").hasClass("editable")) {
    $(".editmlthemeone5").hide();

   } 
   else
   {
    $(".editmlthemeone5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone5").hide();

});

 $(".editmlthemeone5").click(function() {
  $(this).hide();
  $(".boxmlthemeone5").addClass("editable");
   $(".editmlthemeone5").hide();
  $(".savemlthemeone5").show();
  $(".imageUploadmlthemeone5").show();
});

$(".savemlthemeone5").click(function() {
  $(this).hide();
  $(".boxmlthemeone5").removeClass("editable");
 
  $(".editmlthemeone5").hide();
  $(".imageUploadmlthemeone5").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone5").change(function() {
$("#imageUploadmlthemeone5").attr("name", "imageUploadmlthemeone5");
    readURL5(this);
});

});
function readURL5(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone5", "imageUploadmlthemeone5","#imagePreviewmlthemeone5");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone6").hide();

$( ".boxmlthemeone6" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone6").hasClass("editable")) {
    $(".editmlthemeone6").hide();

   } 
   else
   {
    $(".editmlthemeone6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone6").hide();

});

 $(".editmlthemeone6").click(function() {
  $(this).hide();
  $(".boxmlthemeone6").addClass("editable");
   $(".editmlthemeone6").hide();
  $(".savemlthemeone6").show();
  $(".imageUploadmlthemeone6").show();
});

$(".savemlthemeone6").click(function() {
  $(this).hide();
  $(".boxmlthemeone6").removeClass("editable");
 
  $(".editmlthemeone6").hide();
  $(".imageUploadmlthemeone6").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone6").change(function() {
$("#imageUploadmlthemeone6").attr("name", "imageUploadmlthemeone6");
    readURL6(this);
});

});
function readURL6(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone6", "imageUploadmlthemeone6","#imagePreviewmlthemeone6");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone6').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone7").hide();

$( ".boxmlthemeone7" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone7").hasClass("editable")) {
    $(".editmlthemeone7").hide();

   } 
   else
   {
    $(".editmlthemeone7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone7").hide();

});

 $(".editmlthemeone7").click(function() {
  $(this).hide();
  $(".boxmlthemeone7").addClass("editable");
   $(".editmlthemeone7").hide();
  $(".savemlthemeone7").show();
  $(".imageUploadmlthemeone7").show();
});

$(".savemlthemeone7").click(function() {
  $(this).hide();
  $(".boxmlthemeone7").removeClass("editable");
 
  $(".editmlthemeone7").hide();
  $(".imageUploadmlthemeone7").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone7").change(function() {
$("#imageUploadmlthemeone7").attr("name", "imageUploadmlthemeone7");
    readURL7(this);
});

});
function readURL7(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone7", "imageUploadmlthemeone7","#imagePreviewmlthemeone7");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone8").hide();

$( ".boxmlthemeone8" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone8").hasClass("editable")) {
    $(".editmlthemeone8").hide();

   } 
   else
   {
    $(".editmlthemeone8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone8").hide();

});

 $(".editmlthemeone8").click(function() {
  $(this).hide();
  $(".boxmlthemeone8").addClass("editable");
   $(".editmlthemeone8").hide();
  $(".savemlthemeone8").show();
  $(".imageUploadmlthemeone8").show();
});

$(".savemlthemeone8").click(function() {
  $(this).hide();
  $(".boxmlthemeone8").removeClass("editable");
 
  $(".editmlthemeone8").hide();
  $(".imageUploadmlthemeone8").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone8").change(function() {
$("#imageUploadmlthemeone8").attr("name", "imageUploadmlthemeone8");
    readURL8(this);
});

});
function readURL8(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone8", "imageUploadmlthemeone8","#imagePreviewmlthemeone8");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone8').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone9").hide();

$( ".boxmlthemeone9" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone9").hasClass("editable")) {
    $(".editmlthemeone9").hide();

   } 
   else
   {
    $(".editmlthemeone9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone9").hide();

});

 $(".editmlthemeone9").click(function() {
  $(this).hide();
  $(".boxmlthemeone9").addClass("editable");
   $(".editmlthemeone9").hide();
  $(".savemlthemeone9").show();
  $(".imageUploadmlthemeone9").show();
});

$(".savemlthemeone9").click(function() {
  $(this).hide();
  $(".boxmlthemeone9").removeClass("editable");
 
  $(".editmlthemeone9").hide();
  $(".imageUploadmlthemeone9").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone9").change(function() {
$("#imageUploadmlthemeone9").attr("name", "imageUploadmlthemeone9");
    readURL9(this);
});

});
function readURL9(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone9", "imageUploadmlthemeone9","#imagePreviewmlthemeone9");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone9').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone10").hide();

$( ".boxmlthemeone10" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone10").hasClass("editable")) {
    $(".editmlthemeone10").hide();

   } 
   else
   {
    $(".editmlthemeone10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone10").hide();

});

 $(".editmlthemeone10").click(function() {
  $(this).hide();
  $(".boxmlthemeone10").addClass("editable");
   $(".editmlthemeone10").hide();
  $(".savemlthemeone10").show();
  $(".imageUploadmlthemeone10").show();
});

$(".savemlthemeone10").click(function() {
  $(this).hide();
  $(".boxmlthemeone10").removeClass("editable");
 
  $(".editmlthemeone10").hide();
  $(".imageUploadmlthemeone10").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone10").change(function() {
$("#imageUploadmlthemeone10").attr("name", "imageUploadmlthemeone10");
    readURL10(this);
});

});
function readURL10(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone10", "imageUploadmlthemeone10","#imagePreviewmlthemeone10");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone10').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone11").hide();

$( ".boxmlthemeone11" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone11").hasClass("editable")) {
    $(".editmlthemeone11").hide();

   } 
   else
   {
    $(".editmlthemeone11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone11").hide();

});

 $(".editmlthemeone11").click(function() {
  $(this).hide();
  $(".boxmlthemeone11").addClass("editable");
   $(".editmlthemeone11").hide();
  $(".savemlthemeone11").show();
  $(".imageUploadmlthemeone11").show();
});

$(".savemlthemeone11").click(function() {
  $(this).hide();
  $(".boxmlthemeone11").removeClass("editable");
 
  $(".editmlthemeone11").hide();
  $(".imageUploadmlthemeone11").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone11").change(function() {
$("#imageUploadmlthemeone11").attr("name", "imageUploadmlthemeone11");
    readURL11(this);
});

});
function readURL11(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone11", "imageUploadmlthemeone11","#imagePreviewmlthemeone11");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone11').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone12").hide();

$( ".boxmlthemeone12" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone12").hasClass("editable")) {
    $(".editmlthemeone12").hide();

   } 
   else
   {
    $(".editmlthemeone12").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone12").hide();

});

 $(".editmlthemeone12").click(function() {
  $(this).hide();
  $(".boxmlthemeone12").addClass("editable");
   $(".editmlthemeone12").hide();
  $(".savemlthemeone12").show();
  $(".imageUploadmlthemeone12").show();
});

$(".savemlthemeone12").click(function() {
  $(this).hide();
  $(".boxmlthemeone12").removeClass("editable");
 
  $(".editmlthemeone12").hide();
  $(".imageUploadmlthemeone12").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone12").change(function() {
$("#imageUploadmlthemeone12").attr("name", "imageUploadmlthemeone12");
    readURL12(this);
});

});
function readURL12(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone12", "imageUploadmlthemeone12","#imagePreviewmlthemeone12");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone12').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone13").hide();

$( ".boxmlthemeone13" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone13").hasClass("editable")) {
    $(".editmlthemeone13").hide();

   } 
   else
   {
    $(".editmlthemeone13").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone13").hide();

});

 $(".editmlthemeone13").click(function() {
  $(this).hide();
  $(".boxmlthemeone13").addClass("editable");
   $(".editmlthemeone13").hide();
  $(".savemlthemeone13").show();
  $(".imageUploadmlthemeone13").show();
});

$(".savemlthemeone13").click(function() {
  $(this).hide();
  $(".boxmlthemeone13").removeClass("editable");
 
  $(".editmlthemeone13").hide();
  $(".imageUploadmlthemeone13").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone13").change(function() {
$("#imageUploadmlthemeone13").attr("name", "imageUploadmlthemeone13");
    readURL13(this);
});

});
function readURL13(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone13", "imageUploadmlthemeone13","#imagePreviewmlthemeone13");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone13').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone14").hide();

$( ".boxmlthemeone14" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone14").hasClass("editable")) {
    $(".editmlthemeone14").hide();

   } 
   else
   {
    $(".editmlthemeone14").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone14").hide();

});

 $(".editmlthemeone14").click(function() {
  $(this).hide();
  $(".boxmlthemeone14").addClass("editable");
   $(".editmlthemeone14").hide();
  $(".savemlthemeone14").show();
  $(".imageUploadmlthemeone14").show();
});

$(".savemlthemeone14").click(function() {
  $(this).hide();
  $(".boxmlthemeone14").removeClass("editable");
 
  $(".editmlthemeone14").hide();
  $(".imageUploadmlthemeone14").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone14").change(function() {
$("#imageUploadmlthemeone14").attr("name", "imageUploadmlthemeone14");
    readURL14(this);
});

});
function readURL14(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver2(file, "#imageUploadmlthemeone14", "imageUploadmlthemeone14","#imagePreviewmlthemeone14",".imagePreviewmlthemeone14a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone14').attr('src', e.target.result);
                  $('.imagePreviewmlthemeone14a').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone15").hide();

$( ".boxmlthemeone15" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone15").hasClass("editable")) {
    $(".editmlthemeone15").hide();

   } 
   else
   {
    $(".editmlthemeone15").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone15").hide();

});

 $(".editmlthemeone15").click(function() {
  $(this).hide();
  $(".boxmlthemeone15").addClass("editable");
   $(".editmlthemeone15").hide();
  $(".savemlthemeone15").show();
  $(".imageUploadmlthemeone15").show();
});

$(".savemlthemeone15").click(function() {
  $(this).hide();
  $(".boxmlthemeone15").removeClass("editable");
 
  $(".editmlthemeone15").hide();
  $(".imageUploadmlthemeone15").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone15").change(function() {
$("#imageUploadmlthemeone15").attr("name", "imageUploadmlthemeone15");
    readURL15(this);
});

});
function readURL15(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver2(file, "#imageUploadmlthemeone15", "imageUploadmlthemeone15","#imagePreviewmlthemeone15",".imagePreviewmlthemeone15a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone15').attr('src', e.target.result);
                  $('.imagePreviewmlthemeone15a').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone16").hide();

$( ".boxmlthemeone16" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone16").hasClass("editable")) {
    $(".editmlthemeone16").hide();

   } 
   else
   {
    $(".editmlthemeone16").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone16").hide();

});

 $(".editmlthemeone16").click(function() {
  $(this).hide();
  $(".boxmlthemeone16").addClass("editable");
   $(".editmlthemeone16").hide();
  $(".savemlthemeone16").show();
  $(".imageUploadmlthemeone16").show();
});

$(".savemlthemeone16").click(function() {
  $(this).hide();
  $(".boxmlthemeone16").removeClass("editable");
 
  $(".editmlthemeone16").hide();
  $(".imageUploadmlthemeone16").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadmlthemeone16").change(function() {
$("#imageUploadmlthemeone16").attr("name", "imageUploadmlthemeone16");
    readURL16(this);
});

});
function readURL16(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver2(file, "#imageUploadmlthemeone16", "imageUploadmlthemeone16","#imagePreviewmlthemeone16",".imagePreviewmlthemeone16a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone16').attr('src', e.target.result);
                 $('.imagePreviewmlthemeone16a').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmlthemeone17").hide();

$( ".boxmlthemeone17" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone17").hasClass("editable")) {
    $(".editmlthemeone17").hide();

   } 
   else
   {
    $(".editmlthemeone17").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone17").hide();

});

 $(".editmlthemeone17").click(function() {
  $(this).hide();
  $(".boxmlthemeone17").addClass("editable");
   $(".editmlthemeone17").hide();
  $(".savemlthemeone17").show();
  $(".imageUploadmlthemeone17").show();
});

$(".savemlthemeone17").click(function() {
  $(this).hide();
  $(".boxmlthemeone17").removeClass("editable");
 
  $(".editmlthemeone17").hide();
  $(".imageUploadmlthemeone17").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone17").change(function() {
$("#imageUploadmlthemeone17").attr("name", "imageUploadmlthemeone17");
    readURL17(this);
});

});
function readURL17(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone17", "imageUploadmlthemeone17","#imagePreviewmlthemeone17");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone17').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone18").hide();

$( ".boxmlthemeone18" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone18").hasClass("editable")) {
    $(".editmlthemeone18").hide();

   } 
   else
   {
    $(".editmlthemeone18").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone18").hide();

});

 $(".editmlthemeone18").click(function() {
  $(this).hide();
  $(".boxmlthemeone18").addClass("editable");
   $(".editmlthemeone18").hide();
  $(".savemlthemeone18").show();
  $(".imageUploadmlthemeone18").show();
});

$(".savemlthemeone18").click(function() {
  $(this).hide();
  $(".boxmlthemeone18").removeClass("editable");
 
  $(".editmlthemeone18").hide();
  $(".imageUploadmlthemeone18").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone18").change(function() {
$("#imageUploadmlthemeone18").attr("name", "imageUploadmlthemeone18");
    readURL18(this);
});

});
function readURL18(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone18", "imageUploadmlthemeone18","#imagePreviewmlthemeone18");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone18').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone19").hide();

$( ".boxmlthemeone19" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone19").hasClass("editable")) {
    $(".editmlthemeone19").hide();

   } 
   else
   {
    $(".editmlthemeone19").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone19").hide();

});

 $(".editmlthemeone19").click(function() {
  $(this).hide();
  $(".boxmlthemeone19").addClass("editable");
   $(".editmlthemeone19").hide();
  $(".savemlthemeone19").show();
  $(".imageUploadmlthemeone19").show();
});

$(".savemlthemeone19").click(function() {
  $(this).hide();
  $(".boxmlthemeone19").removeClass("editable");
 
  $(".editmlthemeone19").hide();
  $(".imageUploadmlthemeone19").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone19").change(function() {
$("#imageUploadmlthemeone19").attr("name", "imageUploadmlthemeone19");
    readURL19(this);
});

});
function readURL19(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone19", "imageUploadmlthemeone19","#imagePreviewmlthemeone19");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone19').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone20").hide();

$( ".boxmlthemeone20" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone20").hasClass("editable")) {
    $(".editmlthemeone20").hide();

   } 
   else
   {
    $(".editmlthemeone20").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone20").hide();

});

 $(".editmlthemeone20").click(function() {
  $(this).hide();
  $(".boxmlthemeone20").addClass("editable");
   $(".editmlthemeone20").hide();
  $(".savemlthemeone20").show();
  $(".imageUploadmlthemeone20").show();
});

$(".savemlthemeone20").click(function() {
  $(this).hide();
  $(".boxmlthemeone20").removeClass("editable");
 
  $(".editmlthemeone20").hide();
  $(".imageUploadmlthemeone20").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone20").change(function() {
$("#imageUploadmlthemeone20").attr("name", "imageUploadmlthemeone20");
    readURL20(this);
});

});
function readURL20(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone20", "imageUploadmlthemeone20","#imagePreviewmlthemeone20");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone20').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone21").hide();

$( ".boxmlthemeone21" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone21").hasClass("editable")) {
    $(".editmlthemeone21").hide();

   } 
   else
   {
    $(".editmlthemeone21").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone21").hide();

});

 $(".editmlthemeone21").click(function() {
  $(this).hide();
  $(".boxmlthemeone21").addClass("editable");
   $(".editmlthemeone21").hide();
  $(".savemlthemeone21").show();
  $(".imageUploadmlthemeone21").show();
});

$(".savemlthemeone21").click(function() {
  $(this).hide();
  $(".boxmlthemeone21").removeClass("editable");
 
  $(".editmlthemeone21").hide();
  $(".imageUploadmlthemeone21").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone21").change(function() {
$("#imageUploadmlthemeone21").attr("name", "imageUploadmlthemeone21");
    readURL21(this);
});

});
function readURL21(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone21", "imageUploadmlthemeone21","#imagePreviewmlthemeone21");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone21').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadmlthemeone22").hide();

$( ".boxmlthemeone22" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone22").hasClass("editable")) {
    $(".editmlthemeone22").hide();

   } 
   else
   {
    $(".editmlthemeone22").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone22").hide();

});

 $(".editmlthemeone22").click(function() {
  $(this).hide();
  $(".boxmlthemeone22").addClass("editable");
   $(".editmlthemeone22").hide();
  $(".savemlthemeone22").show();
  $(".imageUploadmlthemeone22").show();
});

$(".savemlthemeone22").click(function() {
  $(this).hide();
  $(".boxmlthemeone22").removeClass("editable");
 
  $(".editmlthemeone22").hide();
  $(".imageUploadmlthemeone22").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone22").change(function() {
$("#imageUploadmlthemeone22").attr("name", "imageUploadmlthemeone22");
    readURL22(this);
});

});
function readURL22(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone22", "imageUploadmlthemeone22","#imagePreviewmlthemeone22");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone22').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone23").hide();

$( ".boxmlthemeone23" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone23").hasClass("editable")) {
    $(".editmlthemeone23").hide();

   } 
   else
   {
    $(".editmlthemeone23").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone23").hide();

});

 $(".editmlthemeone23").click(function() {
  $(this).hide();
  $(".boxmlthemeone23").addClass("editable");
   $(".editmlthemeone23").hide();
  $(".savemlthemeone23").show();
  $(".imageUploadmlthemeone23").show();
});

$(".savemlthemeone23").click(function() {
  $(this).hide();
  $(".boxmlthemeone23").removeClass("editable");
 
  $(".editmlthemeone23").hide();
  $(".imageUploadmlthemeone23").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone23").change(function() {
$("#imageUploadmlthemeone23").attr("name", "imageUploadmlthemeone23");
    readURL23(this);
});

});
function readURL23(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone23", "imageUploadmlthemeone23","#imagePreviewmlthemeone23");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlthemeone23').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone24").hide();

$( ".boxmlthemeone24" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone24").hasClass("editable")) {
    $(".editmlthemeone24").hide();

   } 
   else
   {
    $(".editmlthemeone24").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone24").hide();

});

 $(".editmlthemeone24").click(function() {
  $(this).hide();
  $(".boxmlthemeone24").addClass("editable");
   $(".editmlthemeone24").hide();
  $(".savemlthemeone24").show();
  $(".imageUploadmlthemeone24").show();
});

$(".savemlthemeone24").click(function() {
  $(this).hide();
  $(".boxmlthemeone24").removeClass("editable");
 
  $(".editmlthemeone24").hide();
  $(".imageUploadmlthemeone24").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone24").change(function() {
$("#imageUploadmlthemeone24").attr("name", "imageUploadmlthemeone24");
    readURL24(this);
});

});
function readURL24(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone24", "imageUploadmlthemeone24",".imagePreviewmlthemeone24a");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('.imagePreviewmlthemeone24a').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

  

$( ".boxmlthemeone25" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone25").hasClass("editable")) {
    $(".editmlthemeone25").hide();

   } 
   else
   {
    $(".editmlthemeone25").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone25").hide();

});

 $(".editmlthemeone25").click(function() {
  $(this).hide();
  $(".boxmlthemeone25").addClass("editable");
  $(".textmlthemeone25").attr("contenteditable", "true");
   $(".editmlthemeone25").hide();
  $(".savemlthemeone25").show();
 
});

$(".savemlthemeone25").click(function() {
  $(this).hide();
  $(".boxmlthemeone25").removeClass("editable");
 $(".textmlthemeone25").removeAttr("contenteditable");
  $(".editmlthemeone25").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});

$(document).ready(function(){

   $(".contmlfacebook26").hide();

   $( ".boxmlthemeone26" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone26").hasClass("editable")) {
    $(".editmlthemeone26").hide();

   } 
   else
   {
    $(".editmlthemeone26").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone26").hide();

});


$(".editmlthemeone26").click(function(e) {
 $(".boxmlthemeone26").addClass("editable");

  
  
  $(".contmlfacebook26").show();

   $(".boxmlthemeone63").removeClass("editable");
   $(".contmltwitter63").hide();

   $(".boxmlthemeone64").removeClass("editable");
   $(".contmlgoogleplus64").hide();

   $(".boxmlthemeone65").removeClass("editable");
   $(".contmlinstagram65").hide();



   $(".boxmlthemeone66").removeClass("editable");
   $(".contmllinkedin66").hide();


   $(".boxmlthemeone67").removeClass("editable");
   $(".contmldribbble67").hide();

 
});

$(".submitmlfacebook26").click(function() {
  $(".boxmlthemeone26").removeClass("editable");
  $(".contmlfacebook26").hide();
addHref26();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref26() {
var inputmlfacebook26 = $('.inputmlfacebook26').val();
if(inputmlfacebook26 != ""){
  $('#hrefchangemlfacebook26').attr("href",inputmlfacebook26);
}
}





$(document).ready(function(){

   $(".imageUploadmlthemeone27").hide();

$( ".boxmlthemeone27" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone27").hasClass("editable")) {
    $(".editmlthemeone27").hide();

   } 
   else
   {
    $(".editmlthemeone27").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone27").hide();

});

 $(".editmlthemeone27").click(function() {
  $(this).hide();
  $(".boxmlthemeone27").addClass("editable");
   $(".editmlthemeone27").hide();
  $(".savemlthemeone27").show();
  $(".imageUploadmlthemeone27").show();
});

$(".savemlthemeone27").click(function() {
  $(this).hide();
  $(".boxmlthemeone27").removeClass("editable");
 
  $(".editmlthemeone27").hide();
  $(".imageUploadmlthemeone27").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone27").change(function() {
$("#imageUploadmlthemeone27").attr("name", "imageUploadmlthemeone27");
    readURL27(this);
});

});
function readURL27(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmlthemeone27", "imageUploadmlthemeone27",".imagePreviewmlthemeone27a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('.imagePreviewmlthemeone27a').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

  

$( ".boxmlthemeone28" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone28").hasClass("editable")) {
    $(".editmlthemeone28").hide();

   } 
   else
   {
    $(".editmlthemeone28").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone28").hide();

});

 $(".editmlthemeone28").click(function() {
  $(this).hide();
  $(".boxmlthemeone28").addClass("editable");
  $(".textmlthemeone28").attr("contenteditable", "true");
   $(".editmlthemeone28").hide();
  $(".savemlthemeone28").show();
 
});

$(".savemlthemeone28").click(function() {
  $(this).hide();
  $(".boxmlthemeone28").removeClass("editable");
 $(".textmlthemeone28").removeAttr("contenteditable");
  $(".editmlthemeone28").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone29" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone29").hasClass("editable")) {
    $(".editmlthemeone29").hide();

   } 
   else
   {
    $(".editmlthemeone29").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone29").hide();

});

 $(".editmlthemeone29").click(function() {
  $(this).hide();
  $(".boxmlthemeone29").addClass("editable");
  $(".textmlthemeone29").attr("contenteditable", "true");
   $(".editmlthemeone29").hide();
  $(".savemlthemeone29").show();
 
});

$(".savemlthemeone29").click(function() {
  $(this).hide();
  $(".boxmlthemeone29").removeClass("editable");
 $(".textmlthemeone29").removeAttr("contenteditable");
  $(".editmlthemeone29").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone30" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone30").hasClass("editable")) {
    $(".editmlthemeone30").hide();

   } 
   else
   {
    $(".editmlthemeone30").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone30").hide();

});

 $(".editmlthemeone30").click(function() {
  $(this).hide();
  $(".boxmlthemeone30").addClass("editable");
  $(".textmlthemeone30").attr("contenteditable", "true");
   $(".editmlthemeone30").hide();
  $(".savemlthemeone30").show();
 
});

$(".savemlthemeone30").click(function() {
  $(this).hide();
  $(".boxmlthemeone30").removeClass("editable");
 $(".textmlthemeone30").removeAttr("contenteditable");
  $(".editmlthemeone30").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone31" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone31").hasClass("editable")) {
    $(".editmlthemeone31").hide();

   } 
   else
   {
    $(".editmlthemeone31").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone31").hide();

});

 $(".editmlthemeone31").click(function() {
  $(this).hide();
  $(".boxmlthemeone31").addClass("editable");
  $(".textmlthemeone31").attr("contenteditable", "true");
   $(".editmlthemeone31").hide();
  $(".savemlthemeone31").show();
 
});

$(".savemlthemeone31").click(function() {
  $(this).hide();
  $(".boxmlthemeone31").removeClass("editable");
 $(".textmlthemeone31").removeAttr("contenteditable");
  $(".editmlthemeone31").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone32" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone32").hasClass("editable")) {
    $(".editmlthemeone32").hide();

   } 
   else
   {
    $(".editmlthemeone32").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone32").hide();

});

 $(".editmlthemeone32").click(function() {
  $(this).hide();
  $(".boxmlthemeone32").addClass("editable");
  $(".textmlthemeone32").attr("contenteditable", "true");
   $(".editmlthemeone32").hide();
  $(".savemlthemeone32").show();
 
});

$(".savemlthemeone32").click(function() {
  $(this).hide();
  $(".boxmlthemeone32").removeClass("editable");
 $(".textmlthemeone32").removeAttr("contenteditable");
  $(".editmlthemeone32").hide();

Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");  
});
});

$(document).ready(function(){

  

$( ".boxmlthemeone33" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone33").hasClass("editable")) {
    $(".editmlthemeone33").hide();

   } 
   else
   {
    $(".editmlthemeone33").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone33").hide();

});

 $(".editmlthemeone33").click(function() {
  $(this).hide();
  $(".boxmlthemeone33").addClass("editable");
  $(".textmlthemeone33").attr("contenteditable", "true");
   $(".editmlthemeone33").hide();
  $(".savemlthemeone33").show();
 
});

$(".savemlthemeone33").click(function() {
  $(this).hide();
  $(".boxmlthemeone33").removeClass("editable");
 $(".textmlthemeone33").removeAttr("contenteditable");
  $(".editmlthemeone33").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

$(document).ready(function(){

  

$( ".boxmlthemeone34" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone34").hasClass("editable")) {
    $(".editmlthemeone34").hide();

   } 
   else
   {
    $(".editmlthemeone34").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone34").hide();

});

 $(".editmlthemeone34").click(function() {
  $(this).hide();
  $(".boxmlthemeone34").addClass("editable");
  $(".textmlthemeone34").attr("contenteditable", "true");
   $(".editmlthemeone34").hide();
  $(".savemlthemeone34").show();
 
});

$(".savemlthemeone34").click(function() {
  $(this).hide();
  $(".boxmlthemeone34").removeClass("editable");
 $(".textmlthemeone34").removeAttr("contenteditable");
  $(".editmlthemeone34").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone35" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone35").hasClass("editable")) {
    $(".editmlthemeone35").hide();

   } 
   else
   {
    $(".editmlthemeone35").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone35").hide();

});

 $(".editmlthemeone35").click(function() {
  $(this).hide();
  $(".boxmlthemeone35").addClass("editable");
  $(".textmlthemeone35").attr("contenteditable", "true");
   $(".editmlthemeone35").hide();
  $(".savemlthemeone35").show();
 
});

$(".savemlthemeone35").click(function() {
  $(this).hide();
  $(".boxmlthemeone35").removeClass("editable");
 $(".textmlthemeone35").removeAttr("contenteditable");
  $(".editmlthemeone35").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone36" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone36").hasClass("editable")) {
    $(".editmlthemeone36").hide();

   } 
   else
   {
    $(".editmlthemeone36").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone36").hide();

});

 $(".editmlthemeone36").click(function() {
  $(this).hide();
  $(".boxmlthemeone36").addClass("editable");
  $(".textmlthemeone36").attr("contenteditable", "true");
   $(".editmlthemeone36").hide();
  $(".savemlthemeone36").show();
 
});

$(".savemlthemeone36").click(function() {
  $(this).hide();
  $(".boxmlthemeone36").removeClass("editable");
 $(".textmlthemeone36").removeAttr("contenteditable");
  $(".editmlthemeone36").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone37" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone37").hasClass("editable")) {
    $(".editmlthemeone37").hide();

   } 
   else
   {
    $(".editmlthemeone37").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone37").hide();

});

 $(".editmlthemeone37").click(function() {
  $(this).hide();
  $(".boxmlthemeone37").addClass("editable");
  $(".textmlthemeone37").attr("contenteditable", "true");
   $(".editmlthemeone37").hide();
  $(".savemlthemeone37").show();
 
});

$(".savemlthemeone37").click(function() {
  $(this).hide();
  $(".boxmlthemeone37").removeClass("editable");
 $(".textmlthemeone37").removeAttr("contenteditable");
  $(".editmlthemeone37").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone38" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone38").hasClass("editable")) {
    $(".editmlthemeone38").hide();

   } 
   else
   {
    $(".editmlthemeone38").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone38").hide();

});

 $(".editmlthemeone38").click(function() {
  $(this).hide();
  $(".boxmlthemeone38").addClass("editable");
  $(".textmlthemeone38").attr("contenteditable", "true");
   $(".editmlthemeone38").hide();
  $(".savemlthemeone38").show();
 
});

$(".savemlthemeone38").click(function() {
  $(this).hide();
  $(".boxmlthemeone38").removeClass("editable");
 $(".textmlthemeone38").removeAttr("contenteditable");
  $(".editmlthemeone38").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone39" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone39").hasClass("editable")) {
    $(".editmlthemeone39").hide();

   } 
   else
   {
    $(".editmlthemeone39").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone39").hide();

});

 $(".editmlthemeone39").click(function() {
  $(this).hide();
  $(".boxmlthemeone39").addClass("editable");
  $(".textmlthemeone39").attr("contenteditable", "true");
   $(".editmlthemeone39").hide();
  $(".savemlthemeone39").show();
 
});

$(".savemlthemeone39").click(function() {
  $(this).hide();
  $(".boxmlthemeone39").removeClass("editable");
 $(".textmlthemeone39").removeAttr("contenteditable");
  $(".editmlthemeone39").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone40" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone40").hasClass("editable")) {
    $(".editmlthemeone40").hide();

   } 
   else
   {
    $(".editmlthemeone40").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone40").hide();

});

 $(".editmlthemeone40").click(function() {
  $(this).hide();
  $(".boxmlthemeone40").addClass("editable");
  $(".textmlthemeone40").attr("contenteditable", "true");
   $(".editmlthemeone40").hide();
  $(".savemlthemeone40").show();
 
});

$(".savemlthemeone40").click(function() {
  $(this).hide();
  $(".boxmlthemeone40").removeClass("editable");
 $(".textmlthemeone40").removeAttr("contenteditable");
  $(".editmlthemeone40").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone41" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone41").hasClass("editable")) {
    $(".editmlthemeone41").hide();

   } 
   else
   {
    $(".editmlthemeone41").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone41").hide();

});

 $(".editmlthemeone41").click(function() {
  $(this).hide();
  $(".boxmlthemeone41").addClass("editable");
  $(".textmlthemeone41").attr("contenteditable", "true");
   $(".editmlthemeone41").hide();
  $(".savemlthemeone41").show();
 
});

$(".savemlthemeone41").click(function() {
  $(this).hide();
  $(".boxmlthemeone41").removeClass("editable");
 $(".textmlthemeone41").removeAttr("contenteditable");
  $(".editmlthemeone41").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone42" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone42").hasClass("editable")) {
    $(".editmlthemeone42").hide();

   } 
   else
   {
    $(".editmlthemeone42").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone42").hide();

});

 $(".editmlthemeone42").click(function() {
  $(this).hide();
  $(".boxmlthemeone42").addClass("editable");
  $(".textmlthemeone42").attr("contenteditable", "true");
   $(".editmlthemeone42").hide();
  $(".savemlthemeone42").show();
 
});

$(".savemlthemeone42").click(function() {
  $(this).hide();
  $(".boxmlthemeone42").removeClass("editable");
 $(".textmlthemeone42").removeAttr("contenteditable");
  $(".editmlthemeone42").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone43" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone43").hasClass("editable")) {
    $(".editmlthemeone43").hide();

   } 
   else
   {
    $(".editmlthemeone43").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone43").hide();

});

 $(".editmlthemeone43").click(function() {
  $(this).hide();
  $(".boxmlthemeone43").addClass("editable");
  $(".textmlthemeone43").attr("contenteditable", "true");
   $(".editmlthemeone43").hide();
  $(".savemlthemeone43").show();
 
});

$(".savemlthemeone43").click(function() {
  $(this).hide();
  $(".boxmlthemeone43").removeClass("editable");
 $(".textmlthemeone43").removeAttr("contenteditable");
  $(".editmlthemeone43").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone44" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone44").hasClass("editable")) {
    $(".editmlthemeone44").hide();

   } 
   else
   {
    $(".editmlthemeone44").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone44").hide();

});

 $(".editmlthemeone44").click(function() {
  $(this).hide();
  $(".boxmlthemeone44").addClass("editable");
  $(".textmlthemeone44").attr("contenteditable", "true");
   $(".editmlthemeone44").hide();
  $(".savemlthemeone44").show();
 
});

$(".savemlthemeone44").click(function() {
  $(this).hide();
  $(".boxmlthemeone44").removeClass("editable");
 $(".textmlthemeone44").removeAttr("contenteditable");
  $(".editmlthemeone44").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone45" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone45").hasClass("editable")) {
    $(".editmlthemeone45").hide();

   } 
   else
   {
    $(".editmlthemeone45").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone45").hide();

});

 $(".editmlthemeone45").click(function() {
  $(this).hide();
  $(".boxmlthemeone45").addClass("editable");
  $(".textmlthemeone45").attr("contenteditable", "true");
   $(".editmlthemeone45").hide();
  $(".savemlthemeone45").show();
 
});

$(".savemlthemeone45").click(function() {
  $(this).hide();
  $(".boxmlthemeone45").removeClass("editable");
 $(".textmlthemeone45").removeAttr("contenteditable");
  $(".editmlthemeone45").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone46" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone46").hasClass("editable")) {
    $(".editmlthemeone46").hide();

   } 
   else
   {
    $(".editmlthemeone46").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone46").hide();

});

 $(".editmlthemeone46").click(function() {
  $(this).hide();
  $(".boxmlthemeone46").addClass("editable");
  $(".textmlthemeone46").attr("contenteditable", "true");
   $(".editmlthemeone46").hide();
  $(".savemlthemeone46").show();
 
});

$(".savemlthemeone46").click(function() {
  $(this).hide();
  $(".boxmlthemeone46").removeClass("editable");
 $(".textmlthemeone46").removeAttr("contenteditable");
  $(".editmlthemeone46").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone47" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone47").hasClass("editable")) {
    $(".editmlthemeone47").hide();

   } 
   else
   {
    $(".editmlthemeone47").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone47").hide();

});

 $(".editmlthemeone47").click(function() {
  $(this).hide();
  $(".boxmlthemeone47").addClass("editable");
  $(".textmlthemeone47").attr("contenteditable", "true");
   $(".editmlthemeone47").hide();
  $(".savemlthemeone47").show();
 
});

$(".savemlthemeone47").click(function() {
  $(this).hide();
  $(".boxmlthemeone47").removeClass("editable");
 $(".textmlthemeone47").removeAttr("contenteditable");
  $(".editmlthemeone47").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone48" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone48").hasClass("editable")) {
    $(".editmlthemeone48").hide();

   } 
   else
   {
    $(".editmlthemeone48").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone48").hide();

});

 $(".editmlthemeone48").click(function() {
  $(this).hide();
  $(".boxmlthemeone48").addClass("editable");
  $(".textmlthemeone48").attr("contenteditable", "true");
   $(".editmlthemeone48").hide();
  $(".savemlthemeone48").show();
 
});

$(".savemlthemeone48").click(function() {
  $(this).hide();
  $(".boxmlthemeone48").removeClass("editable");
 $(".textmlthemeone48").removeAttr("contenteditable");
  $(".editmlthemeone48").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone49" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone49").hasClass("editable")) {
    $(".editmlthemeone49").hide();

   } 
   else
   {
    $(".editmlthemeone49").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone49").hide();

});

 $(".editmlthemeone49").click(function() {
  $(this).hide();
  $(".boxmlthemeone49").addClass("editable");
  $(".textmlthemeone49").attr("contenteditable", "true");
   $(".editmlthemeone49").hide();
  $(".savemlthemeone49").show();
 
});

$(".savemlthemeone49").click(function() {
  $(this).hide();
  $(".boxmlthemeone49").removeClass("editable");
 $(".textmlthemeone49").removeAttr("contenteditable");
  $(".editmlthemeone49").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone50" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone50").hasClass("editable")) {
    $(".editmlthemeone50").hide();

   } 
   else
   {
    $(".editmlthemeone50").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone50").hide();

});

 $(".editmlthemeone50").click(function() {
  $(this).hide();
  $(".boxmlthemeone50").addClass("editable");
  $(".textmlthemeone50").attr("contenteditable", "true");
   $(".editmlthemeone50").hide();
  $(".savemlthemeone50").show();
 
});

$(".savemlthemeone50").click(function() {
  $(this).hide();
  $(".boxmlthemeone50").removeClass("editable");
 $(".textmlthemeone50").removeAttr("contenteditable");
  $(".editmlthemeone50").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone51" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone51").hasClass("editable")) {
    $(".editmlthemeone51").hide();

   } 
   else
   {
    $(".editmlthemeone51").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone51").hide();

});

 $(".editmlthemeone51").click(function() {
  $(this).hide();
  $(".boxmlthemeone51").addClass("editable");
  $(".textmlthemeone51").attr("contenteditable", "true");
   $(".editmlthemeone51").hide();
  $(".savemlthemeone51").show();
 
});

$(".savemlthemeone51").click(function() {
  $(this).hide();
  $(".boxmlthemeone51").removeClass("editable");
 $(".textmlthemeone51").removeAttr("contenteditable");
  $(".editmlthemeone51").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone52" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone52").hasClass("editable")) {
    $(".editmlthemeone52").hide();

   } 
   else
   {
    $(".editmlthemeone52").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone52").hide();

});

 $(".editmlthemeone52").click(function() {
  $(this).hide();
  $(".boxmlthemeone52").addClass("editable");
  $(".textmlthemeone52").attr("contenteditable", "true");
   $(".editmlthemeone52").hide();
  $(".savemlthemeone52").show();
 
});

$(".savemlthemeone52").click(function() {
  $(this).hide();
  $(".boxmlthemeone52").removeClass("editable");
 $(".textmlthemeone52").removeAttr("contenteditable");
  $(".editmlthemeone52").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone53" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone53").hasClass("editable")) {
    $(".editmlthemeone53").hide();

   } 
   else
   {
    $(".editmlthemeone53").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone53").hide();

});

 $(".editmlthemeone53").click(function() {
  $(this).hide();
  $(".boxmlthemeone53").addClass("editable");
  $(".textmlthemeone53").attr("contenteditable", "true");
   $(".editmlthemeone53").hide();
  $(".savemlthemeone53").show();
 
});

$(".savemlthemeone53").click(function() {
  $(this).hide();
  $(".boxmlthemeone53").removeClass("editable");
 $(".textmlthemeone53").removeAttr("contenteditable");
  $(".editmlthemeone53").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone54" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone54").hasClass("editable")) {
    $(".editmlthemeone54").hide();

   } 
   else
   {
    $(".editmlthemeone54").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone54").hide();

});

 $(".editmlthemeone54").click(function() {
  $(this).hide();
  $(".boxmlthemeone54").addClass("editable");
  $(".textmlthemeone54").attr("contenteditable", "true");
   $(".editmlthemeone54").hide();
  $(".savemlthemeone54").show();
 
});

$(".savemlthemeone54").click(function() {
  $(this).hide();
  $(".boxmlthemeone54").removeClass("editable");
 $(".textmlthemeone54").removeAttr("contenteditable");
  $(".editmlthemeone54").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone55" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone55").hasClass("editable")) {
    $(".editmlthemeone55").hide();

   } 
   else
   {
    $(".editmlthemeone55").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone55").hide();

});

 $(".editmlthemeone55").click(function() {
  $(this).hide();
  $(".boxmlthemeone55").addClass("editable");
  $(".textmlthemeone55").attr("contenteditable", "true");
   $(".editmlthemeone55").hide();
  $(".savemlthemeone55").show();
 
});

$(".savemlthemeone55").click(function() {
  $(this).hide();
  $(".boxmlthemeone55").removeClass("editable");
 $(".textmlthemeone55").removeAttr("contenteditable");
  $(".editmlthemeone55").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmlthemeone56" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone56").hasClass("editable")) {
    $(".editmlthemeone56").hide();

   } 
   else
   {
    $(".editmlthemeone56").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone56").hide();

});

 $(".editmlthemeone56").click(function() {
  $(this).hide();
  $(".boxmlthemeone56").addClass("editable");
  $(".textmlthemeone56").attr("contenteditable", "true");
   $(".editmlthemeone56").hide();
  $(".savemlthemeone56").show();
 
});

$(".savemlthemeone56").click(function() {
  $(this).hide();
  $(".boxmlthemeone56").removeClass("editable");
 $(".textmlthemeone56").removeAttr("contenteditable");
  $(".editmlthemeone56").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone57" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone57").hasClass("editable")) {
    $(".editmlthemeone57").hide();

   } 
   else
   {
    $(".editmlthemeone57").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone57").hide();

});

 $(".editmlthemeone57").click(function() {
  $(this).hide();
  $(".boxmlthemeone57").addClass("editable");
  $(".textmlthemeone57").attr("contenteditable", "true");
   $(".editmlthemeone57").hide();
  $(".savemlthemeone57").show();
 
});

$(".savemlthemeone57").click(function() {
  $(this).hide();
  $(".boxmlthemeone57").removeClass("editable");
 $(".textmlthemeone57").removeAttr("contenteditable");
  $(".editmlthemeone57").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone58" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone58").hasClass("editable")) {
    $(".editmlthemeone58").hide();

   } 
   else
   {
    $(".editmlthemeone58").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone58").hide();

});

 $(".editmlthemeone58").click(function() {
  $(this).hide();
  $(".boxmlthemeone58").addClass("editable");
  $(".textmlthemeone58").attr("contenteditable", "true");
   $(".editmlthemeone58").hide();
  $(".savemlthemeone58").show();
 
});

$(".savemlthemeone58").click(function() {
  $(this).hide();
  $(".boxmlthemeone58").removeClass("editable");
 $(".textmlthemeone58").removeAttr("contenteditable");
  $(".editmlthemeone58").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone59" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone59").hasClass("editable")) {
    $(".editmlthemeone59").hide();

   } 
   else
   {
    $(".editmlthemeone59").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone59").hide();

});

 $(".editmlthemeone59").click(function() {
  $(this).hide();
  $(".boxmlthemeone59").addClass("editable");
  $(".textmlthemeone59").attr("contenteditable", "true");
   $(".editmlthemeone59").hide();
  $(".savemlthemeone59").show();
 
});

$(".savemlthemeone59").click(function() {
  $(this).hide();
  $(".boxmlthemeone59").removeClass("editable");
 $(".textmlthemeone59").removeAttr("contenteditable");
  $(".editmlthemeone59").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone60" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone60").hasClass("editable")) {
    $(".editmlthemeone60").hide();

   } 
   else
   {
    $(".editmlthemeone60").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone60").hide();

});

 $(".editmlthemeone60").click(function() {
  $(this).hide();
  $(".boxmlthemeone60").addClass("editable");
  $(".textmlthemeone60").attr("contenteditable", "true");
   $(".editmlthemeone60").hide();
  $(".savemlthemeone60").show();
 
});

$(".savemlthemeone60").click(function() {
  $(this).hide();
  $(".boxmlthemeone60").removeClass("editable");
 $(".textmlthemeone60").removeAttr("contenteditable");
  $(".editmlthemeone60").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone61" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone61").hasClass("editable")) {
    $(".editmlthemeone61").hide();

   } 
   else
   {
    $(".editmlthemeone61").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone61").hide();

});

 $(".editmlthemeone61").click(function() {
  $(this).hide();
  $(".boxmlthemeone61").addClass("editable");
  $(".textmlthemeone61").attr("contenteditable", "true");
   $(".editmlthemeone61").hide();
  $(".savemlthemeone61").show();
 
});

$(".savemlthemeone61").click(function() {
  $(this).hide();
  $(".boxmlthemeone61").removeClass("editable");
 $(".textmlthemeone61").removeAttr("contenteditable");
  $(".editmlthemeone61").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone62" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone62").hasClass("editable")) {
    $(".editmlthemeone62").hide();

   } 
   else
   {
    $(".editmlthemeone62").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone62").hide();

});

 $(".editmlthemeone62").click(function() {
  $(this).hide();
  $(".boxmlthemeone62").addClass("editable");
  $(".textmlthemeone62").attr("contenteditable", "true");
   $(".editmlthemeone62").hide();
  $(".savemlthemeone62").show();
 
});

$(".savemlthemeone62").click(function() {
  $(this).hide();
  $(".boxmlthemeone62").removeClass("editable");
 $(".textmlthemeone62").removeAttr("contenteditable");
  $(".editmlthemeone62").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

   $(".contmltwitter63").hide();

   $( ".boxmlthemeone63" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone63").hasClass("editable")) {
    $(".editmlthemeone63").hide();

   } 
   else
   {
    $(".editmlthemeone63").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone63").hide();

});


$(".editmlthemeone63").click(function(e) {
 $(".boxmlthemeone63").addClass("editable");

  $(".contmltwitter63").show();

  $(".boxmlthemeone26").removeClass("editable");
   $(".contmlfacebook26").hide();

   // $(".boxmlthemeone63").removeClass("editable");
   //$(".contmltwitter63").hide();

   $(".boxmlthemeone64").removeClass("editable");
   $(".contmlgoogleplus64").hide();

   $(".boxmlthemeone65").removeClass("editable");
   $(".contmlinstagram65").hide();



   $(".boxmlthemeone66").removeClass("editable");
   $(".contmllinkedin66").hide();


   $(".boxmlthemeone67").removeClass("editable");
   $(".contmldribbble67").hide();
  
  

 
});

$(".submitmltwitter63").click(function() {
  $(".boxmlthemeone63").removeClass("editable");
  $(".contmltwitter63").hide();
addHref63();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref63() {
var inputmltwitter63 = $('.inputmltwitter63').val();
if(inputmltwitter63 != ""){
  $('#hrefchangemltwitter63').attr("href",inputmltwitter63);
}
}


$(document).ready(function(){

   $(".contmlgoogleplus64").hide();

   $( ".boxmlthemeone64" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone64").hasClass("editable")) {
    $(".editmlthemeone64").hide();

   } 
   else
   {
    $(".editmlthemeone64").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone64").hide();

});


$(".editmlthemeone64").click(function(e) {
 $(".boxmlthemeone64").addClass("editable");

  
  
  $(".contmlgoogleplus64").show();

  $(".boxmlthemeone26").removeClass("editable");
   $(".contmlfacebook26").hide();

    $(".boxmlthemeone63").removeClass("editable");
   $(".contmltwitter63").hide();

   //$(".boxmlthemeone64").removeClass("editable");
   //$(".contmlgoogleplus64").hide();

   $(".boxmlthemeone65").removeClass("editable");
   $(".contmlinstagram65").hide();



   $(".boxmlthemeone66").removeClass("editable");
   $(".contmllinkedin66").hide();


   $(".boxmlthemeone67").removeClass("editable");
   $(".contmldribbble67").hide();

 
});

$(".submitmlgoogleplus64").click(function() {
  $(".boxmlthemeone64").removeClass("editable");
  $(".contmlgoogleplus64").hide();
addHref64();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref64() {
var inputmlgoogleplus64 = $('.inputmlgoogleplus64').val();
if(inputmlgoogleplus64 != ""){
  $('#hrefchangemlgoogleplus64').attr("href",inputmlgoogleplus64);
}
}



$(document).ready(function(){

   $(".contmlinstagram65").hide();

   $( ".boxmlthemeone65" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone65").hasClass("editable")) {
    $(".editmlthemeone65").hide();

   } 
   else
   {
    $(".editmlthemeone65").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone65").hide();

});


$(".editmlthemeone65").click(function(e) {
 $(".boxmlthemeone65").addClass("editable");

  
  
  $(".contmlinstagram65").show();

  $(".boxmlthemeone26").removeClass("editable");
   $(".contmlfacebook26").hide();

    $(".boxmlthemeone63").removeClass("editable");
   $(".contmltwitter63").hide();

   $(".boxmlthemeone64").removeClass("editable");
   $(".contmlgoogleplus64").hide();

  // $(".boxmlthemeone65").removeClass("editable");
  // $(".contmlinstagram65").hide();



   $(".boxmlthemeone66").removeClass("editable");
   $(".contmllinkedin66").hide();


   $(".boxmlthemeone67").removeClass("editable");
   $(".contmldribbble67").hide();

 
});

$(".submitmlinstagram65").click(function() {
  $(".boxmlthemeone65").removeClass("editable");
  $(".contmlinstagram65").hide();
addHref65();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref65() {
var inputmlinstagram65 = $('.inputmlinstagram65').val();
if(inputmlinstagram65 != ""){
  $('#hrefchangemlinstagram65').attr("href",inputmlinstagram65);
}
}


$(document).ready(function(){

   $(".contmllinkedin66").hide();

   $( ".boxmlthemeone66" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone66").hasClass("editable")) {
    $(".editmlthemeone66").hide();

   } 
   else
   {
    $(".editmlthemeone66").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone66").hide();

});


$(".editmlthemeone66").click(function(e) {
 $(".boxmlthemeone66").addClass("editable");

  
  
  $(".contmllinkedin66").show();

  $(".boxmlthemeone63").removeClass("editable");
   $(".contmltwitter63").hide();

   $(".boxmlthemeone64").removeClass("editable");
   $(".contmlgoogleplus64").hide();

   $(".boxmlthemeone65").removeClass("editable");
   $(".contmlinstagram65").hide();



   //$(".boxmlthemeone66").removeClass("editable");
   //$(".contmllinkedin66").hide();


   $(".boxmlthemeone67").removeClass("editable");
   $(".contmldribbble67").hide();


 
});

$(".submitmllinkedin66").click(function() {
  $(".boxmlthemeone66").removeClass("editable");
  $(".contmllinkedin66").hide();
addHref66();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref66() {
var inputmllinkedin66 = $('.inputmllinkedin66').val();
if(inputmllinkedin66 != ""){
  $('#hrefchangemllinkedin66').attr("href",inputmllinkedin66);
}
}



$(document).ready(function(){

   $(".contmldribbble67").hide();

   $( ".boxmlthemeone67" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone67").hasClass("editable")) {
    $(".editmlthemeone67").hide();

   } 
   else
   {
    $(".editmlthemeone67").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone67").hide();

});


$(".editmlthemeone67").click(function(e) {
 $(".boxmlthemeone67").addClass("editable");

  
  
  $(".contmldribbble67").show();

  $(".boxmlthemeone26").removeClass("editable");
   $(".contmlfacebook26").hide();

    $(".boxmlthemeone63").removeClass("editable");
   $(".contmltwitter63").hide();

   $(".boxmlthemeone64").removeClass("editable");
   $(".contmlgoogleplus64").hide();

   $(".boxmlthemeone65").removeClass("editable");
   $(".contmlinstagram65").hide();



   $(".boxmlthemeone66").removeClass("editable");
   $(".contmllinkedin66").hide();

 
});

$(".submitmldribbble67").click(function() {
  $(".boxmlthemeone67").removeClass("editable");
  $(".contmldribbble67").hide();
addHref67();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref67() {
var inputmldribbble67 = $('.inputmldribbble67').val();
if(inputmldribbble67 != ""){
  $('#hrefchangemldribbble67').attr("href",inputmldribbble67);
}
}


$(document).ready(function(){

  

$( ".boxmlthemeone68" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone68").hasClass("editable")) {
    $(".editmlthemeone68").hide();

   } 
   else
   {
    $(".editmlthemeone68").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone68").hide();

});

 $(".editmlthemeone68").click(function() {
  $(this).hide();
  $(".boxmlthemeone68").addClass("editable");
  $(".textmlthemeone68").attr("contenteditable", "true");
   $(".editmlthemeone68").hide();
  $(".savemlthemeone68").show();
 
});

$(".savemlthemeone68").click(function() {
  $(this).hide();
  $(".boxmlthemeone68").removeClass("editable");
 $(".textmlthemeone68").removeAttr("contenteditable");
  $(".editmlthemeone68").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone69" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone69").hasClass("editable")) {
    $(".editmlthemeone69").hide();

   } 
   else
   {
    $(".editmlthemeone69").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone69").hide();

});

 $(".editmlthemeone69").click(function() {
  $(this).hide();
  $(".boxmlthemeone69").addClass("editable");
  $(".textmlthemeone69").attr("contenteditable", "true");
   $(".editmlthemeone69").hide();
  $(".savemlthemeone69").show();
 
});

$(".savemlthemeone69").click(function() {
  $(this).hide();
  $(".boxmlthemeone69").removeClass("editable");
 $(".textmlthemeone69").removeAttr("contenteditable");
  $(".editmlthemeone69").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

   $(".imageUploadmlthemeone70").hide();

$( ".boxmlthemeone70" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone70").hasClass("editable")) {
    $(".editmlthemeone70").hide();

   } 
   else
   {
    
   
    $(".editmlthemeone70").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone70").hide();
 

});

 $(".editmlthemeone70").click(function() {
  $(this).hide();
  $(".boxmlthemeone70").addClass("editable");
   $(".editmlthemeone70").hide();
  $(".savemlthemeone70").show();
  $(".imageUploadmlthemeone70").show();
});

$(".savemlthemeone70").click(function() {
  $(this).hide();
  $(".boxmlthemeone70").removeClass("editable");
 
  $(".editmlthemeone70").hide();
  $(".imageUploadmlthemeone70").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone70").change(function() {
$("#imageUploadmlthemeone70").attr("name", "imageUploadmlthemeone70");
    readURL70(this);
});

});
function readURL70(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlthemeone70", "imageUploadmlthemeone70",".mlthemeone.header");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mlthemeone.header').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

  

$( ".boxmlthemeone71" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone71").hasClass("editable")) {
    $(".editmlthemeone71").hide();

   } 
   else
   {
    $(".editmlthemeone71").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone71").hide();

});

 $(".editmlthemeone71").click(function() {
  $(this).hide();
  $(".boxmlthemeone71").addClass("editable");
  $(".textmlthemeone71").attr("contenteditable", "true");
   $(".editmlthemeone71").hide();
  $(".savemlthemeone71").show();
 
});

$(".savemlthemeone71").click(function() {
  $(this).hide();
  $(".boxmlthemeone71").removeClass("editable");
 $(".textmlthemeone71").removeAttr("contenteditable");
  $(".editmlthemeone71").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmlthemeone72" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone72").hasClass("editable")) {
    $(".editmlthemeone72").hide();

   } 
   else
   {
    $(".editmlthemeone72").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone72").hide();

});

 $(".editmlthemeone72").click(function() {
  $(this).hide();
  $(".boxmlthemeone72").addClass("editable");
  $(".textmlthemeone72").attr("contenteditable", "true");
   $(".editmlthemeone72").hide();
  $(".savemlthemeone72").show();
 
});

$(".savemlthemeone72").click(function() {
  $(this).hide();
  $(".boxmlthemeone72").removeClass("editable");
 $(".textmlthemeone72").removeAttr("contenteditable");
  $(".editmlthemeone72").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone73" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone73").hasClass("editable")) {
    $(".editmlthemeone73").hide();

   } 
   else
   {
    $(".editmlthemeone73").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone73").hide();

});

 $(".editmlthemeone73").click(function() {
  $(this).hide();
  $(".boxmlthemeone73").addClass("editable");
  $(".textmlthemeone73").attr("contenteditable", "true");
   $(".editmlthemeone73").hide();
  $(".savemlthemeone73").show();
 
});

$(".savemlthemeone73").click(function() {
  $(this).hide();
  $(".boxmlthemeone73").removeClass("editable");
 $(".textmlthemeone73").removeAttr("contenteditable");
  $(".editmlthemeone73").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone74" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone74").hasClass("editable")) {
    $(".editmlthemeone74").hide();

   } 
   else
   {
    $(".editmlthemeone74").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone74").hide();

});

 $(".editmlthemeone74").click(function() {
  $(this).hide();
  $(".boxmlthemeone74").addClass("editable");
  $(".textmlthemeone74").attr("contenteditable", "true");
   $(".editmlthemeone74").hide();
  $(".savemlthemeone74").show();
 
});

$(".savemlthemeone74").click(function() {
  $(this).hide();
  $(".boxmlthemeone74").removeClass("editable");
 $(".textmlthemeone74").removeAttr("contenteditable");
  $(".editmlthemeone74").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmlthemeone75" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone75").hasClass("editable")) {
    $(".editmlthemeone75").hide();

   } 
   else
   {
    $(".editmlthemeone75").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone75").hide();

});

 $(".editmlthemeone75").click(function() {
  $(this).hide();
  $(".boxmlthemeone75").addClass("editable");
  $(".textmlthemeone75").attr("contenteditable", "true");
   $(".editmlthemeone75").hide();
  $(".savemlthemeone75").show();
 
});

$(".savemlthemeone75").click(function() {
  $(this).hide();
  $(".boxmlthemeone75").removeClass("editable");
 $(".textmlthemeone75").removeAttr("contenteditable");
  $(".editmlthemeone75").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});






$(document).ready(function(){

   $(".imageUploadmlthemeone76").hide();

$( ".boxmlthemeone76" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone76").hasClass("editable")) {
    $(".editmlthemeone76").hide();

   } 
   else
   {
    
   
    $(".editmlthemeone76").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone76").hide();
 

});

 $(".editmlthemeone76").click(function() {
  $(this).hide();
  $(".boxmlthemeone76").addClass("editable");
   $(".editmlthemeone76").hide();
  $(".savemlthemeone76").show();
  $(".imageUploadmlthemeone76").show();
});

$(".savemlthemeone76").click(function() {
  $(this).hide();
  $(".boxmlthemeone76").removeClass("editable");
 
  $(".editmlthemeone76").hide();
  $(".imageUploadmlthemeone76").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone76").change(function() {
$("#imageUploadmlthemeone76").attr("name", "imageUploadmlthemeone76");
    readURL76(this);
});

});
function readURL76(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlthemeone76", "imageUploadmlthemeone76",".mlthemeone.accordion");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mlthemeone.accordion').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmlthemeone77").hide();

$( ".boxmlthemeone77" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone77").hasClass("editable")) {
    $(".editmlthemeone77").hide();

   } 
   else
   {
    
   
    $(".editmlthemeone77").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone77").hide();
 

});

 $(".editmlthemeone77").click(function() {
  $(this).hide();
  $(".boxmlthemeone77").addClass("editable");
   $(".editmlthemeone77").hide();
  $(".savemlthemeone77").show();
  $(".imageUploadmlthemeone77").show();
});

$(".savemlthemeone77").click(function() {
  $(this).hide();
  $(".boxmlthemeone77").removeClass("editable");
 
  $(".editmlthemeone77").hide();
  $(".imageUploadmlthemeone77").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone77").change(function() {
$("#imageUploadmlthemeone77").attr("name", "imageUploadmlthemeone77");
    readURL77(this);
});

});
function readURL77(input) {
var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlthemeone77", "imageUploadmlthemeone77",".mlthemeone.slider-1");
  
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mlthemeone.slider-1').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmlthemeone78").hide();

$( ".boxmlthemeone78" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone78").hasClass("editable")) {
    $(".editmlthemeone78").hide();

   } 
   else
   {
    
   
    $(".editmlthemeone78").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone78").hide();
 

});

 $(".editmlthemeone78").click(function() {
  $(this).hide();
  $(".boxmlthemeone78").addClass("editable");
   $(".editmlthemeone78").hide();
  $(".savemlthemeone78").show();
  $(".imageUploadmlthemeone78").show();
});

$(".savemlthemeone78").click(function() {
  $(this).hide();
  $(".boxmlthemeone78").removeClass("editable");
 
  $(".editmlthemeone78").hide();
  $(".imageUploadmlthemeone78").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmlthemeone78").change(function() {
$("#imageUploadmlthemeone78").attr("name", "imageUploadmlthemeone78");
    readURL78(this);
});

});
function readURL78(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmlthemeone78", "imageUploadmlthemeone78",".mlthemeone.basic-1");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mlthemeone.basic-1').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".contmllinkedin24").hide();

   $( ".boxmlthemeone24" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone24").hasClass("editable")) {
    $(".editmlthemeone24").hide();

   } 
   else
   {
    $(".editmlthemeone24").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone24").hide();

});


$(".editmlthemeone24").click(function(e) {
 $(".boxmlthemeone24").addClass("editable");

  
  
  $(".contmllinkedin24").show();

 
});

$(".submitmlthemeone24").click(function() {
  $(".boxmlthemeone24").removeClass("editable");
  $(".contmllinkedin24").hide();
addHref24();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref24() {
var inputmlthemeone24 = $('.inputmlthemeone24').val();
if(inputmlthemeone24 != ""){
  $('.hrefchangemllinkedin24').attr("src",inputmlthemeone24);
}
}

$(document).ready(function(){

   $(".contmllinkedin27").hide();

   $( ".boxmlthemeone27" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone27").hasClass("editable")) {
    $(".editmlthemeone27").hide();
    
   } 
   else
   {
    $(".editmlthemeone27").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone27").hide();

});


$(".editmlthemeone27").click(function(e) {
 $(".boxmlthemeone27").addClass("editable");

  
  
  $(".contmllinkedin27").show();

 
});

$(".submitmlthemeone27").click(function() {
  $(".boxmlthemeone27").removeClass("editable");
  $(".contmllinkedin27").hide();
addHref27();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHref27() {
var inputmlthemeone27 = $('.inputmlthemeone27').val();
if(inputmlthemeone27 != ""){
  $('.hrefchangemllinkedin27').attr("src",inputmlthemeone27);
}
}


$(document).ready(function(){

   $(".imageUploadsnipetimage1").hide();
   $(".imagePreviewsnipetimage1a").attr('data-toggle', "modal");

$( ".boxsnipetimage1" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage1").hasClass("editable")) {
    $(".editsnipetimage1").hide();

   } 
   else
   {
    $(".editsnipetimage1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage1").hide();

});

 $(".editsnipetimage1").click(function() {
  $(this).hide();
  $(".boxsnipetimage1").addClass("editable");
   $(".editsnipetimage1").hide();
  $(".savesnipetimage1").show();
  $(".imageUploadsnipetimage1").show();
});

$(".savesnipetimage1").click(function() {
  $(this).hide();
  $(".boxsnipetimage1").removeClass("editable");
 
  $(".editsnipetimage1").hide();
  $(".imageUploadsnipetimage1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage1").change(function() {
$("#imageUploadsnipetimage1").attr("name", "imageUploadsnipetimage1");
    readURLsnipetimg1(this);
});

});
function readURLsnipetimg1(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage1", "imageUploadsnipetimage1","#imagePreviewsnipetimage1",".imagePreviewsnipetimage1a");
     

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage1').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage1a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage2").hide();
   $(".imagePreviewsnipetimage2a").attr('data-toggle', "modal");

$( ".boxsnipetimage2" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage2").hasClass("editable")) {
    $(".editsnipetimage2").hide();

   } 
   else
   {
    $(".editsnipetimage2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage2").hide();

});

 $(".editsnipetimage2").click(function() {
  $(this).hide();
  $(".boxsnipetimage2").addClass("editable");
   $(".editsnipetimage2").hide();
  $(".savesnipetimage2").show();
  $(".imageUploadsnipetimage2").show();
});

$(".savesnipetimage2").click(function() {
  $(this).hide();
  $(".boxsnipetimage2").removeClass("editable");
 
  $(".editsnipetimage2").hide();
  $(".imageUploadsnipetimage2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage2").change(function() {
$("#imageUploadsnipetimage2").attr("name", "imageUploadsnipetimage2");
    readURLsnipetimg2(this);
});

});
function readURLsnipetimg2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage2", "imageUploadsnipetimage2","#imagePreviewsnipetimage2",".imagePreviewsnipetimage2a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage2').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage2a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage3").hide();
   $(".imagePreviewsnipetimage3a").attr('data-toggle', "modal");

$( ".boxsnipetimage3" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage3").hasClass("editable")) {
    $(".editsnipetimage3").hide();

   } 
   else
   {
    $(".editsnipetimage3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage3").hide();

});

 $(".editsnipetimage3").click(function() {
  $(this).hide();
  $(".boxsnipetimage3").addClass("editable");
   $(".editsnipetimage3").hide();
  $(".savesnipetimage3").show();
  $(".imageUploadsnipetimage3").show();
});

$(".savesnipetimage3").click(function() {
  $(this).hide();
  $(".boxsnipetimage3").removeClass("editable");
 
  $(".editsnipetimage3").hide();
  $(".imageUploadsnipetimage3").hide();
 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});




$("#imageUploadsnipetimage3").change(function() {
$("#imageUploadsnipetimage3").attr("name", "imageUploadsnipetimage3");
    readURLsnipetimg3(this);
});

});
function readURLsnipetimg3(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage3", "imageUploadsnipetimage3","#imagePreviewsnipetimage3",".imagePreviewsnipetimage3a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage3').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage3a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadsnipetimage4").hide();
   $(".imagePreviewsnipetimage4a").attr('data-toggle', "modal");

$( ".boxsnipetimage4" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage4").hasClass("editable")) {
    $(".editsnipetimage4").hide();

   } 
   else
   {
    $(".editsnipetimage4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage4").hide();

});

 $(".editsnipetimage4").click(function() {
  $(this).hide();
  $(".boxsnipetimage4").addClass("editable");
   $(".editsnipetimage4").hide();
  $(".savesnipetimage4").show();
  $(".imageUploadsnipetimage4").show();
});

$(".savesnipetimage4").click(function() {
  $(this).hide();
  $(".boxsnipetimage4").removeClass("editable");
 
  $(".editsnipetimage4").hide();
  $(".imageUploadsnipetimage4").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage4").change(function() {
$("#imageUploadsnipetimage4").attr("name", "imageUploadsnipetimage4");
    readURLsnipetimg4(this);
});

});
function readURLsnipetimg4(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage4", "imageUploadsnipetimage4","#imagePreviewsnipetimage4",".imagePreviewsnipetimage4a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage4').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage4a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage5").hide();
   $(".imagePreviewsnipetimage5a").attr('data-toggle', "modal");

$( ".boxsnipetimage5" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage5").hasClass("editable")) {
    $(".editsnipetimage5").hide();

   } 
   else
   {
    $(".editsnipetimage5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage5").hide();

});

 $(".editsnipetimage5").click(function() {
  $(this).hide();
  $(".boxsnipetimage5").addClass("editable");
   $(".editsnipetimage5").hide();
  $(".savesnipetimage5").show();
  $(".imageUploadsnipetimage5").show();
});

$(".savesnipetimage5").click(function() {
  $(this).hide();
  $(".boxsnipetimage5").removeClass("editable");
 
  $(".editsnipetimage5").hide();
  $(".imageUploadsnipetimage5").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage5").change(function() {
$("#imageUploadsnipetimage5").attr("name", "imageUploadsnipetimage5");
    readURLsnipetimg5(this);
});

});
function readURLsnipetimg5(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage5", "imageUploadsnipetimage5","#imagePreviewsnipetimage5",".imagePreviewsnipetimage5a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage5').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage5a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}
$(document).ready(function(){

   $(".imageUploadsnipetimage6").hide();
   $(".imagePreviewsnipetimage6a").attr('data-toggle', "modal");

$( ".boxsnipetimage6" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage6").hasClass("editable")) {
    $(".editsnipetimage6").hide();

   } 
   else
   {
    $(".editsnipetimage6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage6").hide();

});

 $(".editsnipetimage6").click(function() {
  $(this).hide();
  $(".boxsnipetimage6").addClass("editable");
   $(".editsnipetimage6").hide();
  $(".savesnipetimage6").show();
  $(".imageUploadsnipetimage6").show();
});

$(".savesnipetimage6").click(function() {
  $(this).hide();
  $(".boxsnipetimage6").removeClass("editable");
 
  $(".editsnipetimage6").hide();
  $(".imageUploadsnipetimage6").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage6").change(function() {
$("#imageUploadsnipetimage6").attr("name", "imageUploadsnipetimage6");
    readURLsnipetimg6(this);
});

});
function readURLsnipetimg6(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage6", "imageUploadsnipetimage6","#imagePreviewsnipetimage6",".imagePreviewsnipetimage6a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage6').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage6a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage7").hide();
   $(".imagePreviewsnipetimage7a").attr('data-toggle', "modal");

$( ".boxsnipetimage7" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage7").hasClass("editable")) {
    $(".editsnipetimage7").hide();

   } 
   else
   {
    $(".editsnipetimage7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage7").hide();

});

 $(".editsnipetimage7").click(function() {
  $(this).hide();
  $(".boxsnipetimage7").addClass("editable");
   $(".editsnipetimage7").hide();
  $(".savesnipetimage7").show();
  $(".imageUploadsnipetimage7").show();
});

$(".savesnipetimage7").click(function() {
  $(this).hide();
  $(".boxsnipetimage7").removeClass("editable");
 
  $(".editsnipetimage7").hide();
  $(".imageUploadsnipetimage7").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage7").change(function() {
$("#imageUploadsnipetimage7").attr("name", "imageUploadsnipetimage7");
    readURLsnipetimg7(this);
});

});
function readURLsnipetimg7(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage7", "imageUploadsnipetimage7","#imagePreviewsnipetimage7",".imagePreviewsnipetimage7a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage7').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage7a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage8").hide();
   $(".imagePreviewsnipetimage8a").attr('data-toggle', "modal");

$( ".boxsnipetimage8" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage8").hasClass("editable")) {
    $(".editsnipetimage8").hide();

   } 
   else
   {
    $(".editsnipetimage8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage8").hide();

});

 $(".editsnipetimage8").click(function() {
  $(this).hide();
  $(".boxsnipetimage8").addClass("editable");
   $(".editsnipetimage8").hide();
  $(".savesnipetimage8").show();
  $(".imageUploadsnipetimage8").show();
});

$(".savesnipetimage8").click(function() {
  $(this).hide();
  $(".boxsnipetimage8").removeClass("editable");
 
  $(".editsnipetimage8").hide();
  $(".imageUploadsnipetimage8").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage8").change(function() {
$("#imageUploadsnipetimage8").attr("name", "imageUploadsnipetimage8");
    readURLsnipetimg8(this);
});

});
function readURLsnipetimg8(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage8", "imageUploadsnipetimage8","#imagePreviewsnipetimage8",".imagePreviewsnipetimage8a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage8').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage8a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadsnipetimage9").hide();
   $(".imagePreviewsnipetimage9a").attr('data-toggle', "modal");

$( ".boxsnipetimage9" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage9").hasClass("editable")) {
    $(".editsnipetimage9").hide();

   } 
   else
   {
    $(".editsnipetimage9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage9").hide();

});

 $(".editsnipetimage9").click(function() {
  $(this).hide();
  $(".boxsnipetimage9").addClass("editable");
   $(".editsnipetimage9").hide();
  $(".savesnipetimage9").show();
  $(".imageUploadsnipetimage9").show();
});

$(".savesnipetimage9").click(function() {
  $(this).hide();
  $(".boxsnipetimage9").removeClass("editable");
 
  $(".editsnipetimage9").hide();
  $(".imageUploadsnipetimage9").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage9").change(function() {
$("#imageUploadsnipetimage9").attr("name", "imageUploadsnipetimage9");
    readURLsnipetimg9(this);
});

});
function readURLsnipetimg9(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage9", "imageUploadsnipetimage9","#imagePreviewsnipetimage9",".imagePreviewsnipetimage9a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage9').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage9a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage10").hide();
    $(".imagePreviewsnipetimage10a").attr('data-toggle', "modal");

$( ".boxsnipetimage10" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage10").hasClass("editable")) {
    $(".editsnipetimage10").hide();

   } 
   else
   {
    $(".editsnipetimage10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage10").hide();

});

 $(".editsnipetimage10").click(function() {
  $(this).hide();
  $(".boxsnipetimage10").addClass("editable");
   $(".editsnipetimage10").hide();
  $(".savesnipetimage10").show();
  $(".imageUploadsnipetimage10").show();
});

$(".savesnipetimage10").click(function() {
  $(this).hide();
  $(".boxsnipetimage10").removeClass("editable");
 
  $(".editsnipetimage10").hide();
  $(".imageUploadsnipetimage10").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage10").change(function() {
$("#imageUploadsnipetimage10").attr("name", "imageUploadsnipetimage10");
    readURLsnipetimg10(this);
});

});
function readURLsnipetimg10(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage10", "imageUploadsnipetimage10","#imagePreviewsnipetimage10",".imagePreviewsnipetimage10a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage10').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage10a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage11").hide();
    $(".imagePreviewsnipetimage11a").attr('data-toggle', "modal");

$( ".boxsnipetimage11" )
 .on("mouseenter", function() {
   if ($(".boxsnipetimage11").hasClass("editable")) {
    $(".editsnipetimage11").hide();

   } 
   else
   {
    $(".editsnipetimage11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editsnipetimage11").hide();

});

 $(".editsnipetimage11").click(function() {
  $(this).hide();
  $(".boxsnipetimage11").addClass("editable");
   $(".editsnipetimage11").hide();
  $(".savesnipetimage11").show();
  $(".imageUploadsnipetimage11").show();
});

$(".savesnipetimage11").click(function() {
  $(this).hide();
  $(".boxsnipetimage11").removeClass("editable");
 
  $(".editsnipetimage11").hide();
  $(".imageUploadsnipetimage11").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadsnipetimage11").change(function() {
$("#imageUploadsnipetimage11").attr("name", "imageUploadsnipetimage11");
    readURLsnipetimg11(this);
});

});
function readURLsnipetimg11(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver1(file, "#imageUploadsnipetimage11", "imageUploadsnipetimage11","#imagePreviewsnipetimage11",".imagePreviewsnipetimage11a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage11').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage11a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadgallerytheme1").hide();

$( ".boxgallerytheme1" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme1").hasClass("editable")) {
    $(".editgallerytheme1").hide();

   } 
   else
   {
    $(".editgallerytheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme1").hide();

});

 $(".editgallerytheme1").click(function() {
  $(this).hide();
  $(".boxgallerytheme1").addClass("editable");
   $(".editgallerytheme1").hide();
  $(".savegallerytheme1").show();
  $(".imageUploadgallerytheme1").show();
});

$(".savegallerytheme1").click(function() {
  $(this).hide();
  $(".boxgallerytheme1").removeClass("editable");
 
  $(".editgallerytheme1").hide();
  $(".imageUploadgallerytheme1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadgallerytheme1").change(function() {
$("#imageUploadgallerytheme1").attr("name", "imageUploadgallerytheme1");
    readURLgallery1(this);
});

});
function readURLgallery1(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadgallerytheme1", "imageUploadgallerytheme1","#imagePreviewgallerytheme1");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewgallerytheme1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadgallerytheme2").hide();

$( ".boxgallerytheme2" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme2").hasClass("editable")) {
    $(".editgallerytheme2").hide();

   } 
   else
   {
    $(".editgallerytheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme2").hide();

});

 $(".editgallerytheme2").click(function() {
  $(this).hide();
  $(".boxgallerytheme2").addClass("editable");
   $(".editgallerytheme2").hide();
  $(".savegallerytheme2").show();
  $(".imageUploadgallerytheme2").show();
});

$(".savegallerytheme2").click(function() {
  $(this).hide();
  $(".boxgallerytheme2").removeClass("editable");
 
  $(".editgallerytheme2").hide();
  $(".imageUploadgallerytheme2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadgallerytheme2").change(function() {
$("#imageUploadgallerytheme2").attr("name", "imageUploadgallerytheme2");
    readURLgallery2(this);
});

});
function readURLgallery2(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadgallerytheme2", "imageUploadgallerytheme2","#imagePreviewgallerytheme2");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewgallerytheme2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){
$( ".boxgallerytheme3" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme3").hasClass("editable")) {
    $(".editgallerytheme3").hide();

   } 
   else
   {
    $(".editgallerytheme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme3").hide();

});

 $(".editgallerytheme3").click(function() {
  $(this).hide();
  $(".boxgallerytheme3").addClass("editable");
  $(".textgallerytheme3").attr("contenteditable", "true");
   $(".editgallerytheme3").hide();
  $(".savegallerytheme3").show();
 
});

$(".savegallerytheme3").click(function() {
  $(this).hide();
  $(".boxgallerytheme3").removeClass("editable");
 $(".textgallerytheme3").removeAttr("contenteditable");
  $(".editgallerytheme3").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
})


$(document).ready(function(){

   $(".imageUploadgallerytheme4").hide();

$( ".boxgallerytheme4" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme4").hasClass("editable")) {
    $(".editgallerytheme4").hide();

   } 
   else
   {
    $(".editgallerytheme4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme4").hide();

});

 $(".editgallerytheme4").click(function() {
  $(this).hide();
  $(".boxgallerytheme4").addClass("editable");
   $(".editgallerytheme4").hide();
  $(".savegallerytheme4").show();
  $(".imageUploadgallerytheme4").show();
});

$(".savegallerytheme4").click(function() {
  $(this).hide();
  $(".boxgallerytheme4").removeClass("editable");
 
  $(".editgallerytheme4").hide();
  $(".imageUploadgallerytheme4").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadgallerytheme4").change(function() {
$("#imageUploadgallerytheme4").attr("name", "imageUploadgallerytheme4");
    readURLgallery4(this);
});

});
function readURLgallery4(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadgallerytheme4", "imageUploadgallerytheme4","#imagePreviewgallerytheme4");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewgallerytheme4').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadgallerytheme5").hide();

$( ".boxgallerytheme5" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme5").hasClass("editable")) {
    $(".editgallerytheme5").hide();

   } 
   else
   {
    $(".editgallerytheme5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme5").hide();

});

 $(".editgallerytheme5").click(function() {
  $(this).hide();
  $(".boxgallerytheme5").addClass("editable");
   $(".editgallerytheme5").hide();
  $(".savegallerytheme5").show();
  $(".imageUploadgallerytheme5").show();
});

$(".savegallerytheme5").click(function() {
  $(this).hide();
  $(".boxgallerytheme5").removeClass("editable");
 
  $(".editgallerytheme5").hide();
  $(".imageUploadgallerytheme5").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadgallerytheme5").change(function() {
$("#imageUploadgallerytheme5").attr("name", "imageUploadgallerytheme5");
    readURLgallery5(this);
});

});
function readURLgallery5(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadgallerytheme5", "imageUploadgallerytheme5","#imagePreviewgallerytheme5");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewgallerytheme5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadgallerytheme6").hide();

$( ".boxgallerytheme6" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme6").hasClass("editable")) {
    $(".editgallerytheme6").hide();

   } 
   else
   {
    $(".editgallerytheme6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme6").hide();

});

 $(".editgallerytheme6").click(function() {
  $(this).hide();
  $(".boxgallerytheme6").addClass("editable");
   $(".editgallerytheme6").hide();
  $(".savegallerytheme6").show();
  $(".imageUploadgallerytheme6").show();
});

$(".savegallerytheme6").click(function() {
  $(this).hide();
  $(".boxgallerytheme6").removeClass("editable");
 
  $(".editgallerytheme6").hide();
  $(".imageUploadgallerytheme6").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadgallerytheme6").change(function() {
$("#imageUploadgallerytheme6").attr("name", "imageUploadgallerytheme6");
    readURLgallery6(this);
});

});
function readURLgallery6(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadgallerytheme6", "imageUploadgallerytheme6","#imagePreviewgallerytheme6");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewgallerytheme6').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}

$(document).ready(function(){

   $(".imageUploadgallerytheme7").hide();

$( ".boxgallerytheme7" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme7").hasClass("editable")) {
    $(".editgallerytheme7").hide();

   } 
   else
   {
    $(".editgallerytheme7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme7").hide();

});

 $(".editgallerytheme7").click(function() {
  $(this).hide();
  $(".boxgallerytheme7").addClass("editable");
   $(".editgallerytheme7").hide();
  $(".savegallerytheme7").show();
  $(".imageUploadgallerytheme7").show();
});

$(".savegallerytheme7").click(function() {
  $(this).hide();
  $(".boxgallerytheme7").removeClass("editable");
 
  $(".editgallerytheme7").hide();
  $(".imageUploadgallerytheme7").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});




$("#imageUploadgallerytheme7").change(function() {
$("#imageUploadgallerytheme7").attr("name", "imageUploadgallerytheme7");
    readURLgallery7(this);
});

});
function readURLgallery7(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadgallerytheme7", "imageUploadgallerytheme7","#imagePreviewgallerytheme7");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewgallerytheme7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){
$( ".boxgallerytheme8" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme8").hasClass("editable")) {
    $(".editgallerytheme8").hide();

   } 
   else
   {
    $(".editgallerytheme8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme8").hide();

});

 $(".editgallerytheme8").click(function() {
  $(this).hide();
  $(".boxgallerytheme8").addClass("editable");
  $(".textgallerytheme8").attr("contenteditable", "true");
   $(".editgallerytheme8").hide();
  $(".savegallerytheme8").show();
 
});

$(".savegallerytheme8").click(function() {
  $(this).hide();
  $(".boxgallerytheme8").removeClass("editable");
 $(".textgallerytheme8").removeAttr("contenteditable");
  $(".editgallerytheme8").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
})


$(document).ready(function(){
$( ".boxgallerytheme9" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme9").hasClass("editable")) {
    $(".editgallerytheme9").hide();

   } 
   else
   {
    $(".editgallerytheme9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme9").hide();

});

 $(".editgallerytheme9").click(function() {
  $(this).hide();
  $(".boxgallerytheme9").addClass("editable");
  $(".textgallerytheme9").attr("contenteditable", "true");
   $(".editgallerytheme9").hide();
  $(".savegallerytheme9").show();
 
});

$(".savegallerytheme9").click(function() {
  $(this).hide();
  $(".boxgallerytheme9").removeClass("editable");
 $(".textgallerytheme9").removeAttr("contenteditable");
  $(".editgallerytheme9").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
})



$(document).ready(function(){
$( ".boxgallerytheme10" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme10").hasClass("editable")) {
    $(".editgallerytheme10").hide();

   } 
   else
   {
    $(".editgallerytheme10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme10").hide();

});

 $(".editgallerytheme10").click(function() {
  $(this).hide();
  $(".boxgallerytheme10").addClass("editable");
  $(".textgallerytheme10").attr("contenteditable", "true");
   $(".editgallerytheme10").hide();
  $(".savegallerytheme10").show();
 
});

$(".savegallerytheme10").click(function() {
  $(this).hide();
  $(".boxgallerytheme10").removeClass("editable");
 $(".textgallerytheme10").removeAttr("contenteditable");
  $(".editgallerytheme10").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
})



$(document).ready(function(){
$( ".boxgallerytheme11" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme11").hasClass("editable")) {
    $(".editgallerytheme11").hide();

   } 
   else
   {
    $(".editgallerytheme11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme11").hide();

});

 $(".editgallerytheme11").click(function() {
  $(this).hide();
  $(".boxgallerytheme11").addClass("editable");
  $(".textgallerytheme11").attr("contenteditable", "true");
   $(".editgallerytheme11").hide();
  $(".savegallerytheme11").show();
 
});

$(".savegallerytheme11").click(function() {
  $(this).hide();
  $(".boxgallerytheme11").removeClass("editable");
 $(".textgallerytheme11").removeAttr("contenteditable");
  $(".editgallerytheme11").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
})



$(document).ready(function(){
$( ".boxgallerytheme12" )
 .on("mouseenter", function() {
   if ($(".boxgallerytheme12").hasClass("editable")) {
    $(".editgallerytheme12").hide();

   } 
   else
   {
    $(".editgallerytheme12").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editgallerytheme12").hide();

});

 $(".editgallerytheme12").click(function() {
  $(this).hide();
  $(".boxgallerytheme12").addClass("editable");
  $(".textgallerytheme12").attr("contenteditable", "true");
   $(".editgallerytheme12").hide();
  $(".savegallerytheme12").show();
 
});

$(".savegallerytheme12").click(function() {
  $(this).hide();
  $(".boxgallerytheme12").removeClass("editable");
 $(".textgallerytheme12").removeAttr("contenteditable");
  $(".editgallerytheme12").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
})

$(document).ready(function(){

   $(".imageUploadmoxygentheme1").hide();

$( ".boxmoxygentheme1" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme1").hasClass("editable")) {
    $(".editmoxygentheme1").hide();

   } 
   else
   {
    
   
    $(".editmoxygentheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme1").hide();
 

});

 $(".editmoxygentheme1").click(function() {
  $(this).hide();
  $(".boxmoxygentheme1").addClass("editable");
   $(".editmoxygentheme1").hide();
  $(".savemoxygentheme1").show();
  $(".imageUploadmoxygentheme1").show();
});

$(".savemoxygentheme1").click(function() {
  $(this).hide();
  $(".boxmoxygentheme1").removeClass("editable");
 
  $(".editmoxygentheme1").hide();
  $(".imageUploadmoxygentheme1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme1").change(function() {
$("#imageUploadmoxygentheme1").attr("name", "imageUploadmoxygentheme1");
    readURLoxy1(this);
});

});
function readURLoxy1(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmoxygentheme1", "imageUploadmoxygentheme1",".boxmoxygentheme1");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.boxmoxygentheme1').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme2").hide();

$( ".boxmoxygentheme2" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme2").hasClass("editable")) {
    $(".editmoxygentheme2").hide();

   } 
   else
   {
    
   
    $(".editmoxygentheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme2").hide();
 

});

 $(".editmoxygentheme2").click(function() {
  $(this).hide();
  $(".boxmoxygentheme2").addClass("editable");
   $(".editmoxygentheme2").hide();
  $(".savemoxygentheme2").show();
  $(".imageUploadmoxygentheme2").show();
});

$(".savemoxygentheme2").click(function() {
  $(this).hide();
  $(".boxmoxygentheme2").removeClass("editable");
 
  $(".editmoxygentheme2").hide();
  $(".imageUploadmoxygentheme2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme2").change(function() {
$("#imageUploadmoxygentheme2").attr("name", "imageUploadmoxygentheme2");
    readURLoxy2(this);
});

});
function readURLoxy2(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmoxygentheme1", "imageUploadmoxygentheme1",".boxmoxygentheme1");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.boxmoxygentheme2').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

$(".imageUploadmoxygentheme3").hide();

$( ".boxmoxygentheme3" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme3").hasClass("editable")) {
    $(".editmoxygentheme3").hide();

   } 
   else
   {
    
   
    $(".editmoxygentheme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme3").hide();
 

});

 $(".editmoxygentheme3").click(function() {
  $(this).hide();
  $(".boxmoxygentheme3").addClass("editable");
   $(".editmoxygentheme3").hide();
  $(".savemoxygentheme3").show();
  $(".imageUploadmoxygentheme3").show();
});

$(".savemoxygentheme3").click(function() {
  $(this).hide();
  $(".boxmoxygentheme3").removeClass("editable");
 
  $(".editmoxygentheme3").hide();
  $(".imageUploadmoxygentheme3").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme3").change(function() {
$("#imageUploadmoxygentheme3").attr("name", "imageUploadmoxygentheme3");
    readURLoxy3(this);
});

});
function readURLoxy3(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmoxygentheme3", "imageUploadmoxygentheme3",".boxmoxygentheme3");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.boxmoxygentheme3').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

  

$( ".boxmoxygentheme4" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme4").hasClass("editable")) {
    $(".editmoxygentheme4").hide();

   } 
   else
   {
    $(".editmoxygentheme4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme4").hide();

});

 $(".editmoxygentheme4").click(function() {
  $(this).hide();
  $(".boxmoxygentheme4").addClass("editable");
  $(".textmoxygentheme4").attr("contenteditable", "true");
   $(".editmoxygentheme4").hide();
  $(".savemoxygentheme4").show();
 
});

$(".savemoxygentheme4").click(function() {
  $(this).hide();
  $(".boxmoxygentheme4").removeClass("editable");
 $(".textmoxygentheme4").removeAttr("contenteditable");
  $(".editmoxygentheme4").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmoxygentheme5" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme5").hasClass("editable")) {
    $(".editmoxygentheme5").hide();

   } 
   else
   {
    $(".editmoxygentheme5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme5").hide();

});

 $(".editmoxygentheme5").click(function() {
  $(this).hide();
  $(".boxmoxygentheme5").addClass("editable");
  $(".textmoxygentheme5").attr("contenteditable", "true");
   $(".editmoxygentheme5").hide();
  $(".savemoxygentheme5").show();
 
});

$(".savemoxygentheme5").click(function() {
  $(this).hide();
  $(".boxmoxygentheme5").removeClass("editable");
 $(".textmoxygentheme5").removeAttr("contenteditable");
  $(".editmoxygentheme5").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmoxygentheme6" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme6").hasClass("editable")) {
    $(".editmoxygentheme6").hide();

   } 
   else
   {
    $(".editmoxygentheme6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme6").hide();

});

 $(".editmoxygentheme6").click(function() {
  $(this).hide();
  $(".boxmoxygentheme6").addClass("editable");
  $(".textmoxygentheme6").attr("contenteditable", "true");
   $(".editmoxygentheme6").hide();
  $(".savemoxygentheme6").show();
 
});

$(".savemoxygentheme6").click(function() {
  $(this).hide();
  $(".boxmoxygentheme6").removeClass("editable");
 $(".textmoxygentheme6").removeAttr("contenteditable");
  $(".editmoxygentheme6").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

   $(".imageUploadmoxygentheme7").hide();

$( ".boxmoxygentheme7" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme7").hasClass("editable")) {
    $(".editmoxygentheme7").hide();

   } 
   else
   {
    $(".editmoxygentheme7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme7").hide();

});

 $(".editmoxygentheme7").click(function() {
  $(this).hide();
  $(".boxmoxygentheme7").addClass("editable");
   $(".editmoxygentheme7").hide();
  $(".savemoxygentheme7").show();
  $(".imageUploadmoxygentheme7").show();
});

$(".savemoxygentheme7").click(function() {
  $(this).hide();
  $(".boxmoxygentheme7").removeClass("editable");
 
  $(".editmoxygentheme7").hide();
  $(".imageUploadmoxygentheme7").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme7").change(function() {
$("#imageUploadmoxygentheme7").attr("name", "imageUploadmoxygentheme7");
    readURLoxy7(this);
});

});
function readURLoxy7(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme7", "imageUploadmoxygentheme7","#imagePreviewmoxygentheme7");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}







$(document).ready(function(){

  

$( ".boxmoxygentheme9" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme9").hasClass("editable")) {
    $(".editmoxygentheme9").hide();

   } 
   else
   {
    $(".editmoxygentheme9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme9").hide();

});

 $(".editmoxygentheme9").click(function() {
  $(this).hide();
  $(".boxmoxygentheme9").addClass("editable");
  $(".textmoxygentheme9").attr("contenteditable", "true");
   $(".editmoxygentheme9").hide();
  $(".savemoxygentheme9").show();
 
});

$(".savemoxygentheme9").click(function() {
  $(this).hide();
  $(".boxmoxygentheme9").removeClass("editable");
 $(".textmoxygentheme9").removeAttr("contenteditable");
  $(".editmoxygentheme9").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

   $(".imageUploadmoxygentheme10").hide();

$( ".boxmoxygentheme10" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme10").hasClass("editable")) {
    $(".editmoxygentheme10").hide();

   } 
   else
   {
    $(".editmoxygentheme10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme10").hide();

});

 $(".editmoxygentheme10").click(function() {
  $(this).hide();
  $(".boxmoxygentheme10").addClass("editable");
   $(".editmoxygentheme10").hide();
  $(".savemoxygentheme10").show();
  $(".imageUploadmoxygentheme10").show();
});

$(".savemoxygentheme10").click(function() {
  $(this).hide();
  $(".boxmoxygentheme10").removeClass("editable");
 
  $(".editmoxygentheme10").hide();
  $(".imageUploadmoxygentheme10").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme10").change(function() {
$("#imageUploadmoxygentheme10").attr("name", "imageUploadmoxygentheme10");
    readURLoxy10(this);
});

});
function readURLoxy10(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme10", "imageUploadmoxygentheme10","#moxyabout-us");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#moxyabout-us').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}







$(document).ready(function(){

   $(".imageUploadmoxygentheme12").hide();

$( ".boxmoxygentheme12" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme12").hasClass("editable")) {
    $(".editmoxygentheme12").hide();

   } 
   else
   {
    $(".editmoxygentheme12").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme12").hide();

});

 $(".editmoxygentheme12").click(function() {
  $(this).hide();
  $(".boxmoxygentheme12").addClass("editable");
   $(".editmoxygentheme12").hide();
  $(".savemoxygentheme12").show();
  $(".imageUploadmoxygentheme12").show();
});

$(".savemoxygentheme12").click(function() {
  $(this).hide();
  $(".boxmoxygentheme12").removeClass("editable");
 
  $(".editmoxygentheme12").hide();
  $(".imageUploadmoxygentheme12").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme12").change(function() {
$("#imageUploadmoxygentheme12").attr("name", "imageUploadmoxygentheme12");
    readURLoxy12(this);
});

});
function readURLoxy12(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme12", "imageUploadmoxygentheme12","#imagePreviewmoxygentheme12");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme12').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme13").hide();

$( ".boxmoxygentheme13" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme13").hasClass("editable")) {
    $(".editmoxygentheme13").hide();

   } 
   else
   {
    $(".editmoxygentheme13").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme13").hide();

});

 $(".editmoxygentheme13").click(function() {
  $(this).hide();
  $(".boxmoxygentheme13").addClass("editable");
   $(".editmoxygentheme13").hide();
  $(".savemoxygentheme13").show();
  $(".imageUploadmoxygentheme13").show();
});

$(".savemoxygentheme13").click(function() {
  $(this).hide();
  $(".boxmoxygentheme13").removeClass("editable");
 
  $(".editmoxygentheme13").hide();
  $(".imageUploadmoxygentheme13").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme13").change(function() {
$("#imageUploadmoxygentheme13").attr("name", "imageUploadmoxygentheme13");
    readURLoxy13(this);
});

});
function readURLoxy13(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme13", "imageUploadmoxygentheme13","#imagePreviewmoxygentheme13");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme13').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme14").hide();

$( ".boxmoxygentheme14" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme14").hasClass("editable")) {
    $(".editmoxygentheme14").hide();

   } 
   else
   {
    $(".editmoxygentheme14").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme14").hide();

});

 $(".editmoxygentheme14").click(function() {
  $(this).hide();
  $(".boxmoxygentheme14").addClass("editable");
   $(".editmoxygentheme14").hide();
  $(".savemoxygentheme14").show();
  $(".imageUploadmoxygentheme14").show();
});

$(".savemoxygentheme14").click(function() {
  $(this).hide();
  $(".boxmoxygentheme14").removeClass("editable");
 
  $(".editmoxygentheme14").hide();
  $(".imageUploadmoxygentheme14").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme14").change(function() {
$("#imageUploadmoxygentheme14").attr("name", "imageUploadmoxygentheme14");
    readURLoxy14(this);
});

});
function readURLoxy14(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme14", "imageUploadmoxygentheme14","#imagePreviewmoxygentheme14");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme14').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme15").hide();

$( ".boxmoxygentheme15" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme15").hasClass("editable")) {
    $(".editmoxygentheme15").hide();

   } 
   else
   {
    $(".editmoxygentheme15").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme15").hide();

});

 $(".editmoxygentheme15").click(function() {
  $(this).hide();
  $(".boxmoxygentheme15").addClass("editable");
   $(".editmoxygentheme15").hide();
  $(".savemoxygentheme15").show();
  $(".imageUploadmoxygentheme15").show();
});

$(".savemoxygentheme15").click(function() {
  $(this).hide();
  $(".boxmoxygentheme15").removeClass("editable");
 
  $(".editmoxygentheme15").hide();
  $(".imageUploadmoxygentheme15").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme15").change(function() {
$("#imageUploadmoxygentheme15").attr("name", "imageUploadmoxygentheme15");
    readURLoxy15(this);
});

});
function readURLoxy15(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme15", "imageUploadmoxygentheme15","#imagePreviewmoxygentheme15");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme15').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme16").hide();

$( ".boxmoxygentheme16" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme16").hasClass("editable")) {
    $(".editmoxygentheme16").hide();

   } 
   else
   {
    $(".editmoxygentheme16").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme16").hide();

});

 $(".editmoxygentheme16").click(function() {
  $(this).hide();
  $(".boxmoxygentheme16").addClass("editable");
   $(".editmoxygentheme16").hide();
  $(".savemoxygentheme16").show();
  $(".imageUploadmoxygentheme16").show();
});

$(".savemoxygentheme16").click(function() {
  $(this).hide();
  $(".boxmoxygentheme16").removeClass("editable");
 
  $(".editmoxygentheme16").hide();
  $(".imageUploadmoxygentheme16").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme16").change(function() {
$("#imageUploadmoxygentheme16").attr("name", "imageUploadmoxygentheme16");
    readURLoxy16(this);
});

});
function readURLoxy16(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme16", "imageUploadmoxygentheme16","#imagePreviewmoxygentheme16");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme16').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme17").hide();

$( ".boxmoxygentheme17" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme17").hasClass("editable")) {
    $(".editmoxygentheme17").hide();

   } 
   else
   {
    $(".editmoxygentheme17").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme17").hide();

});

 $(".editmoxygentheme17").click(function() {
  $(this).hide();
  $(".boxmoxygentheme17").addClass("editable");
   $(".editmoxygentheme17").hide();
  $(".savemoxygentheme17").show();
  $(".imageUploadmoxygentheme17").show();
});

$(".savemoxygentheme17").click(function() {
  $(this).hide();
  $(".boxmoxygentheme17").removeClass("editable");
 
  $(".editmoxygentheme17").hide();
  $(".imageUploadmoxygentheme17").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme17").change(function() {
$("#imageUploadmoxygentheme17").attr("name", "imageUploadmoxygentheme17");
    readURLoxy17(this);
});

});
function readURLoxy17(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme17", "imageUploadmoxygentheme17","#imagePreviewmoxygentheme17");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme17').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmoxygentheme18").hide();

$( ".boxmoxygentheme18" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme18").hasClass("editable")) {
    $(".editmoxygentheme18").hide();

   } 
   else
   {
    $(".editmoxygentheme18").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme18").hide();

});

 $(".editmoxygentheme18").click(function() {
  $(this).hide();
  $(".boxmoxygentheme18").addClass("editable");
   $(".editmoxygentheme18").hide();
  $(".savemoxygentheme18").show();
  $(".imageUploadmoxygentheme18").show();
});

$(".savemoxygentheme18").click(function() {
  $(this).hide();
  $(".boxmoxygentheme18").removeClass("editable");
 
  $(".editmoxygentheme18").hide();
  $(".imageUploadmoxygentheme18").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme18").change(function() {
$("#imageUploadmoxygentheme18").attr("name", "imageUploadmoxygentheme18");
    readURLoxy18(this);
});

});
function readURLoxy18(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme18", "imageUploadmoxygentheme18","#imagePreviewmoxygentheme18");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme18').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme19").hide();

$( ".boxmoxygentheme19" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme19").hasClass("editable")) {
    $(".editmoxygentheme19").hide();

   } 
   else
   {
    $(".editmoxygentheme19").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme19").hide();

});

 $(".editmoxygentheme19").click(function() {
  $(this).hide();
  $(".boxmoxygentheme19").addClass("editable");
   $(".editmoxygentheme19").hide();
  $(".savemoxygentheme19").show();
  $(".imageUploadmoxygentheme19").show();
});

$(".savemoxygentheme19").click(function() {
  $(this).hide();
  $(".boxmoxygentheme19").removeClass("editable");
 
  $(".editmoxygentheme19").hide();
  $(".imageUploadmoxygentheme19").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme19").change(function() {
$("#imageUploadmoxygentheme19").attr("name", "imageUploadmoxygentheme19");
    readURLoxy19(this);
});

});
function readURLoxy19(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme19", "imageUploadmoxygentheme19","#imagePreviewmoxygentheme19");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme19').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}







$(document).ready(function(){

   $(".imageUploadmoxygentheme21").hide();

$( ".boxmoxygentheme21" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme21").hasClass("editable")) {
    $(".editmoxygentheme21").hide();

   } 
   else
   {
    $(".editmoxygentheme21").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme21").hide();

});

 $(".editmoxygentheme21").click(function() {
  $(this).hide();
  $(".boxmoxygentheme21").addClass("editable");
   $(".editmoxygentheme21").hide();
  $(".savemoxygentheme21").show();
  $(".imageUploadmoxygentheme21").show();
});

$(".savemoxygentheme21").click(function() {
  $(this).hide();
  $(".boxmoxygentheme21").removeClass("editable");
 
  $(".editmoxygentheme21").hide();
  $(".imageUploadmoxygentheme21").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme21").change(function() {
$("#imageUploadmoxygentheme21").attr("name", "imageUploadmoxygentheme21");
    readURLoxy21(this);
});

});
function readURLoxy21(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme21", "imageUploadmoxygentheme21","#imagePreviewmoxygentheme21");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme21').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme22").hide();

$( ".boxmoxygentheme22" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme22").hasClass("editable")) {
    $(".editmoxygentheme22").hide();

   } 
   else
   {
    $(".editmoxygentheme22").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme22").hide();

});

 $(".editmoxygentheme22").click(function() {
  $(this).hide();
  $(".boxmoxygentheme22").addClass("editable");
   $(".editmoxygentheme22").hide();
  $(".savemoxygentheme22").show();
  $(".imageUploadmoxygentheme22").show();
});

$(".savemoxygentheme22").click(function() {
  $(this).hide();
  $(".boxmoxygentheme22").removeClass("editable");
 
  $(".editmoxygentheme22").hide();
  $(".imageUploadmoxygentheme22").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme22").change(function() {
$("#imageUploadmoxygentheme22").attr("name", "imageUploadmoxygentheme22");
    readURLoxy22(this);
});

});
function readURLoxy22(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme22", "imageUploadmoxygentheme22","#imagePreviewmoxygentheme22");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme22').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

   $(".imageUploadmoxygentheme23").hide();

$( ".boxmoxygentheme23" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme23").hasClass("editable")) {
    $(".editmoxygentheme23").hide();

   } 
   else
   {
    $(".editmoxygentheme23").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme23").hide();

});

 $(".editmoxygentheme23").click(function() {
  $(this).hide();
  $(".boxmoxygentheme23").addClass("editable");
   $(".editmoxygentheme23").hide();
  $(".savemoxygentheme23").show();
  $(".imageUploadmoxygentheme23").show();
});

$(".savemoxygentheme23").click(function() {
  $(this).hide();
  $(".boxmoxygentheme23").removeClass("editable");
 
  $(".editmoxygentheme23").hide();
  $(".imageUploadmoxygentheme23").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme23").change(function() {
$("#imageUploadmoxygentheme23").attr("name", "imageUploadmoxygentheme23");
    readURLoxy23(this);
});

});
function readURLoxy23(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme23", "imageUploadmoxygentheme23","#imagePreviewmoxygentheme23");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme23').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmoxygentheme24").hide();

$( ".boxmoxygentheme24" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme24").hasClass("editable")) {
    $(".editmoxygentheme24").hide();

   } 
   else
   {
    $(".editmoxygentheme24").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme24").hide();

});

 $(".editmoxygentheme24").click(function() {
  $(this).hide();
  $(".boxmoxygentheme24").addClass("editable");
   $(".editmoxygentheme24").hide();
  $(".savemoxygentheme24").show();
  $(".imageUploadmoxygentheme24").show();
});

$(".savemoxygentheme24").click(function() {
  $(this).hide();
  $(".boxmoxygentheme24").removeClass("editable");
 
  $(".editmoxygentheme24").hide();
  $(".imageUploadmoxygentheme24").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme24").change(function() {
$("#imageUploadmoxygentheme24").attr("name", "imageUploadmoxygentheme24");
    readURLoxy24(this);
});

});
function readURLoxy24(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme24", "imageUploadmoxygentheme24","#imagePreviewmoxygentheme24");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme24').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

  

$( ".boxmoxygentheme25" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme25").hasClass("editable")) {
    $(".editmoxygentheme25").hide();

   } 
   else
   {
    $(".editmoxygentheme25").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme25").hide();

});

 $(".editmoxygentheme25").click(function() {
  $(this).hide();
  $(".boxmoxygentheme25").addClass("editable");
  $(".textmoxygentheme25").attr("contenteditable", "true");
   $(".editmoxygentheme25").hide();
  $(".savemoxygentheme25").show();
 
});

$(".savemoxygentheme25").click(function() {
  $(this).hide();
  $(".boxmoxygentheme25").removeClass("editable");
 $(".textmoxygentheme25").removeAttr("contenteditable");
  $(".editmoxygentheme25").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});



$(document).ready(function(){

  

$( ".boxmoxygentheme26" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme26").hasClass("editable")) {
    $(".editmoxygentheme26").hide();

   } 
   else
   {
    $(".editmoxygentheme26").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme26").hide();

});

 $(".editmoxygentheme26").click(function() {
  $(this).hide();
  $(".boxmoxygentheme26").addClass("editable");
  $(".textmoxygentheme26").attr("contenteditable", "true");
   $(".editmoxygentheme26").hide();
  $(".savemoxygentheme26").show();
 
});

$(".savemoxygentheme26").click(function() {
  $(this).hide();
  $(".boxmoxygentheme26").removeClass("editable");
 $(".textmoxygentheme26").removeAttr("contenteditable");
  $(".editmoxygentheme26").hide();

Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");  
});
});



$(document).ready(function(){

  

$( ".boxmoxygentheme27" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme27").hasClass("editable")) {
    $(".editmoxygentheme27").hide();

   } 
   else
   {
    $(".editmoxygentheme27").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme27").hide();

});

 $(".editmoxygentheme27").click(function() {
  $(this).hide();
  $(".boxmoxygentheme27").addClass("editable");
  $(".textmoxygentheme27").attr("contenteditable", "true");
   $(".editmoxygentheme27").hide();
  $(".savemoxygentheme27").show();
 
});

$(".savemoxygentheme27").click(function() {
  $(this).hide();
  $(".boxmoxygentheme27").removeClass("editable");
 $(".textmoxygentheme27").removeAttr("contenteditable");
  $(".editmoxygentheme27").hide();

Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");  
});
});



$(document).ready(function(){

  

$( ".boxmoxygentheme28" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme28").hasClass("editable")) {
    $(".editmoxygentheme28").hide();

   } 
   else
   {
    $(".editmoxygentheme28").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme28").hide();

});

 $(".editmoxygentheme28").click(function() {
  $(this).hide();
  $(".boxmoxygentheme28").addClass("editable");
  $(".textmoxygentheme28").attr("contenteditable", "true");
   $(".editmoxygentheme28").hide();
  $(".savemoxygentheme28").show();
 
});

$(".savemoxygentheme28").click(function() {
  $(this).hide();
  $(".boxmoxygentheme28").removeClass("editable");
 $(".textmoxygentheme28").removeAttr("contenteditable");
  $(".editmoxygentheme28").hide();

  
});
});



$(document).ready(function(){

   $(".contmoxyfacebook29").hide();

   $( ".boxmoxygentheme29" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme29").hasClass("editable")) {
    $(".editmoxygentheme29").hide();

   } 
   else
   {
    $(".editmoxygentheme29").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme29").hide();

});


$(".editmoxygentheme29").click(function(e) {
 $(".boxmoxygentheme29").addClass("editable");

  
  
  $(".contmoxyfacebook29").show();

 
  
   //$(".boxmoxygentheme29").removeClass("editable");
   //$(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();



$(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();



});

$(".submitmoxyfacebook29").click(function() {
  $(".boxmoxygentheme29").removeClass("editable");
  $(".contmoxyfacebook29").hide();
addHrefoxy29();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy29() {
var inputmoxyfacebook29 = $('.inputmoxyfacebook29').val();
if(inputmoxyfacebook29 != ""){
  $('#hrefchangemoxyfacebook29').attr("href",inputmoxyfacebook29);
}
}




$(document).ready(function(){

   $(".contmoxyfacebook30").hide();

   $( ".boxmoxygentheme30" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme30").hasClass("editable")) {
    $(".editmoxygentheme30").hide();

   } 
   else
   {
    $(".editmoxygentheme30").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme30").hide();

});


$(".editmoxygentheme30").click(function(e) {
 $(".boxmoxygentheme30").addClass("editable");

  
  
  $(".contmoxyfacebook30").show();



   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   //$(".boxmoxygentheme30").removeClass("editable");
   //$(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




$(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();

 
});

$(".submitmoxyfacebook30").click(function() {
  $(".boxmoxygentheme30").removeClass("editable");
  $(".contmoxyfacebook30").hide();
addHrefoxy30();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy30() {
var inputmoxyfacebook30 = $('.inputmoxyfacebook30').val();
if(inputmoxyfacebook30 != ""){
  $('#hrefchangemoxyfacebook30').attr("href",inputmoxyfacebook30);
}
}



$(document).ready(function(){

   $(".contmoxyfacebook31").hide();

   $( ".boxmoxygentheme31" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme31").hasClass("editable")) {
    $(".editmoxygentheme31").hide();

   } 
   else
   {
    $(".editmoxygentheme31").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme31").hide();

});


$(".editmoxygentheme31").click(function(e) {
 $(".boxmoxygentheme31").addClass("editable");

  
  
  $(".contmoxyfacebook31").show();

 

   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  //$(".boxmoxygentheme31").removeClass("editable");
   //$(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




  $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();

});

$(".submitmoxyfacebook31").click(function() {
  $(".boxmoxygentheme31").removeClass("editable");
  $(".contmoxyfacebook31").hide();
addHrefoxy31();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy31() {
var inputmoxyfacebook31 = $('.inputmoxyfacebook31').val();
if(inputmoxyfacebook31 != ""){
  $('#hrefchangemoxyfacebook31').attr("href",inputmoxyfacebook31);
}
}



$(document).ready(function(){

   $(".contmoxyfacebook32").hide();

   $( ".boxmoxygentheme32" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme32").hasClass("editable")) {
    $(".editmoxygentheme32").hide();

   } 
   else
   {
    $(".editmoxygentheme32").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme32").hide();

});


$(".editmoxygentheme32").click(function(e) {
 $(".boxmoxygentheme32").addClass("editable");

  
  
  $(".contmoxyfacebook32").show();

 

   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




  //$(".boxmoxygentheme32").removeClass("editable");
   //$(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();



});

$(".submitmoxyfacebook32").click(function() {
  $(".boxmoxygentheme32").removeClass("editable");
  $(".contmoxyfacebook32").hide();
addHrefoxy32();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy32() {
var inputmoxyfacebook32 = $('.inputmoxyfacebook32').val();
if(inputmoxyfacebook32 != ""){
  $('#hrefchangemoxyfacebook32').attr("href",inputmoxyfacebook32);
}
}



$(document).ready(function(){

   $(".contmoxytwitter33").hide();

   $( ".boxmoxygentheme33" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme33").hasClass("editable")) {
    $(".editmoxygentheme33").hide();

   } 
   else
   {
    $(".editmoxygentheme33").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme33").hide();

});


$(".editmoxygentheme33").click(function(e) {
 $(".boxmoxygentheme33").addClass("editable");

  
  
  $(".contmoxytwitter33").show();


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   //$(".boxmoxygentheme33").removeClass("editable");
   //$(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();



 
});

$(".submitmoxytwitter33").click(function() {
  $(".boxmoxygentheme33").removeClass("editable");
  $(".contmoxytwitter33").hide();
addHrefoxy33();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy33() {
var inputmoxytwitter33 = $('.inputmoxytwitter33').val();
if(inputmoxytwitter33 != ""){
  $('#hrefchangemoxytwitter33').attr("href",inputmoxytwitter33);
}
}



$(document).ready(function(){

   $(".contmoxytwitter34").hide();

   $( ".boxmoxygentheme34" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme34").hasClass("editable")) {
    $(".editmoxygentheme34").hide();

   } 
   else
   {
    $(".editmoxygentheme34").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme34").hide();

});


$(".editmoxygentheme34").click(function(e) {
 $(".boxmoxygentheme34").addClass("editable");

  
  
  $(".contmoxytwitter34").show();

 



   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   //$(".boxmoxygentheme34").removeClass("editable");
   //$(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




});

$(".submitmoxytwitter34").click(function() {
  $(".boxmoxygentheme34").removeClass("editable");
  $(".contmoxytwitter34").hide();
addHrefoxy34();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy34() {
var inputmoxytwitter34 = $('.inputmoxytwitter34').val();
if(inputmoxytwitter34 != ""){
  $('#hrefchangemoxytwitter34').attr("href",inputmoxytwitter34);
}
}



$(document).ready(function(){

   $(".contmoxytwitter35").hide();

   $( ".boxmoxygentheme35" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme35").hasClass("editable")) {
    $(".editmoxygentheme35").hide();

   } 
   else
   {
    $(".editmoxygentheme35").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme35").hide();

});


$(".editmoxygentheme35").click(function(e) {
 $(".boxmoxygentheme35").addClass("editable");

  
  
  $(".contmoxytwitter35").show();

 


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   //$(".boxmoxygentheme35").removeClass("editable");
   //$(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




});

$(".submitmoxytwitter35").click(function() {
  $(".boxmoxygentheme35").removeClass("editable");
  $(".contmoxytwitter35").hide();
addHrefoxy35();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy35() {
var inputmoxytwitter35 = $('.inputmoxytwitter35').val();
if(inputmoxytwitter35 != ""){
  $('#hrefchangemoxytwitter35').attr("href",inputmoxytwitter35);
}
}


$(document).ready(function(){

   $(".contmoxytwitter36").hide();

   $( ".boxmoxygentheme36" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme36").hasClass("editable")) {
    $(".editmoxygentheme36").hide();

   } 
   else
   {
    $(".editmoxygentheme36").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme36").hide();

});


$(".editmoxygentheme36").click(function(e) {
 $(".boxmoxygentheme36").addClass("editable");

  
  
  $(".contmoxytwitter36").show();


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   //$(".boxmoxygentheme36").removeClass("editable");
   //$(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();

 
});

$(".submitmoxytwitter36").click(function() {
  $(".boxmoxygentheme36").removeClass("editable");
  $(".contmoxytwitter36").hide();
addHrefoxy36();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy36() {
var inputmoxytwitter36 = $('.inputmoxytwitter36').val();
if(inputmoxytwitter36 != ""){
  $('#hrefchangemoxytwitter36').attr("href",inputmoxytwitter36);
}
}



$(document).ready(function(){

   $(".contmoxylinkedin37").hide();

   $( ".boxmoxygentheme37" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme37").hasClass("editable")) {
    $(".editmoxygentheme37").hide();

   } 
   else
   {
    $(".editmoxygentheme37").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme37").hide();

});


$(".editmoxygentheme37").click(function(e) {
 $(".boxmoxygentheme37").addClass("editable");

  
  
  $(".contmoxylinkedin37").show();

 



   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

  //$(".boxmoxygentheme37").removeClass("editable");
   //$(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();



});

$(".submitmoxylinkedin37").click(function() {
  $(".boxmoxygentheme37").removeClass("editable");
  $(".contmoxylinkedin37").hide();
addHrefoxy37();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy37() {
var inputmoxylinkedin37 = $('.inputmoxylinkedin37').val();
if(inputmoxylinkedin37 != ""){
  $('#hrefchangemoxylinkedin37').attr("href",inputmoxylinkedin37);
}
}



$(document).ready(function(){

   $(".contmoxylinkedin38").hide();

   $( ".boxmoxygentheme38" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme38").hasClass("editable")) {
    $(".editmoxygentheme38").hide();

   } 
   else
   {
    $(".editmoxygentheme38").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme38").hide();

});


$(".editmoxygentheme38").click(function(e) {
 $(".boxmoxygentheme38").addClass("editable");

  
  
  $(".contmoxylinkedin38").show();



   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

   //$(".boxmoxygentheme38").removeClass("editable");
  //$(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();



 
});

$(".submitmoxylinkedin38").click(function() {
  $(".boxmoxygentheme38").removeClass("editable");
  $(".contmoxylinkedin38").hide();
addHrefoxy38();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy38() {
var inputmoxylinkedin38 = $('.inputmoxylinkedin38').val();
if(inputmoxylinkedin38 != ""){
  $('#hrefchangemoxylinkedin38').attr("href",inputmoxylinkedin38);
}
}



$(document).ready(function(){

   $(".contmoxylinkedin39").hide();

   $( ".boxmoxygentheme39" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme39").hasClass("editable")) {
    $(".editmoxygentheme39").hide();

   } 
   else
   {
    $(".editmoxygentheme39").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme39").hide();

});


$(".editmoxygentheme39").click(function(e) {
 $(".boxmoxygentheme39").addClass("editable");

  
  
  $(".contmoxylinkedin39").show();




   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    //$(".boxmoxygentheme39").removeClass("editable");
   //$(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();


 
});

$(".submitmoxylinkedin39").click(function() {
  $(".boxmoxygentheme39").removeClass("editable");
  $(".contmoxylinkedin39").hide();
addHrefoxy39();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy39() {
var inputmoxylinkedin39 = $('.inputmoxylinkedin39').val();
if(inputmoxylinkedin39 != ""){
  $('#hrefchangemoxylinkedin39').attr("href",inputmoxylinkedin39);
}
}



$(document).ready(function(){

   $(".contmoxylinkedin40").hide();

   $( ".boxmoxygentheme40" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme40").hasClass("editable")) {
    $(".editmoxygentheme40").hide();

   } 
   else
   {
    $(".editmoxygentheme40").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme40").hide();

});


$(".editmoxygentheme40").click(function(e) {
 $(".boxmoxygentheme40").addClass("editable");

  
  
  $(".contmoxylinkedin40").show();

 


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    //$(".boxmoxygentheme40").removeClass("editable");
   //$(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




});

$(".submitmoxylinkedin40").click(function() {
  $(".boxmoxygentheme40").removeClass("editable");
  $(".contmoxylinkedin40").hide();
addHrefoxy40();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy40() {
var inputmoxylinkedin40 = $('.inputmoxylinkedin40').val();
if(inputmoxylinkedin40 != ""){
  $('#hrefchangemoxylinkedin40').attr("href",inputmoxylinkedin40);
}
}

$(document).ready(function(){

   $(".contmoxydribbble41").hide();

   $( ".boxmoxygentheme41" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme41").hasClass("editable")) {
    $(".editmoxygentheme41").hide();

   } 
   else
   {
    $(".editmoxygentheme41").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme41").hide();

});


$(".editmoxygentheme41").click(function(e) {
 $(".boxmoxygentheme41").addClass("editable");

  
  
  $(".contmoxydribbble41").show();

 

   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   //$(".boxmoxygentheme41").removeClass("editable");
   //$(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




});

$(".submitmoxydribbble41").click(function() {
  $(".boxmoxygentheme41").removeClass("editable");
  $(".contmoxydribbble41").hide();
addHrefoxy41();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy41() {
var inputmoxydribbble41 = $('.inputmoxydribbble41').val();
if(inputmoxydribbble41 != ""){
  $('#hrefchangemoxydribbble41').attr("href",inputmoxydribbble41);
}
}


$(document).ready(function(){

   $(".contmoxydribbble42").hide();

   $( ".boxmoxygentheme42" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme42").hasClass("editable")) {
    $(".editmoxygentheme42").hide();

   } 
   else
   {
    $(".editmoxygentheme42").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme42").hide();

});


$(".editmoxygentheme42").click(function(e) {
 $(".boxmoxygentheme42").addClass("editable");

  
  
  $(".contmoxydribbble42").show();

 


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   //$(".boxmoxygentheme42").removeClass("editable");
   //$(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




});

$(".submitmoxydribbble42").click(function() {
  $(".boxmoxygentheme42").removeClass("editable");
  $(".contmoxydribbble42").hide();
addHrefoxy42();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy42() {
var inputmoxydribbble42 = $('.inputmoxydribbble42').val();
if(inputmoxydribbble42 != ""){
  $('#hrefchangemoxydribbble42').attr("href",inputmoxydribbble42);
}
}

$(document).ready(function(){

   $(".contmoxydribbble43").hide();

   $( ".boxmoxygentheme43" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme43").hasClass("editable")) {
    $(".editmoxygentheme43").hide();

   } 
   else
   {
    $(".editmoxygentheme43").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme43").hide();

});


$(".editmoxygentheme43").click(function(e) {
 $(".boxmoxygentheme43").addClass("editable");

  
  
  $(".contmoxydribbble43").show();




   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   //$(".boxmoxygentheme43").removeClass("editable");
   //$(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




 
});

$(".submitmoxydribbble43").click(function() {
  $(".boxmoxygentheme43").removeClass("editable");
  $(".contmoxydribbble43").hide();
addHrefoxy43();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy43() {
var inputmoxydribbble43 = $('.inputmoxydribbble43').val();
if(inputmoxydribbble43 != ""){
  $('#hrefchangemoxydribbble43').attr("href",inputmoxydribbble43);
}
}


$(document).ready(function(){

   $(".contmoxydribbble44").hide();

   $( ".boxmoxygentheme44" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme44").hasClass("editable")) {
    $(".editmoxygentheme44").hide();

   } 
   else
   {
    $(".editmoxygentheme44").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme44").hide();

});


$(".editmoxygentheme44").click(function(e) {
 $(".boxmoxygentheme44").addClass("editable");

  
  
  $(".contmoxydribbble44").show();

 


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   //$(".boxmoxygentheme44").removeClass("editable");
   //$(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




});

$(".submitmoxydribbble44").click(function() {
  $(".boxmoxygentheme44").removeClass("editable");
  $(".contmoxydribbble44").hide();
addHrefoxy44();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy44() {
var inputmoxydribbble44 = $('.inputmoxydribbble44').val();
if(inputmoxydribbble44 != ""){
  $('#hrefchangemoxydribbble44').attr("href",inputmoxydribbble44);
}
}



$(document).ready(function(){

   $(".contmoxyrss45").hide();

   $( ".boxmoxygentheme45" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme45").hasClass("editable")) {
    $(".editmoxygentheme45").hide();

   } 
   else
   {
    $(".editmoxygentheme45").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme45").hide();

});


$(".editmoxygentheme45").click(function(e) {
 $(".boxmoxygentheme45").addClass("editable");

  
  
  $(".contmoxyrss45").show();

 


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   //$(".boxmoxygentheme45").removeClass("editable");
   //$(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();



});

$(".submitmoxyrss45").click(function() {
  $(".boxmoxygentheme45").removeClass("editable");
  $(".contmoxyrss45").hide();
addHrefoxy45();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy45() {
var inputmoxyrss45 = $('.inputmoxyrss45').val();
if(inputmoxyrss45 != ""){
  $('#hrefchangemoxyrss45').attr("href",inputmoxyrss45);
}
}



$(document).ready(function(){

   $(".contmoxyrss46").hide();

   $( ".boxmoxygentheme46" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme46").hasClass("editable")) {
    $(".editmoxygentheme46").hide();

   } 
   else
   {
    $(".editmoxygentheme46").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme46").hide();

});


$(".editmoxygentheme46").click(function(e) {
 $(".boxmoxygentheme46").addClass("editable");

  
  
  $(".contmoxyrss46").show();



   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   //$(".boxmoxygentheme46").removeClass("editable");
   //$(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




 
});

$(".submitmoxyrss46").click(function() {
  $(".boxmoxygentheme46").removeClass("editable");
  $(".contmoxyrss46").hide();
addHrefoxy46();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy46() {
var inputmoxyrss46 = $('.inputmoxyrss46').val();
if(inputmoxyrss46 != ""){
  $('#hrefchangemoxyrss46').attr("href",inputmoxyrss46);
}
}


$(document).ready(function(){

   $(".contmoxyrss47").hide();

   $( ".boxmoxygentheme47" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme47").hasClass("editable")) {
    $(".editmoxygentheme47").hide();

   } 
   else
   {
    $(".editmoxygentheme47").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme47").hide();

});


$(".editmoxygentheme47").click(function(e) {
 $(".boxmoxygentheme47").addClass("editable");

  
  
  $(".contmoxyrss47").show();

 


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   //$(".boxmoxygentheme47").removeClass("editable");
  // $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   $(".boxmoxygentheme48").removeClass("editable");
   $(".contmoxyrss48").hide();




});

$(".submitmoxyrss47").click(function() {
  $(".boxmoxygentheme47").removeClass("editable");
  $(".contmoxyrss47").hide();
addHrefoxy47();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy47() {
var inputmoxyrss47 = $('.inputmoxyrss47').val();
if(inputmoxyrss47 != ""){
  $('#hrefchangemoxyrss47').attr("href",inputmoxyrss47);
}
}



$(document).ready(function(){

   $(".contmoxyrss48").hide();

   $( ".boxmoxygentheme48" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme48").hasClass("editable")) {
    $(".editmoxygentheme48").hide();

   } 
   else
   {
    $(".editmoxygentheme48").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme48").hide();

});


$(".editmoxygentheme48").click(function(e) {
 $(".boxmoxygentheme48").addClass("editable");

  
  
  $(".contmoxyrss48").show();

 


   $(".boxmoxygentheme29").removeClass("editable");
   $(".contmoxyfacebook29").hide();


   $(".boxmoxygentheme33").removeClass("editable");
   $(".contmoxytwitter33").hide();

    $(".boxmoxygentheme37").removeClass("editable");
   $(".contmoxylinkedin37").hide();

   $(".boxmoxygentheme41").removeClass("editable");
   $(".contmoxydribbble41").hide();

   $(".boxmoxygentheme45").removeClass("editable");
   $(".contmoxyrss45").hide();



   $(".boxmoxygentheme30").removeClass("editable");
   $(".contmoxyfacebook30").hide();


   $(".boxmoxygentheme34").removeClass("editable");
   $(".contmoxytwitter34").hide();

    $(".boxmoxygentheme38").removeClass("editable");
   $(".contmoxylinkedin38").hide();

   $(".boxmoxygentheme42").removeClass("editable");
   $(".contmoxydribbble42").hide();

   $(".boxmoxygentheme46").removeClass("editable");
   $(".contmoxyrss46").hide();




  $(".boxmoxygentheme31").removeClass("editable");
   $(".contmoxyfacebook31").hide();


   $(".boxmoxygentheme35").removeClass("editable");
   $(".contmoxytwitter35").hide();

    $(".boxmoxygentheme39").removeClass("editable");
   $(".contmoxylinkedin39").hide();

   $(".boxmoxygentheme43").removeClass("editable");
   $(".contmoxydribbble43").hide();

   $(".boxmoxygentheme47").removeClass("editable");
   $(".contmoxyrss47").hide();




   $(".boxmoxygentheme32").removeClass("editable");
   $(".contmoxyfacebook32").hide();


   $(".boxmoxygentheme36").removeClass("editable");
   $(".contmoxytwitter36").hide();

    $(".boxmoxygentheme40").removeClass("editable");
   $(".contmoxylinkedin40").hide();

   $(".boxmoxygentheme44").removeClass("editable");
   $(".contmoxydribbble44").hide();

   //$(".boxmoxygentheme48").removeClass("editable");
   //$(".contmoxyrss48").hide();





});

$(".submitmoxyrss48").click(function() {
  $(".boxmoxygentheme48").removeClass("editable");
  $(".contmoxyrss48").hide();
addHrefoxy48();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy48() {
var inputmoxyrss48 = $('.inputmoxyrss48').val();
if(inputmoxyrss48 != ""){
  $('#hrefchangemoxyrss48').attr("href",inputmoxyrss48);
}
}




$(document).ready(function(){

  

$( ".boxmoxygentheme49" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme49").hasClass("editable")) {
    $(".editmoxygentheme49").hide();

   } 
   else
   {
    $(".editmoxygentheme49").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme49").hide();

});

 $(".editmoxygentheme49").click(function() {
  $(this).hide();
  $(".boxmoxygentheme49").addClass("editable");
  $(".textmoxygentheme49").attr("contenteditable", "true");
   $(".editmoxygentheme49").hide();
  $(".savemoxygentheme49").show();
 
});

$(".savemoxygentheme49").click(function() {
  $(this).hide();
  $(".boxmoxygentheme49").removeClass("editable");
 $(".textmoxygentheme49").removeAttr("contenteditable");
  $(".editmoxygentheme49").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});





$(document).ready(function(){

   $(".imageUploadmoxygentheme50").hide();

$( ".boxmoxygentheme50" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme50").hasClass("editable")) {
    $(".editmoxygentheme50").hide();

   } 
   else
   {
    
   
    $(".editmoxygentheme50").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme50").hide();
 

});

 $(".editmoxygentheme50").click(function() {
  $(this).hide();
  $(".boxmoxygentheme50").addClass("editable");
   $(".editmoxygentheme50").hide();
  $(".savemoxygentheme50").show();
  $(".imageUploadmoxygentheme50").show();
});

$(".savemoxygentheme50").click(function() {
  $(this).hide();
  $(".boxmoxygentheme50").removeClass("editable");
 
  $(".editmoxygentheme50").hide();
  $(".imageUploadmoxygentheme50").hide();
 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});





$("#imageUploadmoxygentheme50").change(function() {
$("#imageUploadmoxygentheme50").attr("name", "imageUploadmoxygentheme50");
    readURLoxy50(this);
});

});
function readURLoxy50(input) {
   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmoxygentheme50", "imageUploadmoxygentheme50","#moxyfeatures");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('#moxyfeatures').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}






$(document).ready(function(){

  

$( ".boxmoxygentheme52" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme52").hasClass("editable")) {
    $(".editmoxygentheme52").hide();

   } 
   else
   {
    $(".editmoxygentheme52").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme52").hide();

});

 $(".editmoxygentheme52").click(function() {
  $(this).hide();
  $(".boxmoxygentheme52").addClass("editable");
  $(".textmoxygentheme52").attr("contenteditable", "true");
   $(".editmoxygentheme52").hide();
  $(".savemoxygentheme52").show();
 
});

$(".savemoxygentheme52").click(function() {
  $(this).hide();
  $(".boxmoxygentheme52").removeClass("editable");
 $(".textmoxygentheme52").removeAttr("contenteditable");
  $(".editmoxygentheme52").hide();

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}"); 
});
});



$(document).ready(function(){

  

$( ".boxmoxygentheme53" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme53").hasClass("editable")) {
    $(".editmoxygentheme53").hide();

   } 
   else
   {
    $(".editmoxygentheme53").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme53").hide();

});

 $(".editmoxygentheme53").click(function() {
  $(this).hide();
  $(".boxmoxygentheme53").addClass("editable");
  $(".textmoxygentheme53").attr("contenteditable", "true");
   $(".editmoxygentheme53").hide();
  $(".savemoxygentheme53").show();
 
});

$(".savemoxygentheme53").click(function() {
  $(this).hide();
  $(".boxmoxygentheme53").removeClass("editable");
 $(".textmoxygentheme53").removeAttr("contenteditable");
  $(".editmoxygentheme53").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmoxygentheme54" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme54").hasClass("editable")) {
    $(".editmoxygentheme54").hide();

   } 
   else
   {
    $(".editmoxygentheme54").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme54").hide();

});

 $(".editmoxygentheme54").click(function() {
  $(this).hide();
  $(".boxmoxygentheme54").addClass("editable");
  $(".textmoxygentheme54").attr("contenteditable", "true");
   $(".editmoxygentheme54").hide();
  $(".savemoxygentheme54").show();
 
});

$(".savemoxygentheme54").click(function() {
  $(this).hide();
  $(".boxmoxygentheme54").removeClass("editable");
 $(".textmoxygentheme54").removeAttr("contenteditable");
  $(".editmoxygentheme54").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});


$(document).ready(function(){

  

$( ".boxmoxygentheme55" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme55").hasClass("editable")) {
    $(".editmoxygentheme55").hide();

   } 
   else
   {
    $(".editmoxygentheme55").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme55").hide();

});

 $(".editmoxygentheme55").click(function() {
  $(this).hide();
  $(".boxmoxygentheme55").addClass("editable");
  $(".textmoxygentheme55").attr("contenteditable", "true");
   $(".editmoxygentheme55").hide();
  $(".savemoxygentheme55").show();
 
});

$(".savemoxygentheme55").click(function() {
  $(this).hide();
  $(".boxmoxygentheme55").removeClass("editable");
 $(".textmoxygentheme55").removeAttr("contenteditable");
  $(".editmoxygentheme55").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});







$(document).ready(function(){

   $(".imageUploadmoxygentheme57").hide();

$( ".boxmoxygentheme57" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme57").hasClass("editable")) {
    $(".editmoxygentheme57").hide();

   } 
   else
   {
    $(".editmoxygentheme57").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme57").hide();

});

 $(".editmoxygentheme57").click(function() {
  $(this).hide();
  $(".boxmoxygentheme57").addClass("editable");
   $(".editmoxygentheme57").hide();
  $(".savemoxygentheme57").show();
  $(".imageUploadmoxygentheme57").show();
});

$(".savemoxygentheme57").click(function() {
  $(this).hide();
  $(".boxmoxygentheme57").removeClass("editable");
 
  $(".editmoxygentheme57").hide();
  $(".imageUploadmoxygentheme57").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme57").change(function() {
$("#imageUploadmoxygentheme57").attr("name", "imageUploadmoxygentheme57");    
    readURLoxy57(this);
});

});
function readURLoxy57(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme57", "imageUploadmoxygentheme57","#imagePreviewmoxygentheme57");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme57').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmoxygentheme58").hide();

$( ".boxmoxygentheme58" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme58").hasClass("editable")) {
    $(".editmoxygentheme58").hide();

   } 
   else
   {
    $(".editmoxygentheme58").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme58").hide();

});

 $(".editmoxygentheme58").click(function() {
  $(this).hide();
  $(".boxmoxygentheme58").addClass("editable");
   $(".editmoxygentheme58").hide();
  $(".savemoxygentheme58").show();
  $(".imageUploadmoxygentheme58").show();
});

$(".savemoxygentheme58").click(function() {
  $(this).hide();
  $(".boxmoxygentheme58").removeClass("editable");
 
  $(".editmoxygentheme58").hide();
  $(".imageUploadmoxygentheme58").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme58").change(function() {
$("#imageUploadmoxygentheme58").attr("name", "imageUploadmoxygentheme58");
    readURLoxy58(this);
});

});
function readURLoxy58(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme58", "imageUploadmoxygentheme58","#imagePreviewmoxygentheme58");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme58').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmoxygentheme59").hide();

$( ".boxmoxygentheme59" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme59").hasClass("editable")) {
    $(".editmoxygentheme59").hide();

   } 
   else
   {
    $(".editmoxygentheme59").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme59").hide();

});

 $(".editmoxygentheme59").click(function() {
  $(this).hide();
  $(".boxmoxygentheme59").addClass("editable");
   $(".editmoxygentheme59").hide();
  $(".savemoxygentheme59").show();
  $(".imageUploadmoxygentheme59").show();
});

$(".savemoxygentheme59").click(function() {
  $(this).hide();
  $(".boxmoxygentheme59").removeClass("editable");
 
  $(".editmoxygentheme59").hide();
  $(".imageUploadmoxygentheme59").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme59").change(function() {
$("#imageUploadmoxygentheme59").attr("name", "imageUploadmoxygentheme59");
    readURLoxy59(this);
});

});
function readURLoxy59(input) {

var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme59", "imageUploadmoxygentheme59","#imagePreviewmoxygentheme59");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme59').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme60").hide();

$( ".boxmoxygentheme60" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme60").hasClass("editable")) {
    $(".editmoxygentheme60").hide();

   } 
   else
   {
    $(".editmoxygentheme60").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme60").hide();

});

 $(".editmoxygentheme60").click(function() {
  $(this).hide();
  $(".boxmoxygentheme60").addClass("editable");
   $(".editmoxygentheme60").hide();
  $(".savemoxygentheme60").show();
  $(".imageUploadmoxygentheme60").show();
});

$(".savemoxygentheme60").click(function() {
  $(this).hide();
  $(".boxmoxygentheme60").removeClass("editable");
 
  $(".editmoxygentheme60").hide();
  $(".imageUploadmoxygentheme60").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme60").change(function() {
$("#imageUploadmoxygentheme60").attr("name", "imageUploadmoxygentheme60");
    readURLoxy60(this);
});

});
function readURLoxy60(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme60", "imageUploadmoxygentheme60","#imagePreviewmoxygentheme60");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme60').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmoxygentheme61").hide();

$( ".boxmoxygentheme61" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme61").hasClass("editable")) {
    $(".editmoxygentheme61").hide();

   } 
   else
   {
    $(".editmoxygentheme61").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme61").hide();

});

 $(".editmoxygentheme61").click(function() {
  $(this).hide();
  $(".boxmoxygentheme61").addClass("editable");
   $(".editmoxygentheme61").hide();
  $(".savemoxygentheme61").show();
  $(".imageUploadmoxygentheme61").show();
});

$(".savemoxygentheme61").click(function() {
  $(this).hide();
  $(".boxmoxygentheme61").removeClass("editable");
 
  $(".editmoxygentheme61").hide();
  $(".imageUploadmoxygentheme61").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme61").change(function() {
$("#imageUploadmoxygentheme61").attr("name", "imageUploadmoxygentheme61");
    readURLoxy61(this);
});

});
function readURLoxy61(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme61", "imageUploadmoxygentheme61","#imagePreviewmoxygentheme61");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme61').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}


$(document).ready(function(){

  

$( ".boxmoxygentheme62" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme62").hasClass("editable")) {
    $(".editmoxygentheme62").hide();

   } 
   else
   {
    $(".editmoxygentheme62").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme62").hide();

});

 $(".editmoxygentheme62").click(function() {
  $(this).hide();
  $(".boxmoxygentheme62").addClass("editable");
  $(".textmoxygentheme62").attr("contenteditable", "true");
   $(".editmoxygentheme62").hide();
  $(".savemoxygentheme62").show();
 
});

$(".savemoxygentheme62").click(function() {
  $(this).hide();
  $(".boxmoxygentheme62").removeClass("editable");
 $(".textmoxygentheme62").removeAttr("contenteditable");
  $(".editmoxygentheme62").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmoxygentheme63" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme63").hasClass("editable")) {
    $(".editmoxygentheme63").hide();

   } 
   else
   {
    $(".editmoxygentheme63").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme63").hide();

});

 $(".editmoxygentheme63").click(function() {
  $(this).hide();
  $(".boxmoxygentheme63").addClass("editable");
  $(".textmoxygentheme63").attr("contenteditable", "true");
   $(".editmoxygentheme63").hide();
  $(".savemoxygentheme63").show();
 
});

$(".savemoxygentheme63").click(function() {
  $(this).hide();
  $(".boxmoxygentheme63").removeClass("editable");
 $(".textmoxygentheme63").removeAttr("contenteditable");
  $(".editmoxygentheme63").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmoxygentheme64" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme64").hasClass("editable")) {
    $(".editmoxygentheme64").hide();

   } 
   else
   {
    $(".editmoxygentheme64").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme64").hide();

});

 $(".editmoxygentheme64").click(function() {
  $(this).hide();
  $(".boxmoxygentheme64").addClass("editable");
  $(".textmoxygentheme64").attr("contenteditable", "true");
   $(".editmoxygentheme64").hide();
  $(".savemoxygentheme64").show();
 
});

$(".savemoxygentheme64").click(function() {
  $(this).hide();
  $(".boxmoxygentheme64").removeClass("editable");
 $(".textmoxygentheme64").removeAttr("contenteditable");
  $(".editmoxygentheme64").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmoxygentheme65" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme65").hasClass("editable")) {
    $(".editmoxygentheme65").hide();

   } 
   else
   {
    $(".editmoxygentheme65").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme65").hide();

});

 $(".editmoxygentheme65").click(function() {
  $(this).hide();
  $(".boxmoxygentheme65").addClass("editable");
  $(".textmoxygentheme65").attr("contenteditable", "true");
   $(".editmoxygentheme65").hide();
  $(".savemoxygentheme65").show();
 
});

$(".savemoxygentheme65").click(function() {
  $(this).hide();
  $(".boxmoxygentheme65").removeClass("editable");
 $(".textmoxygentheme65").removeAttr("contenteditable");
  $(".editmoxygentheme65").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});



$(document).ready(function(){

  

$( ".boxmoxygentheme66" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme66").hasClass("editable")) {
    $(".editmoxygentheme66").hide();

   } 
   else
   {
    $(".editmoxygentheme66").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme66").hide();

});

 $(".editmoxygentheme66").click(function() {
  $(this).hide();
  $(".boxmoxygentheme66").addClass("editable");
  $(".textmoxygentheme66").attr("contenteditable", "true");
   $(".editmoxygentheme66").hide();
  $(".savemoxygentheme66").show();
 
});

$(".savemoxygentheme66").click(function() {
  $(this).hide();
  $(".boxmoxygentheme66").removeClass("editable");
 $(".textmoxygentheme66").removeAttr("contenteditable");
  $(".editmoxygentheme66").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

  

$( ".boxmoxygentheme67" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme67").hasClass("editable")) {
    $(".editmoxygentheme67").hide();

   } 
   else
   {
    $(".editmoxygentheme67").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme67").hide();

});

 $(".editmoxygentheme67").click(function() {
  $(this).hide();
  $(".boxmoxygentheme67").addClass("editable");
  $(".textmoxygentheme67").attr("contenteditable", "true");
   $(".editmoxygentheme67").hide();
  $(".savemoxygentheme67").show();
 
});

$(".savemoxygentheme67").click(function() {
  $(this).hide();
  $(".boxmoxygentheme67").removeClass("editable");
 $(".textmoxygentheme67").removeAttr("contenteditable");
  $(".editmoxygentheme67").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmoxygentheme68" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme68").hasClass("editable")) {
    $(".editmoxygentheme68").hide();

   } 
   else
   {
    $(".editmoxygentheme68").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme68").hide();

});

 $(".editmoxygentheme68").click(function() {
  $(this).hide();
  $(".boxmoxygentheme68").addClass("editable");
  $(".textmoxygentheme68").attr("contenteditable", "true");
   $(".editmoxygentheme68").hide();
  $(".savemoxygentheme68").show();
 
});

$(".savemoxygentheme68").click(function() {
  $(this).hide();
  $(".boxmoxygentheme68").removeClass("editable");
 $(".textmoxygentheme68").removeAttr("contenteditable");
  $(".editmoxygentheme68").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

  

$( ".boxmoxygentheme69" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme69").hasClass("editable")) {
    $(".editmoxygentheme69").hide();

   } 
   else
   {
    $(".editmoxygentheme69").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme69").hide();

});

 $(".editmoxygentheme69").click(function() {
  $(this).hide();
  $(".boxmoxygentheme69").addClass("editable");
  $(".textmoxygentheme69").attr("contenteditable", "true");
   $(".editmoxygentheme69").hide();
  $(".savemoxygentheme69").show();
 
});

$(".savemoxygentheme69").click(function() {
  $(this).hide();
  $(".boxmoxygentheme69").removeClass("editable");
 $(".textmoxygentheme69").removeAttr("contenteditable");
  $(".editmoxygentheme69").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});





$(document).ready(function(){

   $(".imageUploadmoxygentheme70").hide();

$( ".boxmoxygentheme70" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme70").hasClass("editable")) {
    $(".editmoxygentheme70").hide();

   } 
   else
   {
    
   
    $(".editmoxygentheme70").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme70").hide();
 

});

 $(".editmoxygentheme70").click(function() {
  $(this).hide();
  $(".boxmoxygentheme70").addClass("editable");
   $(".editmoxygentheme70").hide();
  $(".savemoxygentheme70").show();
  $(".imageUploadmoxygentheme70").show();
});

$(".savemoxygentheme70").click(function() {
  $(this).hide();
  $(".boxmoxygentheme70").removeClass("editable");
 
  $(".editmoxygentheme70").hide();
  $(".imageUploadmoxygentheme70").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme70").change(function() {
$("#imageUploadmoxygentheme70").attr("name", "imageUploadmoxygentheme70");
    readURLoxy70(this);
});

});
function readURLoxy70(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmoxygentheme70", "imageUploadmoxygentheme70","#moxycontact-us");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('#moxycontact-us').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}



$(document).ready(function(){

   $(".imageUploadmoxygentheme71").hide();

$( ".boxmoxygentheme71" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme71").hasClass("editable")) {
    $(".editmoxygentheme71").hide();

   } 
   else
   {
    $(".editmoxygentheme71").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme71").hide();

});

 $(".editmoxygentheme71").click(function() {
  $(this).hide();
  $(".boxmoxygentheme71").addClass("editable");
   $(".editmoxygentheme71").hide();
  $(".savemoxygentheme71").show();
  $(".imageUploadmoxygentheme71").show();
});

$(".savemoxygentheme71").click(function() {
  $(this).hide();
  $(".boxmoxygentheme71").removeClass("editable");
 
  $(".editmoxygentheme71").hide();
  $(".imageUploadmoxygentheme71").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme71").change(function() {
$("#imageUploadmoxygentheme71").attr("name", "imageUploadmoxygentheme71");
    readURLoxy71(this);
});

});
function readURLoxy71(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmoxygentheme71", "imageUploadmoxygentheme71","#imagePreviewmoxygentheme71");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmoxygentheme71').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}






$(document).ready(function(){

   $(".contmoxyenvelope72").hide();

   $( ".boxmoxygentheme72" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme72").hasClass("editable")) {
    $(".editmoxygentheme72").hide();

   } 
   else
   {
    $(".editmoxygentheme72").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme72").hide();

});


$(".editmoxygentheme72").click(function(e) {
 $(".boxmoxygentheme72").addClass("editable");

  
  
  $(".contmoxyenvelope72").show();
  //$(".boxmoxygentheme72").removeClass("editable");
  // $(".contmoxyenvelope72").hide();
   $(".boxmoxygentheme73").removeClass("editable");
   $(".contmoxytwitter73").hide();
   $(".boxmoxygentheme74").removeClass("editable");
   $(".contmoxydribbble74").hide();
   $(".boxmoxygentheme75").removeClass("editable");
   $(".contmoxyfacebook75").hide();
   $(".boxmoxygentheme76").removeClass("editable");
   $(".contmoxylinkedin76").hide();
   $(".boxmoxygentheme77").removeClass("editable");
   $(".contmoxytumblrsquare77").hide();
 
});

$(".submitmoxyenvelope72").click(function() {
  $(".boxmoxygentheme72").removeClass("editable");
  $(".contmoxyenvelope72").hide();
addHrefoxy72();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy72() {
var inputmoxyenvelope72 = $('.inputmoxyenvelope72').val();
if(inputmoxyenvelope72 != ""){
  $('#hrefchangemoxyenvelope72').attr("href",inputmoxyenvelope72);
}
}




$(document).ready(function(){

   $(".contmoxytwitter73").hide();

   $( ".boxmoxygentheme73" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme73").hasClass("editable")) {
    $(".editmoxygentheme73").hide();

   } 
   else
   {
    $(".editmoxygentheme73").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme73").hide();

});


$(".editmoxygentheme73").click(function(e) {
 $(".boxmoxygentheme73").addClass("editable");

  
  
  $(".contmoxytwitter73").show();
  $(".boxmoxygentheme72").removeClass("editable");
   $(".contmoxyenvelope72").hide();
   //$(".boxmoxygentheme73").removeClass("editable");
   //$(".contmoxytwitter73").hide();
   $(".boxmoxygentheme74").removeClass("editable");
   $(".contmoxydribbble74").hide();
   $(".boxmoxygentheme75").removeClass("editable");
   $(".contmoxyfacebook75").hide();
   $(".boxmoxygentheme76").removeClass("editable");
   $(".contmoxylinkedin76").hide();
   $(".boxmoxygentheme77").removeClass("editable");
   $(".contmoxytumblrsquare77").hide();
 
});

$(".submitmoxytwitter73").click(function() {
  $(".boxmoxygentheme73").removeClass("editable");
  $(".contmoxytwitter73").hide();
addHrefoxy73();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy73() {
var inputmoxytwitter73 = $('.inputmoxytwitter73').val();
if(inputmoxytwitter73 != ""){
  $('#hrefchangemoxytwitter73').attr("href",inputmoxytwitter73);
}
}




$(document).ready(function(){

   $(".contmoxydribbble74").hide();

   $( ".boxmoxygentheme74" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme74").hasClass("editable")) {
    $(".editmoxygentheme74").hide();

   } 
   else
   {
    $(".editmoxygentheme74").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme74").hide();

});


$(".editmoxygentheme74").click(function(e) {
 $(".boxmoxygentheme74").addClass("editable");

  
  $(".contmoxydribbble74").show();

  $(".boxmoxygentheme72").removeClass("editable");
   $(".contmoxyenvelope72").hide();
   $(".boxmoxygentheme73").removeClass("editable");
   $(".contmoxytwitter73").hide();
   //$(".boxmoxygentheme74").removeClass("editable");
  // $(".contmoxydribbble74").hide();
   $(".boxmoxygentheme75").removeClass("editable");
   $(".contmoxyfacebook75").hide();
   $(".boxmoxygentheme76").removeClass("editable");
   $(".contmoxylinkedin76").hide();
   $(".boxmoxygentheme77").removeClass("editable");
   $(".contmoxytumblrsquare77").hide();

 
});

$(".submitmoxydribbble74").click(function() {
  $(".boxmoxygentheme74").removeClass("editable");
  $(".contmoxydribbble74").hide();

addHrefoxy74();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy74() {
var inputmoxydribbble74 = $('.inputmoxydribbble74').val();
if(inputmoxydribbble74 != ""){
  $('#hrefchangemoxydribbble74').attr("href",inputmoxydribbble74);
}
}





$(document).ready(function(){

   $(".contmoxyfacebook75").hide();

   $( ".boxmoxygentheme75" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme75").hasClass("editable")) {
    $(".editmoxygentheme75").hide();

   } 
   else
   {
    $(".editmoxygentheme75").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme75").hide();

});


$(".editmoxygentheme75").click(function(e) {
 $(".boxmoxygentheme75").addClass("editable");

  
  
  $(".contmoxyfacebook75").show();
$(".boxmoxygentheme72").removeClass("editable");
   $(".contmoxyenvelope72").hide();
   $(".boxmoxygentheme73").removeClass("editable");
   $(".contmoxytwitter73").hide();
   $(".boxmoxygentheme74").removeClass("editable");
   $(".contmoxydribbble74").hide();
   //$(".boxmoxygentheme75").removeClass("editable");
   //$(".contmoxyfacebook75").hide();
   $(".boxmoxygentheme76").removeClass("editable");
   $(".contmoxylinkedin76").hide();
   $(".boxmoxygentheme77").removeClass("editable");
   $(".contmoxytumblrsquare77").hide();
 
});

$(".submitmoxyfacebook75").click(function() {
  $(".boxmoxygentheme75").removeClass("editable");
  $(".contmoxyfacebook75").hide();
addHrefoxy75();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy75() {
var inputmoxyfacebook75 = $('.inputmoxyfacebook75').val();
if(inputmoxyfacebook75 != ""){

  $('#hrefchangemoxyfacebook75').attr("href",inputmoxyfacebook75);
}
}





$(document).ready(function(){

   $(".contmoxylinkedin76").hide();

   $( ".boxmoxygentheme76" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme76").hasClass("editable")) {
    $(".editmoxygentheme76").hide();

   } 
   else
   {
    $(".editmoxygentheme76").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme76").hide();

});


$(".editmoxygentheme76").click(function(e) {
 $(".boxmoxygentheme76").addClass("editable");

  
  
  $(".contmoxylinkedin76").show();
  $(".boxmoxygentheme72").removeClass("editable");
   $(".contmoxyenvelope72").hide();
   $(".boxmoxygentheme73").removeClass("editable");
   $(".contmoxytwitter73").hide();
   $(".boxmoxygentheme74").removeClass("editable");
   $(".contmoxydribbble74").hide();
   $(".boxmoxygentheme75").removeClass("editable");
   $(".contmoxyfacebook75").hide();
  // $(".boxmoxygentheme76").removeClass("editable");
   //$(".contmoxylinkedin76").hide();
   $(".boxmoxygentheme77").removeClass("editable");
   $(".contmoxytumblrsquare77").hide();
 
});

$(".submitmoxylinkedin76").click(function() {
  $(".boxmoxygentheme76").removeClass("editable");
  $(".contmoxylinkedin76").hide();
addHrefoxy76();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy76() {
var inputmoxylinkedin76 = $('.inputmoxylinkedin76').val();
if(inputmoxylinkedin76 != ""){
  $('#hrefchangemoxylinkedin76').attr("href",inputmoxylinkedin76);
}
}




$(document).ready(function(){

   $(".contmoxytumblrsquare77").hide();

   $( ".boxmoxygentheme77" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme77").hasClass("editable")) {
    $(".editmoxygentheme77").hide();

   } 
   else
   {
    $(".editmoxygentheme77").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme77").hide();

});


$(".editmoxygentheme77").click(function(e) {
 $(".boxmoxygentheme77").addClass("editable");

  
  
  $(".contmoxytumblrsquare77").show();
$(".boxmoxygentheme72").removeClass("editable");
   $(".contmoxyenvelope72").hide();
   $(".boxmoxygentheme73").removeClass("editable");
   $(".contmoxytwitter73").hide();
   $(".boxmoxygentheme74").removeClass("editable");
   $(".contmoxydribbble74").hide();
   $(".boxmoxygentheme75").removeClass("editable");
   $(".contmoxyfacebook75").hide();
   $(".boxmoxygentheme76").removeClass("editable");
   $(".contmoxylinkedin76").hide();
   //$(".boxmoxygentheme77").removeClass("editable");
   //$(".contmoxytumblrsquare77").hide();
 
});

$(".submitmoxytumblrsquare77").click(function() {
  $(".boxmoxygentheme77").removeClass("editable");
  $(".contmoxytumblrsquare77").hide();
addHrefoxy77();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});

 
});

function addHrefoxy77() {
var inputmoxytumblrsquare77 = $('.inputmoxytumblrsquare77').val();
if(inputmoxytumblrsquare77 != ""){
  $('#hrefchangemoxytumblrsquare77').attr("href",inputmoxytumblrsquare77);
}
}










$(document).ready(function(){

   $(".imageUploadmoxygentheme79").hide();

$( ".boxmoxygentheme79" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme79").hasClass("editable")) {
    $(".editmoxygentheme79").hide();

   } 
   else
   {
    
   
    $(".editmoxygentheme79").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme79").hide();
 

});

 $(".editmoxygentheme79").click(function() {
  $(this).hide();
  $(".boxmoxygentheme79").addClass("editable");
   $(".editmoxygentheme79").hide();
  $(".savemoxygentheme79").show();
  $(".imageUploadmoxygentheme79").show();
});

$(".savemoxygentheme79").click(function() {
  $(this).hide();
  $(".boxmoxygentheme79").removeClass("editable");
 
  $(".editmoxygentheme79").hide();
  $(".imageUploadmoxygentheme79").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme79").change(function() {
$("#imageUploadmoxygentheme79").attr("name", "imageUploadmoxygentheme79");
    readURLoxy79(this);
});

});
function readURLoxy79(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmoxygentheme79", "imageUploadmoxygentheme79",".boxmoxygentheme79");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.boxmoxygentheme79').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmoxygentheme80").hide();

$( ".boxmoxygentheme80" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme80").hasClass("editable")) {
    $(".editmoxygentheme80").hide();

   } 
   else
   {
    
   
    $(".editmoxygentheme80").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme80").hide();
 

});

 $(".editmoxygentheme80").click(function() {
  $(this).hide();
  $(".boxmoxygentheme80").addClass("editable");
   $(".editmoxygentheme80").hide();
  $(".savemoxygentheme80").show();
  $(".imageUploadmoxygentheme80").show();
});

$(".savemoxygentheme80").click(function() {
  $(this).hide();
  $(".boxmoxygentheme80").removeClass("editable");
 
  $(".editmoxygentheme80").hide();
  $(".imageUploadmoxygentheme80").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmoxygentheme80").change(function() {
$("#imageUploadmoxygentheme80").attr("name", "imageUploadmoxygentheme80");
    readURLoxy80(this);
});

});
function readURLoxy80(input) {
  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmoxygentheme80", "imageUploadmoxygentheme80",".boxmoxygentheme80");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.boxmoxygentheme80').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

  $(".contpurmoxygentheme81").hide(); 

$( ".boxmoxygentheme81" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme81").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme81").hide();
   } 
   else
   {
  
    $(".editcontpurmoxygentheme81").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurmoxygentheme81").hide();

});

 




 $(".editcontpurmoxygentheme81").click(function() {
   $(".boxmoxygentheme81").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme81").show(); 
 
});

  $(".submitcontpurmoxygentheme81").click(function() {
  
  $(".contpurmoxygentheme81").hide();
   $(".boxmoxygentheme81").removeClass("editable");
addmoxyfontawesomecontpur81();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur81() {
var inputcontpurmoxygentheme81 = $('.inputcontpurmoxygentheme81').val();
 $('#purmoxy1').removeClass();
  $('#purmoxy1').addClass(inputcontpurmoxygentheme81);
  if(inputcontpurmoxygentheme81 == "")
  {
    $('.service-icon1').css('font-size','0px');
  }
  else
  {
    $('.service-icon1').css('font-size','36px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme82").hide(); 

$( ".boxmoxygentheme82" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme82").hasClass("editable")) {
    
    $(".editcontpurmoxygentheme82").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme82").show();
   }
  
})
.on("mouseleave", function() {
  
  
   $(".editcontpurmoxygentheme82").hide();

});

 




 $(".editcontpurmoxygentheme82").click(function() {
   $(".boxmoxygentheme82").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme82").show(); 
 
});

  $(".submitcontpurmoxygentheme82").click(function() {
  
  $(".contpurmoxygentheme82").hide();
   $(".boxmoxygentheme82").removeClass("editable");
addmoxyfontawesomecontpur82();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur82() {
var inputcontpurmoxygentheme82 = $('.inputcontpurmoxygentheme82').val();
 $('#purmoxy2').removeClass();
 $('#purmoxy2').addClass(inputcontpurmoxygentheme82);
  if(inputcontpurmoxygentheme82 == "")
  {
    $('.service-icon2').css('font-size','0px');
  }
  else
  {
    $('.service-icon2').css('font-size','36px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme83").hide(); 

$( ".boxmoxygentheme83" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme83").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme83").hide();
   } 
   else
   {
   
    $(".editcontpurmoxygentheme83").show();
   }
  
})
.on("mouseleave", function() {
  
  
   $(".editcontpurmoxygentheme83").hide();

});

 


 $(".editcontpurmoxygentheme83").click(function() {
   $(".boxmoxygentheme83").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme83").show(); 
 
});

  $(".submitcontpurmoxygentheme83").click(function() {
  
  $(".contpurmoxygentheme83").hide();
   $(".boxmoxygentheme83").removeClass("editable");
addmoxyfontawesomecontpur83();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur83() {
var inputcontpurmoxygentheme83 = $('.inputcontpurmoxygentheme83').val();
 $('#purmoxy3').removeClass();
  $('#purmoxy3').addClass(inputcontpurmoxygentheme83);
  if(inputcontpurmoxygentheme83 == "")
  {
    $('.service-icon3').css('font-size','0px');
  }
  else
  {
    $('.service-icon3').css('font-size','36px');
  }
}





$(document).ready(function(){

  $(".contpurmoxygentheme84").hide(); 

$( ".boxmoxygentheme84" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme84").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme84").hide();
   } 
   else
   {
  
    $(".editcontpurmoxygentheme84").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurmoxygentheme84").hide();

});

 


 $(".editcontpurmoxygentheme84").click(function() {
   $(".boxmoxygentheme84").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme84").show(); 
 
});

  $(".submitcontpurmoxygentheme84").click(function() {
  
  $(".contpurmoxygentheme84").hide();
   $(".boxmoxygentheme84").removeClass("editable");
addmoxyfontawesomecontpur84();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur84() {
var inputcontpurmoxygentheme84 = $('.inputcontpurmoxygentheme84').val();
 $('#purmoxy4').removeClass();
  $('#purmoxy4').addClass(inputcontpurmoxygentheme84);
  if(inputcontpurmoxygentheme84 == "")
  {
    $('.service-icon4').css('font-size','0px');
  }
  else
  {
    $('.service-icon4').css('font-size','36px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme85").hide(); 

$( ".boxmoxygentheme85" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme85").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme85").hide();
   } 
   else
   {
   
    $(".editcontpurmoxygentheme85").show();
   }
  
})
.on("mouseleave", function() {
  
  
   $(".editcontpurmoxygentheme85").hide();

});

 


 $(".editcontpurmoxygentheme85").click(function() {
   $(".boxmoxygentheme85").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme85").show(); 
 
});

  $(".submitcontpurmoxygentheme85").click(function() {
  
  $(".contpurmoxygentheme85").hide();
   $(".boxmoxygentheme85").removeClass("editable");
addmoxyfontawesomecontpur85();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur85() {
var inputcontpurmoxygentheme85 = $('.inputcontpurmoxygentheme85').val();
 $('#purmoxy5').removeClass();
  $('#purmoxy5').addClass(inputcontpurmoxygentheme85);
  if(inputcontpurmoxygentheme85 == "")
  {
    $('.service-icon5').css('font-size','0px');
  }
  else
  {
    $('.service-icon5').css('font-size','36px');
  }
}





$(document).ready(function(){

  $(".contpurmoxygentheme86").hide(); 

$( ".boxmoxygentheme86" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme86").hasClass("editable")) {
  
    $(".editcontpurmoxygentheme86").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme86").show();
   }
  
})
.on("mouseleave", function() {
  
  
   $(".editcontpurmoxygentheme86").hide();

});

 

 $(".editcontpurmoxygentheme86").click(function() {
   $(".boxmoxygentheme86").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme86").show(); 
 
});

  $(".submitcontpurmoxygentheme86").click(function() {
  
  $(".contpurmoxygentheme86").hide();
   $(".boxmoxygentheme86").removeClass("editable");
addmoxyfontawesomecontpur86();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur86() {
var inputcontpurmoxygentheme86 = $('.inputcontpurmoxygentheme86').val();
 $('#purmoxy6').removeClass();
  $('#purmoxy6').addClass(inputcontpurmoxygentheme86);
  if(inputcontpurmoxygentheme86 == "")
  {
    $('.service-icon6').css('font-size','0px');
  }
  else
  {
    $('.service-icon6').css('font-size','36px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme87").hide(); 

$( ".boxmoxygentheme87" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme87").hasClass("editable")) {
  
    $(".editcontpurmoxygentheme87").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme87").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurmoxygentheme87").hide();

});




 $(".editcontpurmoxygentheme87").click(function() {
   $(".boxmoxygentheme87").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme87").show(); 
 
});

  $(".submitcontpurmoxygentheme87").click(function() {
  
  $(".contpurmoxygentheme87").hide();
   $(".boxmoxygentheme87").removeClass("editable");
addmoxyfontawesomecontpur87();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur87() {
var inputcontpurmoxygentheme87 = $('.inputcontpurmoxygentheme87').val();
 $('#purmoxy7').removeClass();
  $('#purmoxy7').addClass(inputcontpurmoxygentheme87);
  if(inputcontpurmoxygentheme87 == "")
  {
    $('.icon1').css('font-size','0px');
  }
  else
  {
    $('.icon1').css('font-size','36px');
  }
}







$(document).ready(function(){
     
 $(".boxmoxygentheme88").removeClass("editable");
  $(".contpresentationcolormoxygentheme88").hide(); 

$( ".boxmoxygentheme88" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme88").hasClass("editable")) {
    $(".editmoxygentheme88").hide();
    $(".editpresentationcolormoxygentheme88").hide();

   } 
   else
   {
    $(".editmoxygentheme88").show();
    $(".editpresentationcolormoxygentheme88").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme88").hide();
   $(".editpresentationcolormoxygentheme88").hide();
});

 $(".editmoxygentheme88").click(function() {
  $(this).hide();
  $(".boxmoxygentheme88").addClass("editable");
  $(".textmoxygentheme88").attr("contenteditable", "true");
   $(".editmoxygentheme88").hide();
  $(".savemoxygentheme88").show();
 
});

  $(".editpresentationcolormoxygentheme88").click(function() {
    $(".boxmoxygentheme88").addClass("editable");
  $(".editpresentationcolormoxygentheme88").hide();
  $(".contpresentationcolormoxygentheme88").show(); 


});

  $(".submitpresentationcolormoxygentheme88").click(function() {
  
  $(".contpresentationcolormoxygentheme88").hide();
   $(".boxmoxygentheme88").removeClass("editable");
moxyaddpresentationcolor88();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savemoxygentheme88").click(function() {
  $(this).hide();
  $(".boxmoxygentheme88").removeClass("editable");
 $(".textmoxygentheme88").removeAttr("contenteditable");
  $(".editmoxygentheme88").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function moxyaddpresentationcolor88() {
var inputpresentationcolormoxygentheme88 = $('.inputpresentationcolormoxygentheme88').val();
  $('section#moxyteam, section#moxyteam .moxytheme').css("background",inputpresentationcolormoxygentheme88);
}






$(document).ready(function(){
     
 $(".boxmoxygentheme89").removeClass("editable");
  $(".contpresentationcolormoxygentheme89").hide(); 

$( ".boxmoxygentheme89" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme89").hasClass("editable")) {
    $(".editmoxygentheme89").hide();
    $(".editpresentationcolormoxygentheme89").hide();

   } 
   else
   {
    $(".editmoxygentheme89").show();
    $(".editpresentationcolormoxygentheme89").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme89").hide();
   $(".editpresentationcolormoxygentheme89").hide();
});

 $(".editmoxygentheme89").click(function() {
  $(this).hide();
  $(".boxmoxygentheme89").addClass("editable");
  $(".textmoxygentheme89").attr("contenteditable", "true");
   $(".editmoxygentheme89").hide();
  $(".savemoxygentheme89").show();
 
});

  $(".editpresentationcolormoxygentheme89").click(function() {
    $(".boxmoxygentheme89").addClass("editable");
  $(".editpresentationcolormoxygentheme89").hide();
  $(".contpresentationcolormoxygentheme89").show(); 


});

  $(".submitpresentationcolormoxygentheme89").click(function() {
  
  $(".contpresentationcolormoxygentheme89").hide();
   $(".boxmoxygentheme89").removeClass("editable");
moxyaddpresentationcolor89();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savemoxygentheme89").click(function() {
  $(this).hide();
  $(".boxmoxygentheme89").removeClass("editable");
 $(".textmoxygentheme89").removeAttr("contenteditable");
  $(".editmoxygentheme89").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function moxyaddpresentationcolor89() {
var inputpresentationcolormoxygentheme89 = $('.inputpresentationcolormoxygentheme89').val();
  $('#moxyportfolio, #moxyportfolio .moxytheme').css("background",inputpresentationcolormoxygentheme89);
}






$(document).ready(function(){
     
 $(".boxmoxygentheme90").removeClass("editable");
  $(".contpresentationcolormoxygentheme90").hide(); 

$( ".boxmoxygentheme90" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme90").hasClass("editable")) {
    $(".editmoxygentheme90").hide();
    $(".editpresentationcolormoxygentheme90").hide();

   } 
   else
   {
    $(".editmoxygentheme90").show();
    $(".editpresentationcolormoxygentheme90").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme90").hide();
   $(".editpresentationcolormoxygentheme90").hide();
});

 $(".editmoxygentheme90").click(function() {
  $(this).hide();
  $(".boxmoxygentheme90").addClass("editable");
  $(".textmoxygentheme90").attr("contenteditable", "true");
   $(".editmoxygentheme90").hide();
  $(".savemoxygentheme90").show();
 
});

  $(".editpresentationcolormoxygentheme90").click(function() {
    $(".boxmoxygentheme90").addClass("editable");
  $(".editpresentationcolormoxygentheme90").hide();
  $(".contpresentationcolormoxygentheme90").show(); 


});

  $(".submitpresentationcolormoxygentheme90").click(function() {
  
  $(".contpresentationcolormoxygentheme90").hide();
   $(".boxmoxygentheme90").removeClass("editable");
moxyaddpresentationcolor90();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savemoxygentheme90").click(function() {
  $(this).hide();
  $(".boxmoxygentheme90").removeClass("editable");
 $(".textmoxygentheme90").removeAttr("contenteditable");
  $(".editmoxygentheme90").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function moxyaddpresentationcolor90() {
var inputpresentationcolormoxygentheme90 = $('.inputpresentationcolormoxygentheme90').val();
  $('.moxypresentation90').css("background",inputpresentationcolormoxygentheme90);
}




$(document).ready(function(){
     
 $(".boxmoxygentheme91").removeClass("editable");
  $(".contpresentationcolormoxygentheme91").hide(); 

$( ".boxmoxygentheme91" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme91").hasClass("editable")) {
    $(".editmoxygentheme91").hide();
    $(".editpresentationcolormoxygentheme91").hide();

   } 
   else
   {
    $(".editmoxygentheme91").show();
    $(".editpresentationcolormoxygentheme91").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme91").hide();
   $(".editpresentationcolormoxygentheme91").hide();
});

 $(".editmoxygentheme91").click(function() {
  $(this).hide();
  $(".boxmoxygentheme91").addClass("editable");
  $(".textmoxygentheme91").attr("contenteditable", "true");
   $(".editmoxygentheme91").hide();
  $(".savemoxygentheme91").show();
 
});

  $(".editpresentationcolormoxygentheme91").click(function() {
    $(".boxmoxygentheme91").addClass("editable");
  $(".editpresentationcolormoxygentheme91").hide();
  $(".contpresentationcolormoxygentheme91").show(); 


});

  $(".submitpresentationcolormoxygentheme91").click(function() {
  
  $(".contpresentationcolormoxygentheme91").hide();
   $(".boxmoxygentheme91").removeClass("editable");
moxyaddpresentationcolor91();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savemoxygentheme91").click(function() {
  $(this).hide();
  $(".boxmoxygentheme91").removeClass("editable");
 $(".textmoxygentheme91").removeAttr("contenteditable");
  $(".editmoxygentheme91").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function moxyaddpresentationcolor91() {
var inputpresentationcolormoxygentheme91 = $('.inputpresentationcolormoxygentheme91').val();
  $('section#moxypricing, section#moxypricing .moxytheme').css("background",inputpresentationcolormoxygentheme91);
}





$(document).ready(function(){
     
 $(".boxmoxygentheme92").removeClass("editable");
  $(".contpresentationcolormoxygentheme92").hide(); 

$( ".boxmoxygentheme92" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme92").hasClass("editable")) {
    $(".editmoxygentheme92").hide();
    $(".editpresentationcolormoxygentheme92").hide();

   } 
   else
   {
    $(".editmoxygentheme92").show();
    $(".editpresentationcolormoxygentheme92").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme92").hide();
   $(".editpresentationcolormoxygentheme92").hide();
});

 $(".editmoxygentheme92").click(function() {
  $(this).hide();
  $(".boxmoxygentheme92").addClass("editable");
  $(".textmoxygentheme92").attr("contenteditable", "true");
   $(".editmoxygentheme92").hide();
  $(".savemoxygentheme92").show();
 
});

  $(".editpresentationcolormoxygentheme92").click(function() {
    $(".boxmoxygentheme92").addClass("editable");
  $(".editpresentationcolormoxygentheme92").hide();
  $(".contpresentationcolormoxygentheme92").show(); 


});

  $(".submitpresentationcolormoxygentheme92").click(function() {
  
  $(".contpresentationcolormoxygentheme92").hide();
   $(".boxmoxygentheme92").removeClass("editable");
moxyaddpresentationcolor92();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savemoxygentheme92").click(function() {
  $(this).hide();
  $(".boxmoxygentheme92").removeClass("editable");
 $(".textmoxygentheme92").removeAttr("contenteditable");
  $(".editmoxygentheme92").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function moxyaddpresentationcolor92() {
var inputpresentationcolormoxygentheme92 = $('.inputpresentationcolormoxygentheme92').val();
  $('section#moxyservices, section#moxyservices .moxytheme').css("background",inputpresentationcolormoxygentheme92);
}





$(document).ready(function(){

  $(".contpurmoxygentheme93").hide(); 

$( ".boxmoxygentheme93" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme93").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme93").hide();
   } 
   else
   {
   
    $(".editcontpurmoxygentheme93").show();
   }
  
})
.on("mouseleave", function() {
  

   $(".editcontpurmoxygentheme93").hide();

});

 


 $(".editcontpurmoxygentheme93").click(function() {
   $(".boxmoxygentheme93").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme93").show(); 
 
});

  $(".submitcontpurmoxygentheme93").click(function() {
  
  $(".contpurmoxygentheme93").hide();
   $(".boxmoxygentheme93").removeClass("editable");
addmoxyfontawesomecontpur93();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur93() {
var inputcontpurmoxygentheme93 = $('.inputcontpurmoxygentheme93').val();
 $('#purmoxy8').removeClass();
  $('#purmoxy8').addClass(inputcontpurmoxygentheme93);
  if(inputcontpurmoxygentheme93 == "")
  {
    $('.icon2').css('font-size','0px');
  }
  else
  {
    $('.icon2').css('font-size','36px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme94").hide(); 

$( ".boxmoxygentheme94" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme94").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme94").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme94").show();
   }
  
})
.on("mouseleave", function() {
  
  
   $(".editcontpurmoxygentheme94").hide();

});

 


 $(".editcontpurmoxygentheme94").click(function() {
   $(".boxmoxygentheme94").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme94").show(); 
 
});

  $(".submitcontpurmoxygentheme94").click(function() {
  
  $(".contpurmoxygentheme94").hide();
   $(".boxmoxygentheme94").removeClass("editable");
addmoxyfontawesomecontpur94();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur94() {
var inputcontpurmoxygentheme94 = $('.inputcontpurmoxygentheme94').val();
 $('#purmoxy9').removeClass();
  $('#purmoxy9').addClass(inputcontpurmoxygentheme94);
  if(inputcontpurmoxygentheme94 == "")
  {
    $('.icon3').css('font-size','0px');
  }
  else
  {
    $('.icon3').css('font-size','36px');
  }
}







$(document).ready(function(){

  $(".contpurmoxygentheme95").hide(); 

$( ".boxmoxygentheme95" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme95").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme95").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme95").show();
   }
  
})
.on("mouseleave", function() {
  
  
   $(".editcontpurmoxygentheme95").hide();

});

 


 $(".editcontpurmoxygentheme95").click(function() {
   $(".boxmoxygentheme95").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme95").show(); 
 
});

  $(".submitcontpurmoxygentheme95").click(function() {
  
  $(".contpurmoxygentheme95").hide();
   $(".boxmoxygentheme95").removeClass("editable");
addmoxyfontawesomecontpur95();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur95() {
var inputcontpurmoxygentheme95 = $('.inputcontpurmoxygentheme95').val();
 $('#purmoxy10').removeClass();
  $('#purmoxy10').addClass(inputcontpurmoxygentheme95);
  if(inputcontpurmoxygentheme95 == "")
  {
    $('.icon4').css('font-size','0px');
  }
  else
  {
    $('.icon4').css('font-size','36px');
  }
}





$(document).ready(function(){

  $(".contpurmoxygentheme96").hide(); 

$( ".boxmoxygentheme96" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme96").hasClass("editable")) {
  
    $(".editcontpurmoxygentheme96").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme96").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurmoxygentheme96").hide();

});

 

 $(".editcontpurmoxygentheme96").click(function() {
   $(".boxmoxygentheme96").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme96").show(); 
 
});

  $(".submitcontpurmoxygentheme96").click(function() {
  
  $(".contpurmoxygentheme96").hide();
   $(".boxmoxygentheme96").removeClass("editable");
addmoxyfontawesomecontpur96();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur96() {
var inputcontpurmoxygentheme96 = $('.inputcontpurmoxygentheme96').val();
 $('#purmoxy11').removeClass();
  $('#purmoxy11').addClass(inputcontpurmoxygentheme96);
  if(inputcontpurmoxygentheme96 == "")
  {
    $('.icon5').css('font-size','0px');
  }
  else
  {
    $('.icon5').css('font-size','36px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme97").hide(); 

$( ".boxmoxygentheme97" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme97").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme97").hide();
   } 
   else
   {
   
    $(".editcontpurmoxygentheme97").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurmoxygentheme97").hide();

});



 $(".editcontpurmoxygentheme97").click(function() {
   $(".boxmoxygentheme97").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme97").show(); 
 
});

  $(".submitcontpurmoxygentheme97").click(function() {
  
  $(".contpurmoxygentheme97").hide();
   $(".boxmoxygentheme97").removeClass("editable");
addmoxyfontawesomecontpur97();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur97() {
var inputcontpurmoxygentheme97 = $('.inputcontpurmoxygentheme97').val();
 $('#purmoxy12').removeClass();
  $('#purmoxy12').addClass(inputcontpurmoxygentheme97);
  if(inputcontpurmoxygentheme97 == "")
  {
    $('.icon6').css('font-size','0px');
  }
  else
  {
    $('.icon6').css('font-size','14px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme98").hide(); 

$( ".boxmoxygentheme98" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme98").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme98").hide();
   } 
   else
   {
   
    $(".editcontpurmoxygentheme98").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurmoxygentheme98").hide();

});

 

 $(".editcontpurmoxygentheme98").click(function() {
   $(".boxmoxygentheme98").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme98").show(); 
 
});

  $(".submitcontpurmoxygentheme98").click(function() {
  
  $(".contpurmoxygentheme98").hide();
   $(".boxmoxygentheme98").removeClass("editable");
addmoxyfontawesomecontpur98();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur98() {
var inputcontpurmoxygentheme98 = $('.inputcontpurmoxygentheme98').val();
 $('#purmoxy13').removeClass();
  $('#purmoxy13').addClass(inputcontpurmoxygentheme98);
  if(inputcontpurmoxygentheme98 == "")
  {
    $('.icon7').css('font-size','0px');
  }
  else
  {
    $('.icon7').css('font-size','14px');
  }
}







$(document).ready(function(){

  $(".contpurmoxygentheme99").hide(); 

$( ".boxmoxygentheme99" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme99").hasClass("editable")) {
    
    $(".editcontpurmoxygentheme99").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme99").show();
   }
  
})
.on("mouseleave", function() {
  
  
   $(".editcontpurmoxygentheme99").hide();

});

 


 $(".editcontpurmoxygentheme99").click(function() {
   $(".boxmoxygentheme99").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme99").show(); 
 
});

  $(".submitcontpurmoxygentheme99").click(function() {
  
  $(".contpurmoxygentheme99").hide();
   $(".boxmoxygentheme99").removeClass("editable");
addmoxyfontawesomecontpur99();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur99() {
var inputcontpurmoxygentheme99 = $('.inputcontpurmoxygentheme99').val();
 $('#purmoxy14').removeClass();
  $('#purmoxy14').addClass(inputcontpurmoxygentheme99);
  if(inputcontpurmoxygentheme99 == "")
  {
    $('.icon8').css('font-size','0px');
  }
  else
  {
    $('.icon8').css('font-size','14px');
  }
}






$(document).ready(function(){

  $(".contpurmoxygentheme100").hide(); 

$( ".boxmoxygentheme100" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme100").hasClass("editable")) {
   
    $(".editcontpurmoxygentheme100").hide();
   } 
   else
   {
    
    $(".editcontpurmoxygentheme100").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurmoxygentheme100").hide();

});

 


 $(".editcontpurmoxygentheme100").click(function() {
   $(".boxmoxygentheme100").addClass("editable");
  $(this).hide();
  $(".contpurmoxygentheme100").show(); 
 
});

  $(".submitcontpurmoxygentheme100").click(function() {
  
  $(".contpurmoxygentheme100").hide();
   $(".boxmoxygentheme100").removeClass("editable");
addmoxyfontawesomecontpur100();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addmoxyfontawesomecontpur100() {
var inputcontpurmoxygentheme100 = $('.inputcontpurmoxygentheme100').val();
 $('#purmoxy15').removeClass();
  $('#purmoxy15').addClass(inputcontpurmoxygentheme100);
  if(inputcontpurmoxygentheme100 == "")
  {
    $('.icon9').css('font-size','0px');
  }
  else
  {
    $('.icon9').css('font-size','14px');
  }
}







$(document).ready(function(){
     
 $(".boxmoxygentheme101").removeClass("editable");
  $(".contpresentationcolormoxygentheme101").hide(); 

$( ".boxmoxygentheme101" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme101").hasClass("editable")) {
    
    $(".editpresentationcolormoxygentheme101").hide();

   } 
   else
   {
   
    $(".editpresentationcolormoxygentheme101").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editpresentationcolormoxygentheme101").hide();
});

 

  $(".editpresentationcolormoxygentheme101").click(function() {
    $(".boxmoxygentheme101").addClass("editable");
  $(".editpresentationcolormoxygentheme101").hide();
  $(".contpresentationcolormoxygentheme101").show(); 


});

  $(".submitpresentationcolormoxygentheme101").click(function() {
  
  $(".contpresentationcolormoxygentheme101").hide();
   $(".boxmoxygentheme101").removeClass("editable");
moxyaddpresentationcolor101();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});


});

function moxyaddpresentationcolor101() {
var inputpresentationcolormoxygentheme101 = $('.inputpresentationcolormoxygentheme101').val();
  $('.moxytheme.footer-top').css("background",inputpresentationcolormoxygentheme101);
  $('#moxyfooter').css("background",inputpresentationcolormoxygentheme101);
}





$(document).ready(function(){
     
 $(".boxmoxygentheme102").removeClass("editable");
  $(".contpresentationcolormoxygentheme102").hide(); 

$( ".boxmoxygentheme102" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme102").hasClass("editable")) {
    $(".editmoxygentheme102").hide();
    $(".editpresentationcolormoxygentheme102").hide();

   } 
   else
   {
    $(".editmoxygentheme102").show();
    $(".editpresentationcolormoxygentheme102").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme102").hide();
   $(".editpresentationcolormoxygentheme102").hide();
});

 $(".editmoxygentheme102").click(function() {
  $(this).hide();
  $(".boxmoxygentheme102").addClass("editable");
  $(".textmoxygentheme102").attr("contenteditable", "true");
   $(".editmoxygentheme102").hide();
  $(".savemoxygentheme102").show();
 
});

  $(".editpresentationcolormoxygentheme102").click(function() {
    $(".boxmoxygentheme102").addClass("editable");
  $(".editpresentationcolormoxygentheme102").hide();
  $(".contpresentationcolormoxygentheme102").show(); 


});

  $(".submitpresentationcolormoxygentheme102").click(function() {
  
  $(".contpresentationcolormoxygentheme102").hide();
   $(".boxmoxygentheme102").removeClass("editable");
moxyaddpresentationcolor102();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");

  
});

$(".savemoxygentheme102").click(function() {
  $(this).hide();
  $(".boxmoxygentheme102").removeClass("editable");
 $(".textmoxygentheme102").removeAttr("contenteditable");
  $(".editmoxygentheme102").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function moxyaddpresentationcolor102() {
var inputpresentationcolormoxygentheme102 = $('.inputpresentationcolormoxygentheme102').val();
  $('.moxypresentation102').css("background",inputpresentationcolormoxygentheme102);
}






$(document).ready(function(){

   $(".contmoxybg1").hide();

   $( ".boxmoxygentheme111" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme111").hasClass("editable")) {
    $(".bgmoxygentheme1").hide();

   } 
   else
   {
    $(".bgmoxygentheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmoxygentheme1").hide();

});


$(".bgmoxygentheme1").click(function(e) {
 $(".boxmoxygentheme111").addClass("editable");

  
  
  $(".contmoxybg1").show();


});

$(".submitmoxybg1").click(function() {
  $(".boxmoxygentheme111").removeClass("editable");
  $(".contmoxybg1").hide();
  addHrefoxy1();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy1() {
var inputmoxybg1 = $('.inputmoxybg1').val();
if(inputmoxybg1 != ""){

  $('.boxmoxygentheme111').css('background-image', 'url('+inputmoxybg1 +')');
}
}





$(document).ready(function(){

   $(".contmoxybg2").hide();

   $( ".boxmoxygentheme222" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme222").hasClass("editable")) {
    $(".bgmoxygentheme2").hide();

   } 
   else
   {
    $(".bgmoxygentheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmoxygentheme2").hide();

});


$(".bgmoxygentheme2").click(function(e) {
 $(".boxmoxygentheme222").addClass("editable");

  
  
  $(".contmoxybg2").show();


});

$(".submitmoxybg2").click(function() {
  $(".boxmoxygentheme222").removeClass("editable");
  $(".contmoxybg2").hide();
  addHrefoxy2();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy2() {
var inputmoxybg2 = $('.inputmoxybg2').val();
if(inputmoxybg2 != ""){
  $('.boxmoxygentheme222').css('background-image', 'url('+inputmoxybg2 +')');
}
}







$(document).ready(function(){

   $(".contmoxybg3").hide();

   $( ".boxmoxygentheme333" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme333").hasClass("editable")) {
    $(".bgmoxygentheme3").hide();

   } 
   else
   {
    $(".bgmoxygentheme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmoxygentheme3").hide();

});


$(".bgmoxygentheme3").click(function(e) {
 $(".boxmoxygentheme333").addClass("editable");

  
  
  $(".contmoxybg3").show();


});

$(".submitmoxybg3").click(function() {
  $(".boxmoxygentheme333").removeClass("editable");
  $(".contmoxybg3").hide();
  addHrefoxy3();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy3() {
var inputmoxybg3 = $('.inputmoxybg3').val();
if(inputmoxybg3 != ""){
  $('.boxmoxygentheme333').css('background-image', 'url('+inputmoxybg3 +')');
}

}






$(document).ready(function(){

   $(".contmoxybg80").hide();

   $( ".boxmoxygentheme80a" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme80a").hasClass("editable")) {
    $(".bgmoxygentheme80").hide();

   } 
   else
   {
    $(".bgmoxygentheme80").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmoxygentheme80").hide();

});


$(".bgmoxygentheme80").click(function(e) {
 $(".boxmoxygentheme80a").addClass("editable");

  
  
  $(".contmoxybg80").show();


});

$(".submitmoxybg80").click(function() {
  $(".boxmoxygentheme80a").removeClass("editable");
  $(".contmoxybg80").hide();
  addHrefoxy80();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy80() {
var inputmoxybg80 = $('.inputmoxybg80').val();
if(inputmoxybg80 != ""){
  $('.boxmoxygentheme80a').css('background-image', 'url('+inputmoxybg80 +')');
}
}





$(document).ready(function(){

   $(".contmoxybg50").hide();

   $( ".boxmoxygentheme50a" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme50a").hasClass("editable")) {
    $(".bgmoxygentheme50").hide();

   } 
   else
   {
    $(".bgmoxygentheme50").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmoxygentheme50").hide();

});


$(".bgmoxygentheme50").click(function(e) {
 $(".boxmoxygentheme50a").addClass("editable");

  
  
  $(".contmoxybg50").show();


});

$(".submitmoxybg50").click(function() {
  $(".boxmoxygentheme50a").removeClass("editable");
  $(".contmoxybg50").hide();
  addHrefoxy50();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy50() {
var inputmoxybg50 = $('.inputmoxybg50').val();
if(inputmoxybg50 != ""){
  $('.boxmoxygentheme50a').css('background-image', 'url('+inputmoxybg50 +')');
}
}








$(document).ready(function(){

   $(".contmoxybg79").hide();

   $( ".boxmoxygentheme79a" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme79a").hasClass("editable")) {
    $(".bgmoxygentheme79").hide();

   } 
   else
   {
    $(".bgmoxygentheme79").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmoxygentheme79").hide();

});


$(".bgmoxygentheme79").click(function(e) {
 $(".boxmoxygentheme79a").addClass("editable");

  
  
  $(".contmoxybg79").show();


});

$(".submitmoxybg79").click(function() {
  $(".boxmoxygentheme79a").removeClass("editable");
  $(".contmoxybg79").hide();
  addHrefoxy79();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy79() {
var inputmoxybg79 = $('.inputmoxybg79').val();
if(inputmoxybg79 != ""){
  $('.boxmoxygentheme79a').css('background-image', 'url('+inputmoxybg79 +')');
}
}







$(document).ready(function(){

   $(".contmoxybg70").hide();

   $( ".boxmoxygentheme70a" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme70a").hasClass("editable")) {
    $(".bgmoxygentheme70").hide();

   } 
   else
   {
    $(".bgmoxygentheme70").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmoxygentheme70").hide();

});


$(".bgmoxygentheme70").click(function(e) {
 $(".boxmoxygentheme70a").addClass("editable");

  
  
  $(".contmoxybg70").show();


});

$(".submitmoxybg70").click(function() {
  $(".boxmoxygentheme70a").removeClass("editable");
  $(".contmoxybg70").hide();
  addHrefoxy70();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy70() {
var inputmoxybg70 = $('.inputmoxybg70').val();
if(inputmoxybg70 != ""){
  $('.boxmoxygentheme70a').css('background-image', 'url('+inputmoxybg70 +')');
}
}








$(document).ready(function(){

   $(".contmoxysingup103").hide();

   $( ".boxmoxygentheme103" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme103").hasClass("editable")) {
    $(".editmoxygentheme103").hide();

   } 
   else
   {
    $(".editmoxygentheme103").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme103").hide();

});


$(".editmoxygentheme103").click(function(e) {
 $(".boxmoxygentheme103").addClass("editable");

  
  
  $(".contmoxysingup103").show();
  
 
});

$(".submitmoxysingup103").click(function() {
  $(".boxmoxygentheme103").removeClass("editable");
  $(".contmoxysingup103").hide();
addHrefoxy103();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy103() {
var inputmoxysingup103 = $('.inputmoxysingup103').val();
if(inputmoxysingup103 != ""){
  $('#hrefchangemoxysingup103').attr("href",inputmoxysingup103);
}
}





$(document).ready(function(){

   $(".contmoxysingup104").hide();

   $( ".boxmoxygentheme104" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme104").hasClass("editable")) {
    $(".editmoxygentheme104").hide();

   } 
   else
   {
    $(".editmoxygentheme104").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme104").hide();

});


$(".editmoxygentheme104").click(function(e) {
 $(".boxmoxygentheme104").addClass("editable");

  
  
  $(".contmoxysingup104").show();
  
 
});

$(".submitmoxysingup104").click(function() {
  $(".boxmoxygentheme104").removeClass("editable");
  $(".contmoxysingup104").hide();
addHrefoxy104();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy104() {
var inputmoxysingup104 = $('.inputmoxysingup104').val();
if(inputmoxysingup104 != ""){
  $('#hrefchangemoxysingup104').attr("href",inputmoxysingup104);
}
}




$(document).ready(function(){

   $(".contmoxysingup105").hide();

   $( ".boxmoxygentheme105" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme105").hasClass("editable")) {
    $(".editmoxygentheme105").hide();

   } 
   else
   {
    $(".editmoxygentheme105").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme105").hide();

});


$(".editmoxygentheme105").click(function(e) {
 $(".boxmoxygentheme105").addClass("editable");

  
  
  $(".contmoxysingup105").show();
  
 
});

$(".submitmoxysingup105").click(function() {
  $(".boxmoxygentheme105").removeClass("editable");
  $(".contmoxysingup105").hide();
addHrefoxy105();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy105() {
var inputmoxysingup105 = $('.inputmoxysingup105').val();
if(inputmoxysingup104 != ""){
  $('#hrefchangemoxysingup105').attr("href",inputmoxysingup105);
}
}




$(document).ready(function(){

   $(".contmoxysingup106").hide();

   $( ".boxmoxygentheme106" )
 .on("mouseenter", function() {
   if ($(".boxmoxygentheme106").hasClass("editable")) {
    $(".editmoxygentheme106").hide();

   } 
   else
   {
    $(".editmoxygentheme106").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmoxygentheme106").hide();

});


$(".editmoxygentheme106").click(function(e) {
 $(".boxmoxygentheme106").addClass("editable");

  
  
  $(".contmoxysingup106").show();
  
 
});

$(".submitmoxysingup106").click(function() {
  $(".boxmoxygentheme106").removeClass("editable");
  $(".contmoxysingup106").hide();
addHrefoxy106();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefoxy106() {
var inputmoxysingup106 = $('.inputmoxysingup106').val();
if(inputmoxysingup104 != ""){
  $('#hrefchangemoxysingup106').attr("href",inputmoxysingup106);
}
}


$(document).ready(function(){

$(".imageUploadmpoltheme1").hide();

$( ".boxmpoltheme1" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme1").hasClass("editable")) {
    $(".editmpoltheme1").hide();

   } 
   else
   {
    $(".editmpoltheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme1").hide();

});

 $(".editmpoltheme1").click(function() {
  $(this).hide();
  $(".boxmpoltheme1").addClass("editable");
   $(".editmpoltheme1").hide();
  $(".savempoltheme1").show();
  $(".imageUploadmpoltheme1").show();
});

$(".savempoltheme1").click(function() {
  $(this).hide();
  $(".boxmpoltheme1").removeClass("editable");
 
  $(".editmpoltheme1").hide();
  $(".imageUploadmpoltheme1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme1").change(function() {
$("#imageUploadmpoltheme1").attr("name", "imageUploadmpoltheme1");
    readURLmpol1(this);
});

});
function readURLmpol1(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme1", "imageUploadmpoltheme1","#imagePreviewmpoltheme1");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmpoltheme2").hide();

$( ".boxmpoltheme2" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme2").hasClass("editable")) {
    $(".editmpoltheme2").hide();

   } 
   else
   {
    
   
    $(".editmpoltheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme2").hide();
 

});

 $(".editmpoltheme2").click(function() {
  $(this).hide();
  $(".boxmpoltheme2").addClass("editable");
   $(".editmpoltheme2").hide();
  $(".savempoltheme2").show();
  $(".imageUploadmpoltheme2").show();
});

$(".savempoltheme2").click(function() {
  $(this).hide();
  $(".boxmpoltheme2").removeClass("editable");
 
  $(".editmpoltheme2").hide();
  $(".imageUploadmpoltheme2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme2").change(function() {
$("#imageUploadmpoltheme2").attr("name", "imageUploadmpoltheme2");
    readURLmpol2(this);
});

});
function readURLmpol2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmpoltheme2", "imageUploadmpoltheme2",".mpoltheme.banner-area");
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.boxmpoltheme2').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".contmpolbg2").hide();

   $( ".boxmpoltheme222" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme222").hasClass("editable")) {
    $(".bgmpoltheme2").hide();

   } 
   else
   {
    $(".bgmpoltheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmpoltheme2").hide();

});


$(".bgmpoltheme2").click(function(e) {
 $(".boxmpoltheme222").addClass("editable");

  
  
  $(".contmpolbg2").show();


});

$(".submitmpolbg2").click(function() {
  $(".boxmpoltheme222").removeClass("editable");
  $(".contmpolbg2").hide();
  addHrefpol2();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefpol2() {
var inputmpolbg2 = $('.inputmpolbg2').val();
if(inputmpolbg2 != "")
{
  $('.boxmpoltheme222').attr(src, inputmpolbg2);
}
}




$(document).ready(function(){

  

$( ".boxmpoltheme3" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme3").hasClass("editable")) {
    $(".editmpoltheme3").hide();

   } 
   else
   {
    $(".editmpoltheme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme3").hide();

});

 $(".editmpoltheme3").click(function() {
  $(this).hide();
  $(".boxmpoltheme3").addClass("editable");
  $(".textmpoltheme3").attr("contenteditable", "true");
   $(".editmpoltheme3").hide();
  $(".savempoltheme3").show();
 
});

$(".savempoltheme3").click(function() {
  $(this).hide();
  $(".boxmpoltheme3").removeClass("editable");
 $(".textmpoltheme3").removeAttr("contenteditable");
  $(".editmpoltheme3").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});





$(document).ready(function(){

  

$( ".boxmpoltheme4" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme4").hasClass("editable")) {
    $(".editmpoltheme4").hide();

   } 
   else
   {
    $(".editmpoltheme4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme4").hide();

});

 $(".editmpoltheme4").click(function() {
  $(this).hide();
  $(".boxmpoltheme4").addClass("editable");
  $(".textmpoltheme4").attr("contenteditable", "true");
   $(".editmpoltheme4").hide();
  $(".savempoltheme4").show();
 
});

$(".savempoltheme4").click(function() {
  $(this).hide();
  $(".boxmpoltheme4").removeClass("editable");
 $(".textmpoltheme4").removeAttr("contenteditable");
  $(".editmpoltheme4").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});




$(document).ready(function(){

   $(".imageUploadmpoltheme5").hide();

$( ".boxmpoltheme5" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme5").hasClass("editable")) {
    $(".editmpoltheme5").hide();

   } 
   else
   {
    $(".editmpoltheme5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme5").hide();

});

 $(".editmpoltheme5").click(function() {
  $(this).hide();
  $(".boxmpoltheme5").addClass("editable");
   $(".editmpoltheme5").hide();
  $(".savempoltheme5").show();
  $(".imageUploadmpoltheme5").show();
});

$(".savempoltheme5").click(function() {
  $(this).hide();
  $(".boxmpoltheme5").removeClass("editable");
 
  $(".editmpoltheme5").hide();
  $(".imageUploadmpoltheme5").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme5").change(function() {
$("#imageUploadmpoltheme5").attr("name", "imageUploadmpoltheme5");
    readURLmpol5(this);
});

});
function readURLmpol5(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme5", "imageUploadmpoltheme5","#imagePreviewmpoltheme5");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmpoltheme6").hide();

$( ".boxmpoltheme6" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme6").hasClass("editable")) {
    $(".editmpoltheme6").hide();

   } 
   else
   {
    $(".editmpoltheme6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme6").hide();

});

 $(".editmpoltheme6").click(function() {
  $(this).hide();
  $(".boxmpoltheme6").addClass("editable");
   $(".editmpoltheme6").hide();
  $(".savempoltheme6").show();
  $(".imageUploadmpoltheme6").show();
});

$(".savempoltheme6").click(function() {
  $(this).hide();
  $(".boxmpoltheme6").removeClass("editable");
 
  $(".editmpoltheme6").hide();
  $(".imageUploadmpoltheme6").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme6").change(function() {
$("#imageUploadmpoltheme6").attr("name", "imageUploadmpoltheme6");
    readURLmpol6(this);
});

});
function readURLmpol6(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme6", "imageUploadmpoltheme6","#imagePreviewmpoltheme6");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme6').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmpoltheme7").hide();

$( ".boxmpoltheme7" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme7").hasClass("editable")) {
    $(".editmpoltheme7").hide();

   } 
   else
   {
    $(".editmpoltheme7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme7").hide();

});

 $(".editmpoltheme7").click(function() {
  $(this).hide();
  $(".boxmpoltheme7").addClass("editable");
   $(".editmpoltheme7").hide();
  $(".savempoltheme7").show();
  $(".imageUploadmpoltheme7").show();
});

$(".savempoltheme7").click(function() {
  $(this).hide();
  $(".boxmpoltheme7").removeClass("editable");
 
  $(".editmpoltheme7").hide();
  $(".imageUploadmpoltheme7").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme7").change(function() {
$("#imageUploadmpoltheme7").attr("name", "imageUploadmpoltheme7");
    readURLmpol7(this);
});

});
function readURLmpol7(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme7", "imageUploadmpoltheme7","#imagePreviewmpoltheme7");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}






$(document).ready(function(){

  

$( ".boxmpoltheme8" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme8").hasClass("editable")) {
    $(".editmpoltheme8").hide();

   } 
   else
   {
    $(".editmpoltheme8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme8").hide();

});

 $(".editmpoltheme8").click(function() {
  $(this).hide();
  $(".boxmpoltheme8").addClass("editable");
  $(".textmpoltheme8").attr("contenteditable", "true");
   $(".editmpoltheme8").hide();
  $(".savempoltheme8").show();
 
});

$(".savempoltheme8").click(function() {
  $(this).hide();
  $(".boxmpoltheme8").removeClass("editable");
 $(".textmpoltheme8").removeAttr("contenteditable");
  $(".editmpoltheme8").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});





$(document).ready(function(){

   $(".imageUploadmpoltheme9").hide();

$( ".boxmpoltheme9" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme9").hasClass("editable")) {
    $(".editmpoltheme9").hide();

   } 
   else
   {
    
   
    $(".editmpoltheme9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme9").hide();
 

});

 $(".editmpoltheme9").click(function() {
  $(this).hide();
  $(".boxmpoltheme9").addClass("editable");
   $(".editmpoltheme9").hide();
  $(".savempoltheme9").show();
  $(".imageUploadmpoltheme9").show();
});

$(".savempoltheme9").click(function() {
  $(this).hide();
  $(".boxmpoltheme9").removeClass("editable");
 
  $(".editmpoltheme9").hide();
  $(".imageUploadmpoltheme9").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme9").change(function() {
$("#imageUploadmpoltheme9").attr("name", "imageUploadmpoltheme9");
    readURLmpol9(this);
});

});
function readURLmpol9(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmpoltheme9", "imageUploadmpoltheme9",".myimg");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {

               $(".myimg").css("background-image", 'url('+e.target.result +')');
               //$('.container:after').css('background-image', 'url('+e.target.result +')');
              // document.getElementsByClassName("home-about-area").style.backgroundImage = "url('+e.target.result')";
               //console.log(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){


$( ".boxmpoltheme10" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme10").hasClass("editable")) {
    $(".editmpoltheme10").hide();

   } 
   else
   {
    $(".editmpoltheme10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme10").hide();

});

 $(".editmpoltheme10").click(function() {
  $(this).hide();
  $(".boxmpoltheme10").addClass("editable");
  $(".textmpoltheme10").attr("contenteditable", "true");
   $(".editmpoltheme10").hide();
  $(".savempoltheme10").show();
 
});

$(".savempoltheme10").click(function() {
  $(this).hide();
  $(".boxmpoltheme10").removeClass("editable");
 $(".textmpoltheme10").removeAttr("contenteditable");
  $(".editmpoltheme10").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});




$(document).ready(function(){

   $(".imageUploadmpoltheme11").hide();

$( ".boxmpoltheme11" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme11").hasClass("editable")) {
    $(".editmpoltheme11").hide();

   } 
   else
   {
    $(".editmpoltheme11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme11").hide();

});

 $(".editmpoltheme11").click(function() {
  $(this).hide();
  $(".boxmpoltheme11").addClass("editable");
   $(".editmpoltheme11").hide();
  $(".savempoltheme11").show();
  $(".imageUploadmpoltheme11").show();
});

$(".savempoltheme11").click(function() {
  $(this).hide();
  $(".boxmpoltheme11").removeClass("editable");
 
  $(".editmpoltheme11").hide();
  $(".imageUploadmpoltheme11").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme11").change(function() {
$("#imageUploadmpoltheme11").attr("name", "imageUploadmpoltheme11");
    readURLmpol11(this);
});

});
function readURLmpol11(input) {

 var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver2(file, "#imageUploadmpoltheme11", "imageUploadmpoltheme11","#imagePreviewmpoltheme11",".imagePreviewmpoltheme11a");
      
/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme11').attr('src', e.target.result);
                  $('.imagePreviewmpoltheme11a').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

   $(".imageUploadmpoltheme12").hide();

$( ".boxmpoltheme12" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme12").hasClass("editable")) {
    $(".editmpoltheme12").hide();

   } 
   else
   {
    $(".editmpoltheme12").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme12").hide();

});

 $(".editmpoltheme12").click(function() {
  $(this).hide();
  $(".boxmpoltheme12").addClass("editable");
   $(".editmpoltheme12").hide();
  $(".savempoltheme12").show();
  $(".imageUploadmpoltheme12").show();
});

$(".savempoltheme12").click(function() {
  $(this).hide();
  $(".boxmpoltheme12").removeClass("editable");
 
  $(".editmpoltheme12").hide();
  $(".imageUploadmpoltheme12").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme12").change(function() {
$("#imageUploadmpoltheme12").attr("name", "imageUploadmpoltheme12");
    readURLmpol12(this);
});

});
function readURLmpol12(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver2(file, "#imageUploadmpoltheme12", "imageUploadmpoltheme12","#imagePreviewmpoltheme12",".imagePreviewmpoltheme12a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme12').attr('src', e.target.result);
                  $('.imagePreviewmpoltheme12a').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}






$(document).ready(function(){

   $(".imageUploadmpoltheme13").hide();

$( ".boxmpoltheme13" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme13").hasClass("editable")) {
    $(".editmpoltheme13").hide();

   } 
   else
   {
    $(".editmpoltheme13").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme13").hide();

});

 $(".editmpoltheme13").click(function() {
  $(this).hide();
  $(".boxmpoltheme13").addClass("editable");
   $(".editmpoltheme13").hide();
  $(".savempoltheme13").show();
  $(".imageUploadmpoltheme13").show();
});

$(".savempoltheme13").click(function() {
  $(this).hide();
  $(".boxmpoltheme13").removeClass("editable");
 
  $(".editmpoltheme13").hide();
  $(".imageUploadmpoltheme13").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme13").change(function() {
$("#imageUploadmpoltheme13").attr("name", "imageUploadmpoltheme13");
    readURLmpol13(this);
});

});
function readURLmpol13(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver2(file, "#imageUploadmpoltheme13", "imageUploadmpoltheme13","#imagePreviewmpoltheme13",".imagePreviewmpoltheme13a");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme13').attr('src', e.target.result);
                  $('.imagePreviewmpoltheme13a').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmpoltheme14").hide();

$( ".boxmpoltheme14" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme14").hasClass("editable")) {
    $(".editmpoltheme14").hide();

   } 
   else
   {
    $(".editmpoltheme14").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme14").hide();

});

 $(".editmpoltheme14").click(function() {
  $(this).hide();
  $(".boxmpoltheme14").addClass("editable");
   $(".editmpoltheme14").hide();
  $(".savempoltheme14").show();
  $(".imageUploadmpoltheme14").show();
});

$(".savempoltheme14").click(function() {
  $(this).hide();
  $(".boxmpoltheme14").removeClass("editable");
 
  $(".editmpoltheme14").hide();
  $(".imageUploadmpoltheme14").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme14").change(function() {
$("#imageUploadmpoltheme14").attr("name", "imageUploadmpoltheme14");
    readURLmpol14(this);
});

});
function readURLmpol14(input) {

   var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver2(file, "#imageUploadmpoltheme14", "imageUploadmpoltheme14","#imagePreviewmpoltheme14",".imagePreviewmpoltheme14a");


/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme14').attr('src', e.target.result);
                  $('.imagePreviewmpoltheme14a').attr('href', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

  

$( ".boxmpoltheme15" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme15").hasClass("editable")) {
    $(".editmpoltheme15").hide();

   } 
   else
   {
    $(".editmpoltheme15").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme15").hide();

});

 $(".editmpoltheme15").click(function() {
  $(this).hide();
  $(".boxmpoltheme15").addClass("editable");
  $(".textmpoltheme15").attr("contenteditable", "true");
   $(".editmpoltheme15").hide();
  $(".savempoltheme15").show();
 
});

$(".savempoltheme15").click(function() {
  $(this).hide();
  $(".boxmpoltheme15").removeClass("editable");
 $(".textmpoltheme15").removeAttr("contenteditable");
  $(".editmpoltheme15").hide();

  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});








$(document).ready(function(){

   $(".imageUploadmpoltheme16").hide();

$( ".boxmpoltheme16" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme16").hasClass("editable")) {
    $(".editmpoltheme16").hide();

   } 
   else
   {
    
   
    $(".editmpoltheme16").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme16").hide();
 

});

 $(".editmpoltheme16").click(function() {
  $(this).hide();
  $(".boxmpoltheme16").addClass("editable");
   $(".editmpoltheme16").hide();
  $(".savempoltheme16").show();
  $(".imageUploadmpoltheme16").show();
});

$(".savempoltheme16").click(function() {
  $(this).hide();
  $(".boxmpoltheme16").removeClass("editable");
 
  $(".editmpoltheme16").hide();
  $(".imageUploadmpoltheme16").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme16").change(function() {
$("#imageUploadmpoltheme16").attr("name", "imageUploadmpoltheme16");
    readURLmpol16(this);
});

});
function readURLmpol16(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmpoltheme16", "imageUploadmpoltheme16",".mpoltheme.counter-area");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.boxmpoltheme16').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".contmpolbg16").hide();

   $( ".boxmpoltheme16a" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme16a").hasClass("editable")) {
    $(".bgmpoltheme16").hide();

   } 
   else
   {
    $(".bgmpoltheme16").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmpoltheme16").hide();

});


$(".bgmpoltheme16").click(function(e) {
 $(".boxmpoltheme16a").addClass("editable");

  
  
  $(".contmpolbg16").show();


});

$(".submitmpolbg16").click(function() {
  $(".boxmpoltheme16a").removeClass("editable");
  $(".contmpolbg16").hide();
  addHrefpol16();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefpol16() {
var inputmpolbg16 = $('.inputmpolbg16').val();
if(inputmpolbg16 != ""){
  $('.boxmpoltheme16a').css('background-image', 'url('+inputmpolbg16 +')');
}
}



$(document).ready(function(){

  

$( ".boxmpoltheme17" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme17").hasClass("editable")) {
    $(".editmpoltheme17").hide();

   } 
   else
   {
    $(".editmpoltheme17").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme17").hide();

});

 $(".editmpoltheme17").click(function() {
  $(this).hide();
  $(".boxmpoltheme17").addClass("editable");
  $(".textmpoltheme17").attr("contenteditable", "true");
   $(".editmpoltheme17").hide();
  $(".savempoltheme17").show();
 
});

$(".savempoltheme17").click(function() {
  $(this).hide();
  $(".boxmpoltheme17").removeClass("editable");
 $(".textmpoltheme17").removeAttr("contenteditable");
  $(".editmpoltheme17").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});





$(document).ready(function(){

   $(".imageUploadmpoltheme18").hide();

$( ".boxmpoltheme18" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme18").hasClass("editable")) {
    $(".editmpoltheme18").hide();

   } 
   else
   {
    $(".editmpoltheme18").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme18").hide();

});

 $(".editmpoltheme18").click(function() {
  $(this).hide();
  $(".boxmpoltheme18").addClass("editable");
   $(".editmpoltheme18").hide();
  $(".savempoltheme18").show();
  $(".imageUploadmpoltheme18").show();
});

$(".savempoltheme18").click(function() {
  $(this).hide();
  $(".boxmpoltheme18").removeClass("editable");
 
  $(".editmpoltheme18").hide();
  $(".imageUploadmpoltheme18").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme18").change(function() {
$("#imageUploadmpoltheme18").attr("name", "imageUploadmpoltheme18");
    readURLmpol18(this);
});

});
function readURLmpol18(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme18", "imageUploadmpoltheme18","#imagePreviewmpoltheme18");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme18').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmpoltheme19").hide();

$( ".boxmpoltheme19" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme19").hasClass("editable")) {
    $(".editmpoltheme19").hide();

   } 
   else
   {
    $(".editmpoltheme19").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme19").hide();

});

 $(".editmpoltheme19").click(function() {
  $(this).hide();
  $(".boxmpoltheme19").addClass("editable");
   $(".editmpoltheme19").hide();
  $(".savempoltheme19").show();
  $(".imageUploadmpoltheme19").show();
});

$(".savempoltheme19").click(function() {
  $(this).hide();
  $(".boxmpoltheme19").removeClass("editable");
 
  $(".editmpoltheme19").hide();
  $(".imageUploadmpoltheme19").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme19").change(function() {
$("#imageUploadmpoltheme19").attr("name", "imageUploadmpoltheme19");
    readURLmpol19(this);
});

});
function readURLmpol19(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme19", "imageUploadmpoltheme19","#imagePreviewmpoltheme19");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme19').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmpoltheme20").hide();

$( ".boxmpoltheme20" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme20").hasClass("editable")) {
    $(".editmpoltheme20").hide();

   } 
   else
   {
    $(".editmpoltheme20").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme20").hide();

});

 $(".editmpoltheme20").click(function() {
  $(this).hide();
  $(".boxmpoltheme20").addClass("editable");
   $(".editmpoltheme20").hide();
  $(".savempoltheme20").show();
  $(".imageUploadmpoltheme20").show();
});

$(".savempoltheme20").click(function() {
  $(this).hide();
  $(".boxmpoltheme20").removeClass("editable");
 
  $(".editmpoltheme20").hide();
  $(".imageUploadmpoltheme20").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme20").change(function() {
$("#imageUploadmpoltheme20").attr("name", "imageUploadmpoltheme20");
    readURLmpol20(this);
});

});
function readURLmpol20(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme20", "imageUploadmpoltheme20","#imagePreviewmpoltheme20");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme20').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}





$(document).ready(function(){

   $(".imageUploadmpoltheme21").hide();

$( ".boxmpoltheme21" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme21").hasClass("editable")) {
    $(".editmpoltheme21").hide();

   } 
   else
   {
    $(".editmpoltheme21").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme21").hide();

});

 $(".editmpoltheme21").click(function() {
  $(this).hide();
  $(".boxmpoltheme21").addClass("editable");
   $(".editmpoltheme21").hide();
  $(".savempoltheme21").show();
  $(".imageUploadmpoltheme21").show();
});

$(".savempoltheme21").click(function() {
  $(this).hide();
  $(".boxmpoltheme21").removeClass("editable");
 
  $(".editmpoltheme21").hide();
  $(".imageUploadmpoltheme21").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmpoltheme21").change(function() {
$("#imageUploadmpoltheme21").attr("name", "imageUploadmpoltheme21");
    readURLmpol21(this);
});

});
function readURLmpol21(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadmpoltheme21", "imageUploadmpoltheme21","#imagePreviewmpoltheme21");

/*if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmpoltheme21').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }*/
  
}




$(document).ready(function(){

  

$( ".boxmpoltheme22" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme22").hasClass("editable")) {
    $(".editmpoltheme22").hide();

   } 
   else
   {
    $(".editmpoltheme22").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme22").hide();

});

 $(".editmpoltheme22").click(function() {
  $(this).hide();
  $(".boxmpoltheme22").addClass("editable");
  $(".textmpoltheme22").attr("contenteditable", "true");
   $(".editmpoltheme22").hide();
  $(".savempoltheme22").show();
 
});

$(".savempoltheme22").click(function() {
  $(this).hide();
  $(".boxmpoltheme22").removeClass("editable");
 $(".textmpoltheme22").removeAttr("contenteditable");
  $(".editmpoltheme22").hide();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});
});





$(document).ready(function(){

   $(".contmpolfacebook23").hide();

   $( ".boxmpoltheme23" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme23").hasClass("editable")) {
    $(".editmpoltheme23").hide();

   } 
   else
   {
    $(".editmpoltheme23").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme23").hide();

});


$(".editmpoltheme23").click(function(e) {
 $(".boxmpoltheme23").addClass("editable");

  
  
  $(".contmpolfacebook23").show();

 
 



//$(".boxmpoltheme23").removeClass("editable");
 // $(".contmpolfacebook23").hide();


   $(".boxmpoltheme24").removeClass("editable");
   $(".contmpoltwitter24").hide();

    $(".boxmpoltheme25").removeClass("editable");
  $(".contmpoldribble25").hide();

  $(".boxmpoltheme26").removeClass("editable");
  $(".contmpolbehance26").hide();

  


});

$(".submitmpolfacebook23").click(function() {
  $(".boxmpoltheme23").removeClass("editable");
  $(".contmpolfacebook23").hide();
addHrefmpol23();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmpol23() {
var inputmpolfacebook23 = $('.inputmpolfacebook23').val();
if(inputmpolfacebook23 != ""){
  $('#hrefchangempolfacebook23').attr("href",inputmpolfacebook23);
}
}





$(document).ready(function(){

   $(".contmpoltwitter24").hide();

   $( ".boxmpoltheme24" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme24").hasClass("editable")) {
    $(".editmpoltheme24").hide();

   } 
   else
   {
    $(".editmpoltheme24").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme24").hide();

});


$(".editmpoltheme24").click(function(e) {
 $(".boxmpoltheme24").addClass("editable");

  
  
  $(".contmpoltwitter24").show();

$(".boxmpoltheme23").removeClass("editable");
  $(".contmpolfacebook23").hide();


   //$(".boxmpoltheme24").removeClass("editable");
   //$(".contmpoltwitter24").hide();

    $(".boxmpoltheme25").removeClass("editable");
  $(".contmpoldribble25").hide();

  $(".boxmpoltheme26").removeClass("editable");
  $(".contmpolbehance26").hide();

 
});

$(".submitmpoltwitter24").click(function() {
  $(".boxmpoltheme24").removeClass("editable");
  $(".contmpoltwitter24").hide();
addHrefmpol24();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmpol24() {
var inputmpoltwitter24 = $('.inputmpoltwitter24').val();
if(inputmpoltwitter24 != "")
{
  $('#hrefchangempoltwitter24').attr("href",inputmpoltwitter24);
}
}






$(document).ready(function(){

   $(".contmpoldribble25").hide();

   $( ".boxmpoltheme25" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme25").hasClass("editable")) {
    $(".editmpoltheme25").hide();

   } 
   else
   {
    $(".editmpoltheme25").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme25").hide();

});


$(".editmpoltheme25").click(function(e) {
 $(".boxmpoltheme25").addClass("editable");

  
  
  $(".contmpoldribble25").show();

 

  $(".boxmpoltheme23").removeClass("editable");
  $(".contmpolfacebook23").hide();


   $(".boxmpoltheme24").removeClass("editable");
   $(".contmpoltwitter24").hide();

    //$(".boxmpoltheme25").removeClass("editable");
  //$(".contmpoldribble25").hide();

  $(".boxmpoltheme26").removeClass("editable");
  $(".contmpolbehance26").hide();



});

$(".submitmpoldribble25").click(function() {
  $(".boxmpoltheme25").removeClass("editable");
  $(".contmpoldribble25").hide();
addHrefmpol25();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmpol25() {
var inputmpoldribble25 = $('.inputmpoldribble25').val();
if(inputmpoldribble25 != ""){
  $('#hrefchangempoldribble25').attr("href",inputmpoldribble25);
}
}





$(document).ready(function(){

   $(".contmpolbehance26").hide();

   $( ".boxmpoltheme26" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme26").hasClass("editable")) {
    $(".editmpoltheme26").hide();

   } 
   else
   {
    $(".editmpoltheme26").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme26").hide();

});


$(".editmpoltheme26").click(function(e) {
 $(".boxmpoltheme26").addClass("editable");

  
  
  $(".contmpolbehance26").show();

 

  $(".boxmpoltheme23").removeClass("editable");
  $(".contmpolfacebook23").hide();


   $(".boxmpoltheme24").removeClass("editable");
   $(".contmpoltwitter24").hide();

    $(".boxmpoltheme25").removeClass("editable");
  $(".contmpoldribble25").hide();

  //$(".boxmpoltheme26").removeClass("editable");
  //$(".contmpolbehance26").hide();



});

$(".submitmpolbehance26").click(function() {
  $(".boxmpoltheme26").removeClass("editable");
  $(".contmpolbehance26").hide();
addHrefmpol26();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefmpol26() {
var inputmpolbehance26 = $('.inputmpolbehance26').val();
if(inputmpolbehance26 != ""){
  $('#hrefchangempolbehance26').attr("href",inputmpolbehance26);
}
}



$(document).ready(function(){
     
 $(".boxmpoltheme27").removeClass("editable");
  $(".contpresentationcolormpoltheme27").hide(); 

$( ".boxmpoltheme27" )
 .on("mouseenter", function() {
   if ($(".boxmpoltheme27").hasClass("editable")) {
    $(".editmpoltheme27").hide();
    $(".editpresentationcolormpoltheme27").hide();

   } 
   else
   {
    $(".editmpoltheme27").show();
    $(".editpresentationcolormpoltheme27").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmpoltheme27").hide();
   $(".editpresentationcolormpoltheme27").hide();
});

 $(".editmpoltheme27").click(function() {
  $(this).hide();
  $(".boxmpoltheme27").addClass("editable");
  $(".textmpoltheme27").attr("contenteditable", "true");
   $(".editmpoltheme27").hide();
  $(".savempoltheme27").show();
 
});

  $(".editpresentationcolormpoltheme27").click(function() {
    $(".boxmpoltheme27").addClass("editable");
  $(".editpresentationcolormpoltheme27").hide();
  $(".contpresentationcolormpoltheme27").show(); 


});

  $(".submitpresentationcolormpoltheme27").click(function() {
  
  $(".contpresentationcolormpoltheme27").hide();
   $(".boxmpoltheme27").removeClass("editable");
addmpolpresentationcolor27();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savempoltheme27").click(function() {
  $(this).hide();
  $(".boxmpoltheme27").removeClass("editable");
 $(".textmpoltheme27").removeAttr("contenteditable");
  $(".editmpoltheme27").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addmpolpresentationcolor27() {
var inputpresentationcolormpoltheme27 = $('.inputpresentationcolormpoltheme27').val();
  $('.mpolpresentation27').css("background",inputpresentationcolormpoltheme27);
}



$(document).ready(function(){

$(".imageUploadlogonlnndynamic").hide();

$( ".boxlogolnndynamic" )
 .on("mouseenter", function() {
   if ($(".boxlogolnndynamic").hasClass("editable")) {
    $(".editlogolnndynamic").hide();

   } 
   else
   {
    $(".editlogolnndynamic").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editlogolnndynamic").hide();

});

 $(".editlogolnndynamic").click(function() {
  $(this).hide();
  $(".boxlogolnndynamic").addClass("editable");
   $(".editlogolnndynamic").hide();
  $(".savelogolnndynamic").show();
  $(".imageUploadlogonlnndynamic").show();
});

$(".savelogolnndynamic").click(function() {
  $(this).hide();
  $(".boxlogolnndynamic").removeClass("editable");
 
  $(".editlogolnndynamic").hide();
  $(".imageUploadlogonlnndynamic").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadlogonlnndynamic").change(function() {
$("#imageUploadlogonlnndynamic").attr("name", "imageUploadlogonlnndynamic");
    readURLndylogo(this);
});

});
function readURLndylogo(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserver(file, "#imageUploadlogonlnndynamic", "imageUploadlogonlnndynamic","#imagePreviewlogolnndynamic");

  
}

$(document).ready(function(){

   $(".contmnabg2").hide();

   $( ".boxmnatheme222" )
 .on("mouseenter", function() {
   if ($(".boxmnatheme222").hasClass("editable")) {
    $(".bgmnatheme2").hide();

   } 
   else
   {
    $(".bgmnatheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".bgmnatheme2").hide();

});


$(".bgmnatheme2").click(function(e) {
 $(".boxmnatheme222").addClass("editable");

  
  
  $(".contmnabg2").show();


});

$(".submitmnabg2").click(function() {
  $(".boxmnatheme222").removeClass("editable");
  $(".contmpolbg2").hide();
  addHrefna2();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

 
});

function addHrefna2() {
  
var inputmnabg2 = $('.inputmnabg2').val();
if(inputmnabg2 != "")
{
  //$('.boxmnatheme222').attr('src', inputmnabg2 );
   $('.mnatheme.banner-area').css('background-image', 'url('+inputmnabg2 +')');
}
}

$(document).ready(function(){

   $(".imageUploadmnatheme2").hide();

$( ".boxmnatheme2" )
 .on("mouseenter", function() {
   if ($(".boxmnatheme2").hasClass("editable")) {
    $(".editmnatheme2").hide();

   } 
   else
   {
    
   
    $(".editmnatheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmnatheme2").hide();
 

});

 $(".editmnatheme2").click(function() {
  $(this).hide();
  $(".boxmnatheme2").addClass("editable");
   $(".editmnatheme2").hide();
  $(".savemnatheme2").show();
  $(".imageUploadmnatheme2").show();
});

$(".savemnatheme2").click(function() {
  $(this).hide();
  $(".boxmnatheme2").removeClass("editable");
 
  $(".editmnatheme2").hide();
  $(".imageUploadmnatheme2").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});





$("#imageUploadmnatheme2").change(function() {
$("#imageUploadmnatheme2").attr("name", "imageUploadmnatheme2");
    readURLmna2(this);
});

});
function readURLmna2(input) {

  var file = input.files[0];
     console.log("name : " + file.name);
     Uploadimgtoserverbakimg(file, "#imageUploadmnatheme2", "imageUploadmnatheme2",".mnatheme.banner-area");

}

$(document).ready(function(){

  $(".contpurpcservices1").hide(); 

$( ".boxpcservices1" )
 .on("mouseenter", function() {
   if ($(".boxpcservices1").hasClass("editable")) {
   
    $(".editcontpurpcservices1").hide();
   } 
   else
   {
  
    $(".editcontpurpcservices1").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcservices1").hide();

});

 




 $(".editcontpurpcservices1").click(function() {
   $(".boxpcservices1").addClass("editable");
  $(this).hide();
  $(".contpurpcservices1").show(); 
 
});

  $(".submitcontpurpcservices1").click(function() {
  
  $(".contpurpcservices1").hide();
   $(".boxpcservices1").removeClass("editable");
addpcfontawesomecontpur1a();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur1a() {
var inputcontpurpcservices1 = $('.inputcontpurpcservices1').val();
 $('#purpcservices1').removeClass();
  $('#purpcservices1').addClass(inputcontpurpcservices1);
  if(inputcontpurpcservices1 == "")
  {
    $('.service-icon i').css('font-size','0px');
  }
  else
  {
    $('.service-icon i').css('font-size','30px');
  }
}

$(document).ready(function(){

  $(".contpurpcservices2").hide(); 

$( ".boxpcservices2" )
 .on("mouseenter", function() {
   if ($(".boxpcservices2").hasClass("editable")) {
   
    $(".editcontpurpcservices2").hide();
   } 
   else
   {
  
    $(".editcontpurpcservices2").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcservices2").hide();

});

 




 $(".editcontpurpcservices2").click(function() {
   $(".boxpcservices2").addClass("editable");
  $(this).hide();
  $(".contpurpcservices2").show(); 
 
});

  $(".submitcontpurpcservices2").click(function() {
  
  $(".contpurpcservices2").hide();
   $(".boxpcservices2").removeClass("editable");
addpcfontawesomecontpur2();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur2() {
var inputcontpurpcservices2 = $('.inputcontpurpcservices2').val();
 $('#purpcservices2').removeClass();
  $('#purpcservices2').addClass(inputcontpurpcservices2);
  if(inputcontpurpcservices2 == "")
  {
    $('.service-icon i').css('font-size','0px');
  }
  else
  {
    $('.service-icon i').css('font-size','30px');
  }
}


$(document).ready(function(){

  $(".contpurpcservices3").hide(); 

$( ".boxpcservices3" )
 .on("mouseenter", function() {
   if ($(".boxpcservices3").hasClass("editable")) {
   
    $(".editcontpurpcservices3").hide();
   } 
   else
   {
  
    $(".editcontpurpcservices3").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcservices3").hide();

});

 




 $(".editcontpurpcservices3").click(function() {
   $(".boxpcservices3").addClass("editable");
  $(this).hide();
  $(".contpurpcservices3").show(); 
 
});

  $(".submitcontpurpcservices3").click(function() {
  
  $(".contpurpcservices3").hide();
   $(".boxpcservices3").removeClass("editable");
addpcfontawesomecontpur3();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur3() {
var inputcontpurpcservices3 = $('.inputcontpurpcservices3').val();
 $('#purpcservices3').removeClass();
  $('#purpcservices3').addClass(inputcontpurpcservices3);
  if(inputcontpurpcservices3 == "")
  {
    $('.service-icon i').css('font-size','0px');
  }
  else
  {
    $('.service-icon i').css('font-size','30px');
  }
}






$(document).ready(function(){
     
 $(".boxpcservices4").removeClass("editable");
  $(".contpresentationcolorpcservices4").hide(); 

$( ".boxpcservices4" )
 .on("mouseenter", function() {
   if ($(".boxpcservices4").hasClass("editable")) {
    $(".editpcservices4").hide();
    $(".editpresentationcolorpcservices4").hide();

   } 
   else
   {
    $(".editpcservices4").show();
    $(".editpresentationcolorpcservices4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editpcservices4").hide();
   $(".editpresentationcolorpcservices4").hide();
});

 $(".editpcservices4").click(function() {
  $(this).hide();
  $(".boxpcservices4").addClass("editable");
  $(".textpcservices4").attr("contenteditable", "true");
   $(".editpcservices4").hide();
  $(".savepcservices4").show();
 
});

  $(".editpresentationcolorpcservices4").click(function() {
    $(".boxpcservices4").addClass("editable");
  $(".editpresentationcolorpcservices4").hide();
  $(".contpresentationcolorpcservices4").show(); 


});

  $(".submitpresentationcolorpcservices4").click(function() {
  
  $(".contpresentationcolorpcservices4").hide();
   $(".boxpcservices4").removeClass("editable");
addpcspresentationcolor4();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});

$(".savepcservices4").click(function() {
  $(this).hide();
  $(".boxpcservices4").removeClass("editable");
 $(".textpcservices4").removeAttr("contenteditable");
  $(".editpcservices4").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addpcspresentationcolor4() {
var inputpresentationcolorpcservices4 = $('.inputpresentationcolorpcservices4').val();
  $('.pcserviceypresentation4').css("background",inputpresentationcolorpcservices4);
}






$(document).ready(function(){

  $(".contpurpcservices5").hide(); 

$( ".boxpcservices5" )
 .on("mouseenter", function() {
   if ($(".boxpcservices5").hasClass("editable")) {
   
    $(".editcontpurpcservices5").hide();
   } 
   else
   {
  
    $(".editcontpurpcservices5").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcservices5").hide();

});

 




 $(".editcontpurpcservices5").click(function() {
   $(".boxpcservices5").addClass("editable");
  $(this).hide();
  $(".contpurpcservices5").show(); 
 
});

  $(".submitcontpurpcservices5").click(function() {
  
  $(".contpurpcservices5").hide();
   $(".boxpcservices5").removeClass("editable");
addpcfontawesomecontpur1();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur1() {
var inputcontpurpcservices5 = $('.inputcontpurpcservices5').val();
 $('#purpcservices5').removeClass();
  $('#purpcservices5').addClass(inputcontpurpcservices5);
  if(inputcontpurpcservices5 == "")
  {
    $('.service-icon i').css('font-size','0px');
  }
  else
  {
    $('.service-icon i').css('font-size','30px');
  }
}






$(document).ready(function(){

  $(".contpurpcservices6").hide(); 

$( ".boxpcservices6" )
 .on("mouseenter", function() {
   if ($(".boxpcservices6").hasClass("editable")) {
   
    $(".editcontpurpcservices6").hide();
   } 
   else
   {
  
    $(".editcontpurpcservices6").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcservices6").hide();

});

 




 $(".editcontpurpcservices6").click(function() {
   $(".boxpcservices6").addClass("editable");
  $(this).hide();
  $(".contpurpcservices6").show(); 
 
});

  $(".submitcontpurpcservices6").click(function() {
  
  $(".contpurpcservices6").hide();
   $(".boxpcservices6").removeClass("editable");
addpcfontawesomecontpur6();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur6() {
var inputcontpurpcservices6 = $('.inputcontpurpcservices6').val();
 $('#purpcservices6').removeClass();
  $('#purpcservices6').addClass(inputcontpurpcservices6);
  if(inputcontpurpcservices6 == "")
  {
    $('.service-icon i').css('font-size','0px');
  }
  else
  {
    $('.service-icon i').css('font-size','30px');
  }
}






$(document).ready(function(){

  $(".contpurpcservices7").hide(); 

$( ".boxpcservices7" )
 .on("mouseenter", function() {
   if ($(".boxpcservices7").hasClass("editable")) {
   
    $(".editcontpurpcservices7").hide();
   } 
   else
   {
  
    $(".editcontpurpcservices7").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcservices7").hide();

});

 




 $(".editcontpurpcservices7").click(function() {
   $(".boxpcservices7").addClass("editable");
  $(this).hide();
  $(".contpurpcservices7").show(); 
 
});

  $(".submitcontpurpcservices7").click(function() {
  
  $(".contpurpcservices7").hide();
   $(".boxpcservices7").removeClass("editable");
addpcfontawesomecontpur7();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur7() {
var inputcontpurpcservices7 = $('.inputcontpurpcservices7').val();
 $('#purpcservices7').removeClass();
  $('#purpcservices7').addClass(inputcontpurpcservices7);
  if(inputcontpurpcservices7 == "")
  {
    $('.service-icon i').css('font-size','0px');
  }
  else
  {
    $('.service-icon i').css('font-size','30px');
  }
}



$(document).ready(function(){
     

  $(".contpresentationcolorpcservices5").hide(); 

$( ".boxpcservices5" )
 .on("mouseenter", function() {
   if ($(".boxpcservices5").hasClass("editable")) {
    $(".editpcservices5").hide();
    $(".editpresentationcolorpcservices5").hide();

   } 
   else
   {
    $(".editpcservices5").show();
    $(".editpresentationcolorpcservices5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editpcservices5").hide();
   $(".editpresentationcolorpcservices5").hide();
});

 $(".editpcservices5").click(function() {
  $(this).hide();
  $(".boxpcservices5").addClass("editable");
  $(".textpcservices5").attr("contenteditable", "true");
   $(".editpcservices5").hide();
  $(".savepcservices5").show();
 
});

  $(".editpresentationcolorpcservices5").click(function() {
    $(".boxpcservices5").addClass("editable");
  $(".editpresentationcolorpcservices5").hide();
  $(".contpresentationcolorpcservices5").show(); 


});

  $(".submitpresentationcolorpcservices5").click(function() {
  
  $(".contpresentationcolorpcservices5").hide();
   $(".boxpcservices5").removeClass("editable");
addpcspresentationcolor5();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});

$(".savepcservices5").click(function() {
  $(this).hide();
  $(".boxpcservices5").removeClass("editable");
 $(".textpcservices5").removeAttr("contenteditable");
  $(".editpcservices5").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addpcspresentationcolor5() {
var inputpresentationcolorpcservices5 = $('.inputpresentationcolorpcservices5').val();
  $('.mlthemeone.slider-2').css("background-color",inputpresentationcolorpcservices5);
}

$(document).ready(function(){
     
$(".boxpcservices7").removeClass("editable");
  $(".contpresentationcolorpcservices7").hide(); 

$( ".boxpcservices7" )
 .on("mouseenter", function() {
   if ($(".boxpcservices7").hasClass("editable")) {
    $(".editpcservices7").hide();
    $(".editpresentationcolorpcservices7").hide();

   } 
   else
   {
    $(".editpcservices7").show();
    $(".editpresentationcolorpcservices7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editpcservices7").hide();
   $(".editpresentationcolorpcservices7").hide();
});

 $(".editpcservices7").click(function() {
  $(this).hide();
  $(".boxpcservices7").addClass("editable");
  $(".textpcservices7").attr("contenteditable", "true");
   $(".editpcservices7").hide();
  $(".savepcservices7").show();
 
});

  $(".editpresentationcolorpcservices7").click(function() {
    $(".boxpcservices7").addClass("editable");
  $(".editpresentationcolorpcservices7").hide();
  $(".contpresentationcolorpcservices7").show(); 


});

  $(".submitpresentationcolorpcservices7").click(function() {
  
  $(".contpresentationcolorpcservices7").hide();
   $(".boxpcservices7").removeClass("editable");
addpcspresentationcolor7();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savepcservices7").click(function() {
  $(this).hide();
  $(".boxpcservices7").removeClass("editable");
 $(".textpcservices7").removeAttr("contenteditable");
  $(".editpcservices7").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addpcspresentationcolor7() {
var inputpresentationcolorpcservices7 = $('.inputpresentationcolorpcservices5').val();
  $('.pcserviceypresentation7').css("background",inputpresentationcolorpcservices7);
}





$(document).ready(function(){
     
$(".boxmlthemeone79").removeClass("editable");
  $(".contpresentationcolormlthemeone79").hide(); 

$( ".boxmlthemeone79" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone79").hasClass("editable")) {
    $(".editmlthemeone79").hide();
    $(".editpresentationcolormlthemeone79").hide();

   } 
   else
   {
    $(".editmlthemeone79").show();
    $(".editpresentationcolormlthemeone79").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone79").hide();
   $(".editpresentationcolormlthemeone79").hide();
});

 $(".editmlthemeone79").click(function() {
  $(this).hide();
  $(".boxmlthemeone79").addClass("editable");
  $(".textmlthemeone79").attr("contenteditable", "true");
   $(".editmlthemeone79").hide();
  $(".savemlthemeone79").show();
 
});

  $(".editpresentationcolormlthemeone79").click(function() {
    $(".boxmlthemeone79").addClass("editable");
  $(".editpresentationcolormlthemeone79").hide();
  $(".contpresentationcolormlthemeone79").show(); 


});

  $(".submitpresentationcolormlthemeone79").click(function() {
  
  $(".contpresentationcolormlthemeone79").hide();
   $(".boxmlthemeone79").removeClass("editable");
addmlpresentationcolor79();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savemlthemeone79").click(function() {
  $(this).hide();

  $(".boxmlthemeone79").removeClass("editable");
 $(".textmlthemeone79").removeAttr("contenteditable");
  $(".editmlthemeone79").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addmlpresentationcolor79() {
var inputpresentationcolormlthemeone79 = $('.inputpresentationcolormlthemeone79').val();
  $('.presentationml79').css("background",inputpresentationcolormlthemeone79);
 
}




$(document).ready(function(){

     
$(".boxmlthemeone80").removeClass("editable");
  $(".contpresentationcolormlthemeone80").hide(); 

$( ".boxmlthemeone80" )
 .on("mouseenter", function() {
   if ($(".boxmlthemeone80").hasClass("editable")) {
    $(".editmlthemeone80").hide();
    $(".editpresentationcolormlthemeone80").hide();

   } 
   else
   {
    $(".editmlthemeone80").show();
    $(".editpresentationcolormlthemeone80").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editmlthemeone80").hide();
   $(".editpresentationcolormlthemeone80").hide();
});

 $(".editmlthemeone80").click(function() {
  $(this).hide();
  $(".boxmlthemeone80").addClass("editable");
  $(".textmlthemeone80").attr("contenteditable", "true");
   $(".editmlthemeone80").hide();
  $(".savemlthemeone80").show();
 
});

  $(".editpresentationcolormlthemeone80").click(function() {
    $(".boxmlthemeone80").addClass("editable");
  $(".editpresentationcolormlthemeone80").hide();
  $(".contpresentationcolormlthemeone80").show(); 


});

  $(".submitpresentationcolormlthemeone80").click(function() {
  
  $(".contpresentationcolormlthemeone80").hide();
   $(".boxmlthemeone80").removeClass("editable");
addmlpresentationcolor80();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savemlthemeone80").click(function() {
  $(this).hide();
  $(".boxmlthemeone80").removeClass("editable");
 $(".textmlthemeone80").removeAttr("contenteditable");
  $(".editmlthemeone80").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addmlpresentationcolor80() {
var inputpresentationcolormlthemeone80 = $('.inputpresentationcolormlthemeone80').val();
  
   $('.presentationml80').css("background-color",inputpresentationcolormlthemeone80);
}

$(document).ready(function(){
     

  $(".contpresentationcolorpccontact4").hide(); 

$( ".boxpccontact4" )
 .on("mouseenter", function() {
   if ($(".boxpcservices4").hasClass("editable")) {
    $(".editpccontact4").hide();
    $(".editpresentationcolorpccontact4").hide();

   } 
   else
   {
    $(".editpccontact4").show();
    $(".editpresentationcolorpccontact4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editpccontact4").hide();
   $(".editpresentationcolorpccontact4").hide();
});

 $(".editpccontact4").click(function() {
  $(this).hide();
  $(".boxpccontact4").addClass("editable");
  $(".textpccontact4").attr("contenteditable", "true");
   $(".editpccontact4").hide();
  $(".savepccontact4").show();
 
});

  $(".editpresentationcolorpccontact4").click(function() {
    $(".boxpccontact4").addClass("editable");
  $(".editpresentationcolorpccontact4").hide();
  $(".contpresentationcolorpccontact4").show(); 


});

  $(".submitpresentationcolorpccontact4").click(function() {
  
  $(".contpresentationcolorpccontact4").hide();
   $(".boxpccontact4").removeClass("editable");
addpcspresentationcolor4i();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
  
});

$(".savepccontact4").click(function() {
  $(this).hide();
  $(".boxpccontact4").removeClass("editable");
 $(".textpccontact4").removeAttr("contenteditable");
  $(".editpccontact4").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addpcspresentationcolor4i() {
var inputpresentationcolorpcservices4 = $('.inputpresentationcolorpccontact4').val();
  $('.themeone .contact.pccontactpresentation4').css("background",inputpresentationcolorpcservices4);
}


$(document).ready(function(){
     

  $(".contpresentationcolorcnfp1").hide(); 

$( ".boxcnfp1" )
 .on("mouseenter", function() {
   if ($(".boxcnfp1").hasClass("editable")) {
    $(".editcnfp1").hide();
    $(".editpresentationcolorcnfp1").hide();

   } 
   else
   {
    $(".editcnfp1").show();
    $(".editpresentationcolorcnfp1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcnfp1").hide();
   $(".editpresentationcolorcnfp1").hide();
});

 $(".editcnfp1").click(function() {
  $(this).hide();
  $(".boxcnfp1").addClass("editable");
  $(".textcnfp1").attr("contenteditable", "true");
   $(".editcnfp1").hide();
  $(".savecnfp1").show();
 
});

  $(".editpresentationcolorcnfp1").click(function() {
    $(".boxcnfp1").addClass("editable");
  $(".editpresentationcolorcnfp1").hide();
  $(".contpresentationcolorcnfp1").show(); 


});

  $(".submitpresentationcolorcnfp1").click(function() {
  
  $(".contpresentationcolorcnfp1").hide();
   $(".boxcnfp1").removeClass("editable");
addcnfp1i();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

$(".savecnfp1").click(function() {
  $(this).hide();
  $(".boxcnfp1").removeClass("editable");
 $(".textcnfp1").removeAttr("contenteditable");
  $(".editcnfp1").hide();
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});
});

function addcnfp1i() {
var inputpresentationcolorcnfp1 = $('.inputpresentationcolorcnfp1').val();
  $('.pcscnf1').css("background",inputpresentationcolorcnfp1);
}


 
$(document).ready(function(){

  $(".contpurpcservicest2").hide(); 

$( ".boxpcservicest2" )
 .on("mouseenter", function() {
   if ($(".boxpcservicest2").hasClass("editable")) {
   
    $(".editcontpurpcservicest2").hide();
   } 
   else
   {
  
    $(".editcontpurpcservicest2").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcservicest2").hide();

});

 




 $(".editcontpurpcservicest2").click(function() {
   $(".boxpcservicest2").addClass("editable");
  $(this).hide();
  $(".contpurpcservicest2").show(); 
 
});

  $(".submitcontpurpcservicest2").click(function() {
  
  $(".contpurpcservicest2").hide();
   $(".boxpcservicest2").removeClass("editable");
addpcfontawesomecontpurt2ai();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpurt2ai() {
var inputcontpurpcservicest2 = $('.inputcontpurpcservicest2').val();
 $('#purpcservicest2').removeClass();
  $('#purpcservicest2').addClass(inputcontpurpcservicest2);
  
}

$(document).ready(function(){

  $(".contpurpcfawe2").hide(); 

$( ".boxpcfawe2" )
 .on("mouseenter", function() {
   if ($(".boxpcfawe2").hasClass("editable")) {
   
    $(".editcontpurpcfawe2").hide();
   } 
   else
   {
  
    $(".editcontpurpcfawe2").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcfawe2").hide();

});

 




 $(".editcontpurpcfawe2").click(function() {
   $(".boxpcfawe2").addClass("editable");
  $(this).hide();
  $(".contpurpcfawe2").show(); 
 
});

  $(".submitcontpurpcfawe2").click(function() {
  
  $(".contpurpcfawe2").hide();
   $(".boxpcfawe2").removeClass("editable");
addpcfontawesomecontpur2ai2();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur2ai2() {
var inputcontpurpcfawe2 = $('.inputcontpurpcfawe2').val();
 $('#purpcfawe2').removeClass();
  $('#purpcfawe2').addClass(inputcontpurpcfawe2);
  
}

$(document).ready(function(){

  $(".contpurpcfawe3").hide(); 

$( ".boxpcfawe3" )
 .on("mouseenter", function() {
   if ($(".boxpcfawe3").hasClass("editable")) {
   
    $(".editcontpurpcfawe3").hide();
   } 
   else
   {
  
    $(".editcontpurpcfawe3").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcfawe3").hide();

});

 




 $(".editcontpurpcfawe3").click(function() {
   $(".boxpcfawe3").addClass("editable");
  $(this).hide();
  $(".contpurpcfawe3").show(); 
 
});

  $(".submitcontpurpcfawe3").click(function() {
  
  $(".contpurpcfawe3").hide();
   $(".boxpcfawe3").removeClass("editable");
addpcfontawesomecontpur2i3();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur2i3() {
var inputcontpurpcfawe3 = $('.inputcontpurpcfawe3').val();
 $('#purpcfawe3').removeClass();
  $('#purpcfawe3').addClass(inputcontpurpcfawe3);
  
}

$(document).ready(function(){

  $(".contpurpcfawe4").hide(); 

$( ".boxpcfawe4" )
 .on("mouseenter", function() {
   if ($(".boxpcfawe4").hasClass("editable")) {
   
    $(".editcontpurpcfawe4").hide();
   } 
   else
   {
  
    $(".editcontpurpcfawe4").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcfawe4").hide();

});

 




 $(".editcontpurpcfawe4").click(function() {
   $(".boxpcfawe4").addClass("editable");
  $(this).hide();
  $(".contpurpcfawe4").show(); 
 
});

  $(".submitcontpurpcfawe4").click(function() {
  
  $(".contpurpcfawe4").hide();
   $(".boxpcfawe4").removeClass("editable");
addpcfontawesomecontpur4qi4();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur4qi4() {
var inputcontpurpcfawe4 = $('.inputcontpurpcfawe4').val();
 $('#purpcfawe4').removeClass();
  $('#purpcfawe4').addClass(inputcontpurpcfawe4);
  
}


$(document).ready(function(){

  $(".contpurpcfawe5").hide(); 

$( ".boxpcfawe5" )
 .on("mouseenter", function() {
   if ($(".boxpcfawe5").hasClass("editable")) {
   
    $(".editcontpurpcfawe5").hide();
   } 
   else
   {
  
    $(".editcontpurpcfawe5").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcfawe5").hide();

});

 




 $(".editcontpurpcfawe5").click(function() {
   $(".boxpcfawe5").addClass("editable");
  $(this).hide();
  $(".contpurpcfawe5").show(); 
 
});

  $(".submitcontpurpcfawe5").click(function() {
  
  $(".contpurpcfawe5").hide();
   $(".boxpcfawe5").removeClass("editable");
addpcfontawesomecontpur1i5();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur1i5() {
var inputcontpurpcfawe5 = $('.inputcontpurpcfawe5').val();
 $('#purpcfawe5').removeClass();
  $('#purpcfawe5').addClass(inputcontpurpcfawe5);
  
}

$(document).ready(function(){

  $(".contpurpcfawe6").hide(); 

$( ".boxpcfawe6" )
 .on("mouseenter", function() {
   if ($(".boxpcfawe6").hasClass("editable")) {
   
    $(".editcontpurpcfawe6").hide();
   } 
   else
   {
  
    $(".editcontpurpcfawe6").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcfawe6").hide();

});

 




 $(".editcontpurpcfawe6").click(function() {
   $(".boxpcfawe6").addClass("editable");
  $(this).hide();
  $(".contpurpcfawe6").show(); 
 
});

  $(".submitcontpurpcfawe6").click(function() {
  
  $(".contpurpcfawe6").hide();
   $(".boxpcfawe6").removeClass("editable");
addpcfontawesomecontpur6i6();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur6i6() {
var inputcontpurpcfawe6 = $('.inputcontpurpcfawe6').val();
 $('#purpcfawe6').removeClass();
  $('#purpcfawe6').addClass(inputcontpurpcfawe6);
 
}




$(document).ready(function(){

  $(".contpurpcfawe7").hide(); 

$( ".boxpcfawe7" )
 .on("mouseenter", function() {
   if ($(".boxpcfawe7").hasClass("editable")) {
   
    $(".editcontpurpcfawe7").hide();
   } 
   else
   {
  
    $(".editcontpurpcfawe7").show();
   }
  
})
.on("mouseleave", function() {
  
 
   $(".editcontpurpcfawe7").hide();

});

 




 $(".editcontpurpcfawe7").click(function() {
   $(".boxpcfawe7").addClass("editable");
  $(this).hide();
  $(".contpurpcfawe7").show(); 
 
});

  $(".submitcontpurpcfawe7").click(function() {
  
  $(".contpurpcfawe7").hide();
   $(".boxpcfawe7").removeClass("editable");
addpcfontawesomecontpur7i7();
Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});


function addpcfontawesomecontpur7i7() {
var inputcontpurpcfawe7 = $('.inputcontpurpcfawe7').val();
 $('#purpcfawe7').removeClass();
  $('#purpcfawe7').addClass(inputcontpurpcfawe7);
  
}
</script>

