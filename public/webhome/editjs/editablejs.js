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


"use strict";
var center = { x: 325, y: 175 };
var serv_dist = 250;
var pointer_dist = 172;
var pointer_time = 2;
var icon_size = 42;
var circle_radius = 38;
var text_top_margin = 18;
var tspan_delta = 16;

//name is used as the title for the bubble
//icon is the id of the corresponding svg symbol
var services_data = [{ name: "Menu 1", icon: "industries" }, { name: "Menu 2", icon: "validation" }, { name: "Menu 3", icon: "engineering" }, { name: "Menu 4", icon: "management" }, { name: "Menu 5", icon: "manufacturing" }, { name: "Menu 6", icon: "technical" }, { name: "Menu 7", icon: "process" }];

var services = document.getElementById("service-collection");
var nav_container = document.getElementById("circle-nav-services");
var symbol_copy = document.getElementById("circle-nav-copy");
var use_copy = document.querySelector("use.nav-copy");

//Keeps code DRY avoiding namespace for element creation
function createSVGElement(el) {
  return document.createElementNS("http://www.w3.org/2000/svg", el);
}

//Quick setup for multiple attributes
function setAttributes(el, options) {
  Object.keys(options).forEach(function (attr) {
    el.setAttribute(attr, options[attr]);
  });
}

//Service bubbles are created dynamically
function addService(serv, index) {
  var group = createSVGElement("g");
  group.setAttribute("class", "service serv-" + index);

  /* This group is needed to apply animations in
    the icon and its background at the same time */
  var icon_group = createSVGElement("g");
  icon_group.setAttribute("class", "icon-wrapper");

  var circle = createSVGElement("circle");
  setAttributes(circle, {
    r: circle_radius,
    cx: center.x,
    cy: center.y
  });
  var circle_shadow = circle.cloneNode();
  setAttributes(circle, {
    class: 'shadow'
  });
  icon_group.appendChild(circle_shadow);
  icon_group.appendChild(circle);

  var symbol = createSVGElement("use");
  setAttributes(symbol, {
    'x': center.x - icon_size / 2,
    'y': center.y - icon_size / 2,
    'width': icon_size,
    'height': icon_size
  });
  symbol.setAttributeNS("http://www.w3.org/1999/xlink", "xlink:href", "#" + serv.icon);
  icon_group.appendChild(symbol);

  group.appendChild(icon_group);

  var text = createSVGElement("text");
  setAttributes(text, {
    x: center.x,
    y: center.y + circle_radius + text_top_margin
  });

  var tspan = createSVGElement("tspan");
  if (serv.name.indexOf('\n') >= 0) {

    var tspan2 = tspan.cloneNode();
    var name = serv.name.split('\n');
    jQuery(tspan).text(name[0]);
    jQuery(tspan2).text(name[1]);

    setAttributes(tspan2, {
      x: center.x,
      dy: tspan_delta
    });

    text.appendChild(tspan);
    text.appendChild(tspan2);
  } else {
    jQuery(tspan).text(serv.name);
    text.appendChild(tspan);
  }

  group.appendChild(text);
  services.appendChild(group);

  var service_bubble = jQuery(".serv-" + index);

  //Uses tween to look for right position
  twn_pivot_path.seek(index);
  TweenLite.set(service_bubble, {
    x: pivot_path.x,
    y: pivot_path.y,
    transformOrigin: "center center"
  });

  service_bubble.click(serviceClick);
}

//Creates pointer
function createPointer() {
  var service_pointer = createSVGElement("circle");

  setAttributes(service_pointer, {
    cx: center.x - pointer_dist,
    cy: center.y,
    r: 12,
    class: "pointer"
  });

  nav_container.appendChild(service_pointer);

  service_pointer = document.querySelector("svg .pointer");

  var pointer_circle = [{ x: 0, y: 0 }, { x: pointer_dist, y: pointer_dist }, { x: pointer_dist * 2, y: 0 }, { x: pointer_dist, y: -pointer_dist }, { x: 0, y: 0 }];

  twn_pointer_path.to(service_pointer, pointer_time, {
    bezier: {
      values: pointer_circle,
      curviness: 1.5 },
    ease: Power0.easeNone,
    transformOrigin: "center center"
  });
}

