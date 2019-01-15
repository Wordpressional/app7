<script>
$(document).ready(function() {
      
  $('.pollingdata').hide();
});
   

$('.timepicker').timepicker({
    timeFormat: 'h:mm p',
    interval: 60,
    //minTime: '10',
    //maxTime: '12:00pm',
    //defaultTime: '11',
    startTime: '1:00',
    dynamic: false,
    dropdown: true,
    scrollbar: true
});

</script>
<script>

    function show(id) {
    
     if (id == 1) {

        var d = $('#pollingstartedinpt').val();
        
        document.getElementById('pollingstarted').innerHTML = "Polling Started at: "+ d;
        $('.pollingdata').show();
     }
     

     
   }


</script>

