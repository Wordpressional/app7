<script>
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

    readURLmone2(this);
});

});
function readURLmone2(input) {
 
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.themeone .quote').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
             alert(data);
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
                var newLocation = "{{ url('/admin/forms') }}";
              window.location.href= newLocation;
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
    
  //Uploadsave2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave3("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave4("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave5("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave6("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
   
  //Uploadsave7("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave8("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave9("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave10("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave11("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave12("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave13("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave14("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave15("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave16("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave17("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
    
  //Uploadsave18("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

});

  

function readURL1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL1(this);
});

function readURL2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL2(this);
});



function readURL3(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

$("#mcolorlibimageUpload3").change(function() {

    readURL3(this);
});

function readURL4(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview4').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL4(this);
});



function readURL5(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL5(this);
});

function readURL6(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview6').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL6(this);
});



function readURL7(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL7(this);
});

function readURL8(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview8').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL8(this);
});

function readURL9(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview9').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL9(this);
});

function readURL10(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview10').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL10(this);
});


function readURL11(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview11').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL11(this);
});

function readURL12(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview12').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL12(this);
});


function readURL13(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview13').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

    readURL13(this);
});


function readURL14(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview14').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

$("#mcolorlibimageUpload14").change(function() {

    readURL14(this);
});


function readURL15(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview15').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

$("#mcolorlibimageUpload15").change(function() {

    readURL15(this);
});


function readURL16(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview16').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

$("#mcolorlibimageUpload16").change(function() {

    readURL16(this);
});


function readURL17(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview17').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

$("#mcolorlibimageUpload17").change(function() {

    readURL17(this);
});



function readURL18(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#mcolorlibimagePreview18').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
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

$("#mcolorlibimageUpload18").change(function() {

    readURL18(this);
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

</script>
 
