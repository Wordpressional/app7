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
             //alert(data);
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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
  Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
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

    readURLabt1(this);
});

});
function readURLabt1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmlaboutt1theme1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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

    readURLmbanner2(this);
});

});
function readURLmbanner2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.themeone .welcome-image-area').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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

    readURLmthree1(this);
});

});
function readURLmthree1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.themeone .facts').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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

    readURLmac2(this);
});

});
function readURLmac2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.cbakimg').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

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
  $('#hrefchangemfooterfacebook2').attr("href",inputmfooterfacebook2);
}


$(document).ready(function(){

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
  $('#hrefchangemfootertwitter3').attr("href",inputmfootertwitter3);
}



$(document).ready(function(){

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
  $('#hrefchangemfooterrss4').attr("href",inputmfooterrss4);
}




$(document).ready(function(){

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
  $('#hrefchangemfooteryoutube5').attr("href",inputmfooteryoutube5);
}



$(document).ready(function(){

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
  $('#hrefchangemfooterlinkedin6').attr("href",inputmfooterlinkedin6);
}



$(document).ready(function(){

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
  $('#hrefchangemfootergoogleplus7').attr("href",inputmfootergoogleplus7);
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
  $('#hrefchangemservice1facebook7').attr("href",inputmservice1facebook7);
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
  $('#hrefchangemservice1twitter8').attr("href",inputmservice1twitter8);
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
  $('#hrefchangemservice1telegram9').attr("href",inputmservice1telegram9);
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

    readURLparallaxtwo2(this);
});

});
function readURLparallaxtwo2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.backstretchtwo').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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

    readURLparallaxtwo3(this);
});

});
function readURLparallaxtwo3(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
              console.log(e.target.result);
               $('.backstretchone').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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

    readURLms8(this);
});

});
function readURLms8(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('.mlservicechangeclass').attr('class', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}
$(document).ready(function(){

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

 Uploadsavemone2("{{route('admin.forms.updatepre',['id'=>$form->id])}}","{{ $form->id }}");
});

  $(".submitpresentationcolor").click(function() {
  
  $(".contpresentationcolor").hide();
   $(".boxmlservicetheme1").removeClass("editable");
addpresentationcolor();
  
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
  
});





$("#imageUploadmmultithemeone1").change(function() {

    readURLmmulti1(this);
});

});
function readURLmmulti1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone2").change(function() {

    readURLmmulti2(this);
});

});
function readURLmmulti2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone5").change(function() {

    readURLmmulti5(this);
});

});
function readURLmmulti5(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone7").change(function() {

    readURLmmulti7(this);
});

});
function readURLmmulti7(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone9").change(function() {

    readURLmmulti9(this);
});

});
function readURLmmulti9(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone9').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone10").change(function() {

    readURLmmulti10(this);
});

});
function readURLmmulti10(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone10').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone11").change(function() {

    readURLmmulti11(this);
});

});
function readURLmmulti11(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone11').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone12").change(function() {

    readURLmmulti12(this);
});

});
function readURLmmulti12(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone12').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone24").change(function() {

    readURLmmulti24(this);
});

});
function readURLmmulti24(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone24').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone25").change(function() {

    readURLmmulti25(this);
});

});
function readURLmmulti25(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone25').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone26").change(function() {

    readURLmmulti26(this);
});

});
function readURLmmulti26(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone26').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone27").change(function() {

    readURLmmulti27(this);
});

});
function readURLmmulti27(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone27').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone28").change(function() {

    readURLmmulti28(this);
});

});
function readURLmmulti28(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone28').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone29").change(function() {

    readURLmmulti29(this);
});

});
function readURLmmulti29(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone29').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone34").change(function() {

    readURLmmulti34(this);
});

});
function readURLmmulti34(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone34').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone35").change(function() {

    readURLmmulti35(this);
});

});
function readURLmmulti35(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone35').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone36").change(function() {

    readURLmmulti36(this);
});

});
function readURLmmulti36(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone36').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone47").change(function() {

    readURLmmulti47(this);
});

});
function readURLmmulti47(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone47').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone48").change(function() {

    readURLmmulti48(this);
});

});
function readURLmmulti48(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone48').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone49").change(function() {

    readURLmmulti49(this);
});

});
function readURLmmulti49(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone49').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone50").change(function() {

    readURLmmulti50(this);
});

});
function readURLmmulti50(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone50').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone51").change(function() {

    readURLmmulti51(this);
});

});
function readURLmmulti51(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone51').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone52").change(function() {

    readURLmmulti52(this);
});

});
function readURLmmulti52(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone52').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone53").change(function() {

    readURLmmulti53(this);
});

});
function readURLmmulti53(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone53').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone54").change(function() {

    readURLmmulti54(this);
});

});
function readURLmmulti54(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone54').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone55").change(function() {

    readURLmmulti55(this);
});

});
function readURLmmulti55(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewmmultithemeone55').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone60").change(function() {

    readURLmmulti60(this);
});

});
function readURLmmulti60(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mmultithemeone.demo-banner').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
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
  
});





$("#imageUploadmmultithemeone61").change(function() {

    readURLmmulti61(this);
});

});
function readURLmmulti61(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            console.log(input.files[0]);
            reader.onload = function (e) {
               $('.mmultithemeone.responsive_retina_support').css('background-image', 'url('+e.target.result +')');
               
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}


</script>