$(document).ready(function(){

   $(".imageUploadcarouseltheme1").hide();

$( ".boxcarouseltheme1" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme1").hasClass("editable")) {
    $(".editcarouseltheme1").hide();

   } 
   else
   {
    $(".editcarouseltheme1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme1").hide();

});

 $(".editcarouseltheme1").click(function() {
  $(this).hide();
  $(".boxcarouseltheme1").addClass("editable");
   $(".editcarouseltheme1").hide();
  $(".savecarouseltheme1").show();
  $(".imageUploadcarouseltheme1").show();
});

$(".savecarouseltheme1").click(function() {
  $(this).hide();
  $(".boxcarouseltheme1").removeClass("editable");
 
  $(".editcarouseltheme1").hide();
  $(".imageUploadcarouseltheme1").hide();
  
});




$("#imageUploadcarouseltheme1").change(function() {

    readURLcarousel1(this);
});

});
function readURLcarousel1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}


$(document).ready(function(){

   $(".imageUploadcarouseltheme2").hide();

$( ".boxcarouseltheme2" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme2").hasClass("editable")) {
    $(".editcarouseltheme2").hide();

   } 
   else
   {
    $(".editcarouseltheme2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme2").hide();

});

 $(".editcarouseltheme2").click(function() {
  $(this).hide();
  $(".boxcarouseltheme2").addClass("editable");
   $(".editcarouseltheme2").hide();
  $(".savecarouseltheme2").show();
  $(".imageUploadcarouseltheme2").show();
});

$(".savecarouseltheme2").click(function() {
  $(this).hide();
  $(".boxcarouseltheme2").removeClass("editable");
 
  $(".editcarouseltheme2").hide();
  $(".imageUploadcarouseltheme2").hide();
  
});




$("#imageUploadcarouseltheme2").change(function() {

    readURLcarousel2(this);
});

});
function readURLcarousel2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}




$(document).ready(function(){

   $(".imageUploadcarouseltheme3").hide();

$( ".boxcarouseltheme3" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme3").hasClass("editable")) {
    $(".editcarouseltheme3").hide();

   } 
   else
   {
    $(".editcarouseltheme3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme3").hide();

});

 $(".editcarouseltheme3").click(function() {
  $(this).hide();
  $(".boxcarouseltheme3").addClass("editable");
   $(".editcarouseltheme3").hide();
  $(".savecarouseltheme3").show();
  $(".imageUploadcarouseltheme3").show();
});

$(".savecarouseltheme3").click(function() {
  $(this).hide();
  $(".boxcarouseltheme3").removeClass("editable");
 
  $(".editcarouseltheme3").hide();
  $(".imageUploadcarouseltheme3").hide();
  
});




$("#imageUploadcarouseltheme3").change(function() {

    readURLcarousel3(this);
});

});
function readURLcarousel3(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}



$(document).ready(function(){

   $(".imageUploadcarouseltheme4").hide();

$( ".boxcarouseltheme4" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme4").hasClass("editable")) {
    $(".editcarouseltheme4").hide();

   } 
   else
   {
    $(".editcarouseltheme4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme4").hide();

});

 $(".editcarouseltheme4").click(function() {
  $(this).hide();
  $(".boxcarouseltheme4").addClass("editable");
   $(".editcarouseltheme4").hide();
  $(".savecarouseltheme4").show();
  $(".imageUploadcarouseltheme4").show();
});

$(".savecarouseltheme4").click(function() {
  $(this).hide();
  $(".boxcarouseltheme4").removeClass("editable");
 
  $(".editcarouseltheme4").hide();
  $(".imageUploadcarouseltheme4").hide();
  
});




$("#imageUploadcarouseltheme4").change(function() {

    readURLcarousel4(this);
});

});
function readURLcarousel4(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme4').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadcarouseltheme5").hide();

$( ".boxcarouseltheme5" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme5").hasClass("editable")) {
    $(".editcarouseltheme5").hide();

   } 
   else
   {
    $(".editcarouseltheme5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme5").hide();

});

 $(".editcarouseltheme5").click(function() {
  $(this).hide();
  $(".boxcarouseltheme5").addClass("editable");
   $(".editcarouseltheme5").hide();
  $(".savecarouseltheme5").show();
  $(".imageUploadcarouseltheme5").show();
});

$(".savecarouseltheme5").click(function() {
  $(this).hide();
  $(".boxcarouseltheme5").removeClass("editable");
 
  $(".editcarouseltheme5").hide();
  $(".imageUploadcarouseltheme5").hide();
  
});




$("#imageUploadcarouseltheme5").change(function() {

    readURLcarousel5(this);
});

});
function readURLcarousel5(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}




$(document).ready(function(){

   $(".imageUploadcarouseltheme6").hide();

$( ".boxcarouseltheme6" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme6").hasClass("editable")) {
    $(".editcarouseltheme6").hide();

   } 
   else
   {
    $(".editcarouseltheme6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme6").hide();

});

 $(".editcarouseltheme6").click(function() {
  $(this).hide();
  $(".boxcarouseltheme6").addClass("editable");
   $(".editcarouseltheme6").hide();
  $(".savecarouseltheme6").show();
  $(".imageUploadcarouseltheme6").show();
});

$(".savecarouseltheme6").click(function() {
  $(this).hide();
  $(".boxcarouseltheme6").removeClass("editable");
 
  $(".editcarouseltheme6").hide();
  $(".imageUploadcarouseltheme6").hide();
  
});




$("#imageUploadcarouseltheme6").change(function() {

    readURLcarousel6(this);
});

});
function readURLcarousel6(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme6').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}



$(document).ready(function(){

   $(".imageUploadcarouseltheme7").hide();

$( ".boxcarouseltheme7" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme7").hasClass("editable")) {
    $(".editcarouseltheme7").hide();

   } 
   else
   {
    $(".editcarouseltheme7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme7").hide();

});

 $(".editcarouseltheme7").click(function() {
  $(this).hide();
  $(".boxcarouseltheme7").addClass("editable");
   $(".editcarouseltheme7").hide();
  $(".savecarouseltheme7").show();
  $(".imageUploadcarouseltheme7").show();
});

$(".savecarouseltheme7").click(function() {
  $(this).hide();
  $(".boxcarouseltheme7").removeClass("editable");
 
  $(".editcarouseltheme7").hide();
  $(".imageUploadcarouseltheme7").hide();
  
});




$("#imageUploadcarouseltheme7").change(function() {

    readURLcarousel7(this);
});

});
function readURLcarousel7(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}


$(document).ready(function(){

   $(".imageUploadcarouseltheme8").hide();

$( ".boxcarouseltheme8" )
 .on("mouseenter", function() {
   if ($(".boxcarouseltheme8").hasClass("editable")) {
    $(".editcarouseltheme8").hide();

   } 
   else
   {
    $(".editcarouseltheme8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editcarouseltheme8").hide();

});

 $(".editcarouseltheme8").click(function() {
  $(this).hide();
  $(".boxcarouseltheme8").addClass("editable");
   $(".editcarouseltheme8").hide();
  $(".savecarouseltheme8").show();
  $(".imageUploadcarouseltheme8").show();
});

$(".savecarouseltheme8").click(function() {
  $(this).hide();
  $(".boxcarouseltheme8").removeClass("editable");
 
  $(".editcarouseltheme8").hide();
  $(".imageUploadcarouseltheme8").hide();
  
});




$("#imageUploadcarouseltheme8").change(function() {

    readURLcarousel8(this);
});

});
function readURLcarousel8(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewcarouseltheme8').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}