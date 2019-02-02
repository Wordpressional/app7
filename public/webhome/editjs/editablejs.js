<<<<<<< HEAD
let modalId = $('#image-gallery');

$(document)
  .ready(function () {

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current) {
      $('#show-previous-image, #show-next-image')
        .show();
      if (counter_max === counter_current) {
        $('#show-next-image')
          .hide();
      } else if (counter_current === 1) {
        $('#show-previous-image')
          .hide();
      }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr) {
      let current_image,
        selector,
        counter = 0;

      $('#show-next-image, #show-previous-image')
        .click(function () {
          if ($(this)
            .attr('id') === 'show-previous-image') {
            current_image--;
          } else {
            current_image++;
          }

          selector = $('[data-image-id="' + current_image + '"]');
          updateGallery(selector);
        });

      function updateGallery(selector) {
        let $sel = selector;
        current_image = $sel.data('image-id');
        $('#image-gallery-title')
          .text($sel.data('title'));
        $('#image-gallery-image')
          .attr('src', $sel.data('image'));
        disableButtons(counter, $sel.data('image-id'));
      }

      if (setIDs == true) {
        $('[data-image-id]')
          .each(function () {
            counter++;
            $(this)
              .attr('data-image-id', counter);
          });
      }
      $(setClickAttr)
        .on('click', function () {
          updateGallery($(this));
        });
    }
  });

// build key actions
$(document)
  .keydown(function (e) {
    switch (e.which) {
      case 37: // left
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-previous-image').is(":visible")) {
          $('#show-previous-image')
            .click();
        }
        break;

      case 39: // right
        if ((modalId.data('bs.modal') || {})._isShown && $('#show-next-image').is(":visible")) {
          $('#show-next-image')
            .click();
        }
        break;

      default:
        return; // exit this handler for other keys
    }
    e.preventDefault(); // prevent the default action (scroll / move caret)
  });

$(document).ready(function(){

   $(".imageUploadsnipetimage1").hide();

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
  
});




$("#imageUploadsnipetimage1").change(function() {

    readURLsnipetimg1(this);
});

});
function readURLsnipetimg1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage1').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage1a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage2").hide();

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
  
});




$("#imageUploadsnipetimage2").change(function() {

    readURLsnipetimg2(this);
});

});
function readURLsnipetimg2(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage2').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage2a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage3").hide();

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
  
});




$("#imageUploadsnipetimage3").change(function() {

    readURLsnipetimg3(this);
});

});
function readURLsnipetimg3(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage3').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage3a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}



$(document).ready(function(){

   $(".imageUploadsnipetimage4").hide();

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
  
});




$("#imageUploadsnipetimage4").change(function() {

    readURLsnipetimg4(this);
});

});
function readURLsnipetimg4(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage4').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage4a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage5").hide();

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
  
});




$("#imageUploadsnipetimage5").change(function() {

    readURLsnipetimg5(this);
});

});
function readURLsnipetimg5(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage5').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage5a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}
$(document).ready(function(){

   $(".imageUploadsnipetimage6").hide();

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
  
});




$("#imageUploadsnipetimage6").change(function() {

    readURLsnipetimg6(this);
});

});
function readURLsnipetimg6(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage6').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage6a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage7").hide();

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
  
});




$("#imageUploadsnipetimage7").change(function() {

    readURLsnipetimg7(this);
});

});
function readURLsnipetimg7(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage7').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage7a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage8").hide();

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
  
});




$("#imageUploadsnipetimage8").change(function() {

    readURLsnipetimg8(this);
});

});
function readURLsnipetimg8(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage8').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage8a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}


$(document).ready(function(){

   $(".imageUploadsnipetimage9").hide();

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
  
});




$("#imageUploadsnipetimage9").change(function() {

    readURLsnipetimg9(this);
});

});
function readURLsnipetimg9(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage9').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage9a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage10").hide();

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
  
});




$("#imageUploadsnipetimage10").change(function() {

    readURLsnipetimg10(this);
});

});
function readURLsnipetimg10(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage10').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage10a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){

   $(".imageUploadsnipetimage11").hide();

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
  
});




$("#imageUploadsnipetimage11").change(function() {

    readURLsnipetimg11(this);
});

});
function readURLsnipetimg11(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewsnipetimage11').attr('src', e.target.result);
                 $('.imagePreviewsnipetimage11a').attr('data-image', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}
=======
>>>>>>> 51d808c38fd569d6a1eefb7e9b8c4c9f3be62950
