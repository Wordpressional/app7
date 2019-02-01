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


</script>