//Defines behavior for service bubbles
function serviceClick(ev) {

  //There's always an active service
  jQuery(".service.active").removeClass("active");

  var current = jQuery(ev.currentTarget);
  current.addClass("active");

  //There's a "serv-*" class for each bubble
  var current_class = current.attr("class").split(" ")[1];
  var class_index = current_class.split('-')[1];

  //Hides current text of the main bubble
  jQuery(use_copy).addClass("changing");

  //Sets pointer to the right position
  twn_pointer_path.tweenTo(class_index * (pointer_time / (2 * 6)));

  //After it's completely hidden, the text changes and becomes visible
  setTimeout(function () {
    var viewBoxY = 300 * class_index;
    symbol_copy.setAttribute("viewBox", "0 " + viewBoxY + " 300 300");
    jQuery(use_copy).removeClass("changing");
  }, 250);
}

//Array describes points for a whole circle in order to get
//the right curve
var half_circle = [{ x: -serv_dist, y: 0 }, { x: 0, y: serv_dist }, { x: serv_dist, y: 0 }, { x: 0, y: -serv_dist }, { x: -serv_dist, y: 0 }];

//A simple object is used in the tween to retrieve its values
var pivot_path = { x: half_circle[0].x, y: half_circle[0].y };

//The object is animated with a duration based on how many bubbles
//should be placed
var twn_pivot_path = TweenMax.to(pivot_path, 12, {
  bezier: {
    values: half_circle,
    curviness: 1.5
  },
  ease: Linear.easeNone
});

services_data.reduce(function (count, serv) {
  addService(serv, count);
  return ++count;
}, 0);

//The variable is modified inside the function
//but its also used later to toggle its class
var twn_pointer_path = new TimelineMax({ paused: true });
createPointer();

//Adding it immediately triggers a bug for the transform
setTimeout(function () {
  return jQuery("#service-collection .serv-0").addClass("active");
}, 200);
//# sourceURL=pen.js



