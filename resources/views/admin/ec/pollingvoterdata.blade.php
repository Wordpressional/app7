@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
	<div class="row">

<div class="col-md-7">
	<h3> Information from polling stations </h3>
<div class="card" style="margin:50px 0">
  
    <div class="card-header">After Poll Details - 1</div>
<br>  <center><b>Today: <?php echo date("d-m-Y H:i:s"); ?></b></center><br>
     <ul class="list-group list-group-flush">
     	 <li class="list-group-item">

    

    <center><small>Select time</small></center>

   <input class="timepicker text-center form-control" jt-timepicker="" time="model.time" time-string="model.timeString" default-time="model.options.defaultTime" time-format="model.options.timeFormat" start-time="model.options.startTime" min-time="model.options.minTime" max-time="model.options.maxTime" interval="model.options.interval" dynamic="model.options.dynamic" scrollbar="model.options.scrollbar" dropdown="model.options.dropdown"> 
<br></li>
       <li class="list-group-item">
	<h5>Final voter turnout count</h5>
 Male: <input type='text' id="mtotalcount" name="totalcount" class="form-control"  ><br>
 Female: <input type='text' id="ftotalcount" name="totalcount" class="form-control" ><br>
 Other: <input type='text' id="ototalcount" name="totalcount" class="form-control"><br>

 Total:
   <input type='text' id="ototalcount" name="totalcount" class="form-control" readonly="readonly">

<br>

</li>


<li class="list-group-item"><center><button id='turnoutvotercount' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button></center></li>
</ul>
</div>

<div class="card" style="margin:50px 0">
 <div class="card-header">After Poll Details - 2</div>
 <br>  <center><b>Today: <?php echo date("d-m-Y H:i:s"); ?><b></center><br>
 <ul class="list-group list-group-flush">
 <li class="list-group-item">

    

    <center><small>Select time</small></center>

   <input class="timepicker text-center form-control" jt-timepicker="" time="model.time" time-string="model.timeString" default-time="model.options.defaultTime" time-format="model.options.timeFormat" start-time="model.options.startTime" min-time="model.options.minTime" max-time="model.options.maxTime" interval="model.options.interval" dynamic="model.options.dynamic" scrollbar="model.options.scrollbar" dropdown="model.options.dropdown"> 
<br></li>


 <li class="list-group-item">
            <center><p> Safe arrival of polling party at Record Room </p></center>
                    <center> <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center>
        </li>


<li class="list-group-item"><center><button id='safearrival' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button></center></li>
</ul>
</div>
</div>
</div>
</div>


@endsection
