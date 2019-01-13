//$('#btn-color-picker').colorpicker();
//$('#btn-color-picker').colorpicker().on(
//'changeColor',
//function() {
//$('.bg-userone').css('background-color', 'red');
//});



$(function() {
        $('#cp2').colorpicker({
            
            format: "hex"
        });

         $('#cp3').colorpicker({
           
            format: "hex"
        });

          $('#cp4').colorpicker({
            
            format: "hex"
        });

           $('#cp5').colorpicker({
            
            format: "hex"
        });

            $('#cp6').colorpicker({
            
            format: "hex"
        });

             $('#cp7').colorpicker({
            
            format: "hex"
        });

              $('#cp8').colorpicker({
            
            format: "hex"
        });
               $('#cp9').colorpicker({
            
            format: "hex"
        });
                $('#cp10').colorpicker({
            
            format: "hex"
        });
                 $('#cp11').colorpicker({
            
            format: "hex"
        });
                  $('#cp12').colorpicker({
            
            format: "hex"
        });

            $('#cp13').colorpicker({
            
            format: "hex"
        });
            $('#cp14').colorpicker({
            
            format: "hex"
        });
            
    });

$(document).ready(function(){
  
        $('.bg-white').addClass('bg-mycolor');
        $('.bg-mycolor').removeClass('bg-white');

});