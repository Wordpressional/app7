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