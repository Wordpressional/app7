@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
	<div class="row">

<div class="col-md-7">
	<h3> Information from polling stations </h3>
<div class="card" style="margin:50px 0">
    <!-- Default panel contents -->
    <div class="card-header">Pre Poll Details -1 </div>
<br>  <center><b>Today: <?php echo date("d-m-Y H:i:s"); ?></b></center><br>
    <ul class="list-group list-group-flush">
          <li class="list-group-item">

        <center> <small>Select time</small></center>

   <p><input class="timepicker text-center form-control" jt-timepicker="" time="model.time" time-string="model.timeString" default-time="model.options.defaultTime" time-format="model.options.timeFormat" start-time="model.options.startTime" min-time="model.options.minTime" max-time="model.options.maxTime" interval="model.options.interval" dynamic="model.options.dynamic" scrollbar="model.options.scrollbar" dropdown="model.options.dropdown"></p></li>

       <li class="list-group-item">
            <center><p> Safe Arrival of polling party at polling station </p></center>
                    <center> <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center>
        </li>
         <li class="list-group-item">
    <center>  <button id='safearrival' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button></center>
</li>
</ul>
</div>
<div class="card" style="margin:50px 0">
    <!-- Default panel contents -->
    <div class="card-header">Pre Poll Details -2 </div>
<br>  <center><b>Today: <?php echo date("d-m-Y H:i:s"); ?></b></center><br>
        <li class="list-group-item">    <center><p>Mock Poll Conducted </p></center>
                 <center>  <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center> 
        </li>
<li class="list-group-item">  <center> <p>Total number of agents present </p></center>
     <input type='text' id="agentstotalcount" name="totalcount" class="form-control"><br></li>
         <li class="list-group-item">
    <center>  <button id='mockpoll' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button></center>
</li>
       
    </ul>
</div> 
</div>
</div>
</div>
@endsection