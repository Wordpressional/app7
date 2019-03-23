@extends('admin.layouts.adminpages')

@section('content')
 <h3> Registered Booth Officer Details </h3>
 <div class="container">
    <div class="row">

<div class="col-md-12">
<div class="panel panel-default">
      
      <div class="panel-body">


            <div class="form-group inbox">
               <h5> State </h5>
                <select name="state" class="form-control" id="state" style="width:150px">
                    <option value="">--- Select State ---</option>
                   
                        
                        <option value="1">Karnataka</option>
                        

                </select>

                
            </div>
             <div class="form-group inbox">
               
               
              <h5> District </h5>
                 <select name="dist" class="form-control" id="dist" style="width:150px"></select>
            </div>

            <div class="form-group inbox">
               
               
              <h5> AC </h5>
                 <select name="ac" class="form-control" id="ac" style="width:150px"></select>
            </div>

            <div class="form-group inbox">
               
               
              <h5> PS / Parts </h5>
                 <select name="part" class="form-control" id="part" ></select>
            </div>
           <div class="form-group inbox">
             <h5> Reset </h5>
              <a class="btn btn-md btn-default" href="{{route('admin.polling.showuserregreport')}}"> <i class="fa fa-refresh" aria-hidden="true"></i></a>
            </div>
      </div>


    </div>

    
		
</div>

	    <div class="row">

		<div class="col-md-12">
			<div>

           	  Choosen State:<span class="form-group selectedstate"> </span> | 
               District:<span class="form-group selecteddist"> </span> | 
               AC: <span class="form-group selectedac"> </span>
               

           	<div class="blodet"></div>

           </div> 

        </div>

        </div>
</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
 
    $(document).ready(function() {
     
        $('select[name="state"]').on('change', function() {

            var stateID = $(this).val();
            $("select[name='state'] option[value='"+stateID+"']").attr("selected","selected");
			//alert(stateID);
            var text = $( "select[name='state'] option:selected" ).text();
            $(".selectedstate").text(text);
            document.getElementById("state").disabled=true;
            //alert(text);
            if(stateID) {
                $.ajax({
                    url: '<?php echo url('/admin/ajax-select-dist') ?>/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	//alert(data.options);
                        $('select[name="dist"]').empty();
                        
                          $.each(data, function(key, value) {
                            $('select[name="dist"]').append(data.options);


                        });
                    }
                });
            }else{
                $('select[name="dist"]').empty();
            }
        });

          $('select[name="dist"]').on('change', function() {

            var distID = $(this).val();
            $("select[name='dist'] option[value='"+distID+"']").attr("selected","selected");
            //alert(stateID);
            var text = $( "select[name='dist'] option:selected" ).text();
            $(".selecteddist").text(text);
            document.getElementById("dist").disabled=true;
			//alert(stateID);
            if(distID) {
                $.ajax({
                    url: '<?php echo url('/admin/ajax-select-ac') ?>/'+distID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                    	//alert(data.options);
                        $('select[name="ac"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="ac"]').append(data.options);
                        });
                    }
                });
            }else{
                $('select[name="ac"]').empty();
            }
        });

          $('select[name="ac"]').on('change', function() {

            var distID = $(this).val();

            $("select[name='ac'] option[value='"+distID+"']").attr("selected","selected");
            //alert(stateID);
            var text = $( "select[name='ac'] option:selected" ).text();
            $(".selectedac").text(text);
            document.getElementById("ac").disabled=true;
      //alert(stateID);
            if(distID) {
                $.ajax({
                    url: '<?php echo url('/admin/ajax-select-part') ?>/'+distID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      //alert(data.options);
                        $('select[name="part"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="part"]').append(data.options);
                        });
                    }


                });
                //alert("hi");
                $.ajax({
                    url: '<?php echo url('/admin/ajax-select-blo') ?>/'+distID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      //alert(data.options);
                        $('.blodet').empty();
                        $.each(data, function(key, value) {
                            $('.blodet').append(data.result);
                        });
                    }
                });

                 
            }else{
                $('select[name="part"]').empty();
            }
        });


           $('select[name="part"]').on('change', function() {

            var partID = $(this).val();

            $("select[name='part'] option[value='"+partID+"']").attr("selected","selected");
            //alert(stateID);
            var text = $( "select[name='part'] option:selected" ).text();
            //$(".selectedpart").text(text);
           // document.getElementById("part").disabled=true;
      //alert(stateID);
            if(partID) {
              
                //alert("hi");
                $.ajax({
                    url: '<?php echo url('/admin/ajax-select-blopart') ?>/'+partID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                      //alert(data.options);
                        $('.blodet').empty();
                        $.each(data, function(key, value) {
                            $('.blodet').append(data.result);
                        });
                    }
                });

                 
            }else{
                $('select[name="part"]').empty();
            }
        });

    });

function blosearchfunc(){

 var q = $('#q').val();
var acid = $('#acid').val();
 var myKeyVals = { q : q, acid : acid };
         
                $.ajax({
                    url: '<?php echo url('/admin/blosearch') ?>',
                    type: "POST",
                    data: myKeyVals,
                    dataType: "json",
                    success:function(data) {
                      //alert(data.options);
                        $('.blodet').empty();
                        $.each(data, function(key, value) {
                            $('.blodet').append(data.result);
                        });
                    }
                });

                 
         
      

}

$(document).ready(function() {
    $('#example2').DataTable({
       "paging": false,
       "language": {
    "search": false
  },
  "responsive": true,
    "columnDefs": [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 4, targets: 3 },
                
            ]   
       
    });




} );


</script>

@endsection