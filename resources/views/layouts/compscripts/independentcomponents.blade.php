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
    
}

$("#mcolorlibimageUpload18").change(function() {

    readURL18(this);
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
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
  
});

 
});

function addHrefmabout4() {
var inputmaboutfacebook4 = $('.inputmaboutfacebook4').val();
  $('#hrefchangemaboutfacebook4').attr("href",inputmaboutfacebook4);
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
  
});

 
});

function addHrefmabout5() {
var inputmabouttwitter5 = $('.inputmabouttwitter5').val();
  $('#hrefchangemabouttwitter5').attr("href",inputmabouttwitter5);
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
  
});

 
});

function addHrefmabout6() {
var inputmabouttelegram6 = $('.inputmabouttelegram6').val();
  $('#hrefchangemabouttelegram6').attr("href",inputmabouttelegram6);
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
  
});

 
});

function addHrefmabout9() {
var inputmaboutfacebook9 = $('.inputmaboutfacebook9').val();
  $('#hrefchangemaboutfacebook9').attr("href",inputmaboutfacebook9);
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
  
});

 
});

function addHrefmabout10() {
var inputmabouttwitter10 = $('.inputmabouttwitter10').val();
  $('#hrefchangemabouttwitter10').attr("href",inputmabouttwitter10);
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
  
});

 
});

function addHrefmabout11() {
var inputmabouttelegram11 = $('.inputmabouttelegram11').val();
  $('#hrefchangemabouttelegram11').attr("href",inputmabouttelegram11);
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
  
});

 
});

function addHrefmabout14() {
var inputmaboutfacebook14 = $('.inputmaboutfacebook14').val();
  $('#hrefchangemaboutfacebook14').attr("href",inputmaboutfacebook14);
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
  
});

 
});

function addHrefmabout15() {
var inputmabouttwitter15 = $('.inputmabouttwitter15').val();
  $('#hrefchangemabouttwitter15').attr("href",inputmabouttwitter15);
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
  
});

 
});

function addHrefmabout16() {
var inputmabouttelegram16 = $('.inputmabouttelegram16').val();
  $('#hrefchangemabouttelegram16').attr("href",inputmabouttelegram16);
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
  
});





$("#imageUploadmlaboutspathemeone17").change(function() {

    readURLmabout17(this);
});

});
function readURLmabout17(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutspathemeone17').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmlaboutspathemeone18").change(function() {

    readURLmabout18(this);
});

});
function readURLmabout18(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutspathemeone18').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmlaboutspathemeone19").change(function() {

    readURLmabout19(this);
});

});
function readURLmabout19(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutspathemeone19').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

</script>