$(document).ready(function(){

   $(".imageUploadteam1").hide();

$( ".boxteam1" )
 .on("mouseenter", function() {
   if ($(".boxteam1").hasClass("editable")) {
    $(".editteam1").hide();

   } 
   else
   {
    $(".editteam1").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam1").hide();

});

 $(".editteam1").click(function() {
  $(this).hide();
  $(".boxteam1").addClass("editable");
   $(".editteam1").hide();
  $(".saveteam1").show();
  $(".imageUploadteam1").show();
});

$(".saveteam1").click(function() {
  $(this).hide();
  $(".boxteam1").removeClass("editable");
 
  $(".editteam1").hide();
  $(".imageUploadteam1").hide();
  
});




$("#imageUploadteam1").change(function() {

    readURLteam1(this);
});

});
function readURLteam1(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewteam1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}


$(document).ready(function(){
$( ".boxteam2" )
 .on("mouseenter", function() {
   if ($(".boxteam2").hasClass("editable")) {
    $(".editteam2").hide();

   } 
   else
   {
    $(".editteam2").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam2").hide();

});

 $(".editteam2").click(function() {
  $(this).hide();
  $(".boxteam2").addClass("editable");
  $(".textteam2").attr("contenteditable", "true");
   $(".editteam2").hide();
  $(".saveteam2").show();
 
});

$(".saveteam2").click(function() {
  $(this).hide();
  $(".boxteam2").removeClass("editable");
 $(".textteam2").removeAttr("contenteditable");
  $(".editteam2").hide();
  
});
})

$(document).ready(function(){

   $(".imageUploadteam3").hide();

$( ".boxteam3" )
 .on("mouseenter", function() {
   if ($(".boxteam3").hasClass("editable")) {
    $(".editteam3").hide();

   } 
   else
   {
    $(".editteam3").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam3").hide();

});

 $(".editteam3").click(function() {
  $(this).hide();
  $(".boxteam3").addClass("editable");
   $(".editteam3").hide();
  $(".saveteam3").show();
  $(".imageUploadteam3").show();
});

$(".saveteam3").click(function() {
  $(this).hide();
  $(".boxteam3").removeClass("editable");
 
  $(".editteam3").hide();
  $(".imageUploadteam3").hide();
  
});




$("#imageUploadteam3").change(function() {

    readURLteam3(this);
});

});
function readURLteam3(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewteam3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){
$( ".boxteam4" )
 .on("mouseenter", function() {
   if ($(".boxteam4").hasClass("editable")) {
    $(".editteam4").hide();

   } 
   else
   {
    $(".editteam4").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam4").hide();

});

 $(".editteam4").click(function() {
  $(this).hide();
  $(".boxteam4").addClass("editable");
  $(".textteam4").attr("contenteditable", "true");
   $(".editteam4").hide();
  $(".saveteam4").show();
 
});

$(".saveteam4").click(function() {
  $(this).hide();
  $(".boxteam4").removeClass("editable");
 $(".textteam4").removeAttr("contenteditable");
  $(".editteam4").hide();
  
});
})

$(document).ready(function(){

   $(".imageUploadteam5").hide();

$( ".boxteam5" )
 .on("mouseenter", function() {
   if ($(".boxteam5").hasClass("editable")) {
    $(".editteam5").hide();

   } 
   else
   {
    $(".editteam5").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam5").hide();

});

 $(".editteam5").click(function() {
  $(this).hide();
  $(".boxteam5").addClass("editable");
   $(".editteam5").hide();
  $(".saveteam5").show();
  $(".imageUploadteam5").show();
});

$(".saveteam5").click(function() {
  $(this).hide();
  $(".boxteam5").removeClass("editable");
 
  $(".editteam5").hide();
  $(".imageUploadteam5").hide();
  
});




$("#imageUploadteam5").change(function() {

    readURLteam5(this);
});

});
function readURLteam5(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewteam5').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}


$(document).ready(function(){
$( ".boxteam6" )
 .on("mouseenter", function() {
   if ($(".boxteam6").hasClass("editable")) {
    $(".editteam6").hide();

   } 
   else
   {
    $(".editteam6").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam6").hide();

});

 $(".editteam6").click(function() {
  $(this).hide();
  $(".boxteam6").addClass("editable");
  $(".textteam6").attr("contenteditable", "true");
   $(".editteam6").hide();
  $(".saveteam6").show();
 
});

$(".saveteam6").click(function() {
  $(this).hide();
  $(".boxteam6").removeClass("editable");
 $(".textteam6").removeAttr("contenteditable");
  $(".editteam6").hide();
  
});
})



$(document).ready(function(){

   $(".imageUploadteam7").hide();

$( ".boxteam7" )
 .on("mouseenter", function() {
   if ($(".boxteam7").hasClass("editable")) {
    $(".editteam7").hide();

   } 
   else
   {
    $(".editteam7").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam7").hide();

});

 $(".editteam7").click(function() {
  $(this).hide();
  $(".boxteam7").addClass("editable");
   $(".editteam7").hide();
  $(".saveteam7").show();
  $(".imageUploadteam7").show();
});

$(".saveteam7").click(function() {
  $(this).hide();
  $(".boxteam7").removeClass("editable");
 
  $(".editteam7").hide();
  $(".imageUploadteam7").hide();
  
});




$("#imageUploadteam7").change(function() {

    readURLteam7(this);
});

});
function readURLteam7(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewteam7').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){
$( ".boxteam8" )
 .on("mouseenter", function() {
   if ($(".boxteam8").hasClass("editable")) {
    $(".editteam8").hide();

   } 
   else
   {
    $(".editteam8").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam8").hide();

});

 $(".editteam8").click(function() {
  $(this).hide();
  $(".boxteam8").addClass("editable");
  $(".textteam8").attr("contenteditable", "true");
   $(".editteam8").hide();
  $(".saveteam8").show();
 
});

$(".saveteam8").click(function() {
  $(this).hide();
  $(".boxteam8").removeClass("editable");
 $(".textteam8").removeAttr("contenteditable");
  $(".editteam8").hide();
  
});
})

$(document).ready(function(){

   $(".imageUploadteam9").hide();

$( ".boxteam9" )
 .on("mouseenter", function() {
   if ($(".boxteam9").hasClass("editable")) {
    $(".editteam9").hide();

   } 
   else
   {
    $(".editteam9").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam9").hide();

});

 $(".editteam9").click(function() {
  $(this).hide();
  $(".boxteam9").addClass("editable");
   $(".editteam9").hide();
  $(".saveteam9").show();
  $(".imageUploadteam9").show();
});

$(".saveteam9").click(function() {
  $(this).hide();
  $(".boxteam9").removeClass("editable");
 
  $(".editteam9").hide();
  $(".imageUploadteam9").hide();
  
});




$("#imageUploadteam9").change(function() {

    readURLteam9(this);
});

});
function readURLteam9(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewteam9').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}

$(document).ready(function(){
$( ".boxteam10" )
 .on("mouseenter", function() {
   if ($(".boxteam10").hasClass("editable")) {
    $(".editteam8").hide();

   } 
   else
   {
    $(".editteam10").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam10").hide();

});

 $(".editteam10").click(function() {
  $(this).hide();
  $(".boxteam10").addClass("editable");
  $(".textteam10").attr("contenteditable", "true");
   $(".editteam10").hide();
  $(".saveteam10").show();
 
});

$(".saveteam10").click(function() {
  $(this).hide();
  $(".boxteam10").removeClass("editable");
 $(".textteam10").removeAttr("contenteditable");
  $(".editteam10").hide();
  
});
})

$(document).ready(function(){

   $(".imageUploadteam11").hide();

$( ".boxteam11" )
 .on("mouseenter", function() {
   if ($(".boxteam11").hasClass("editable")) {
    $(".editteam11").hide();

   } 
   else
   {
    $(".editteam11").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam11").hide();

});

 $(".editteam11").click(function() {
  $(this).hide();
  $(".boxteam11").addClass("editable");
   $(".editteam11").hide();
  $(".saveteam11").show();
  $(".imageUploadteam11").show();
});

$(".saveteam11").click(function() {
  $(this).hide();
  $(".boxteam11").removeClass("editable");
 
  $(".editteam11").hide();
  $(".imageUploadteam11").hide();
  
});




$("#imageUploadteam11").change(function() {

    readURLteam11(this);
});

});
function readURLteam11(input) {
if (input.files && input.files[0]) {
            var reader = new FileReader();
            //console.log(input.files[0]);
            reader.onload = function (e) {
                $('#imagePreviewteam11').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
  
}
$(document).ready(function(){
$( ".boxteam12" )
 .on("mouseenter", function() {
   if ($(".boxteam12").hasClass("editable")) {
    $(".editteam12").hide();

   } 
   else
   {
    $(".editteam12").show();
   }
  
})
.on("mouseleave", function() {
  
  $(".editteam12").hide();

});

 $(".editteam12").click(function() {
  $(this).hide();
  $(".boxteam12").addClass("editable");
  $(".textteam12").attr("contenteditable", "true");
   $(".editteam12").hide();
  $(".saveteam12").show();
 
});

$(".saveteam12").click(function() {
  $(this).hide();
  $(".boxteam12").removeClass("editable");
 $(".textteam12").removeAttr("contenteditable");
  $(".editteam12").hide();
  
});
})
=======
$(".input").focus(function() {
	$(this).parent().addClass("focus");
});
>>>>>>> 82304b5ba579999138fa399d7a2933576d2d968b
