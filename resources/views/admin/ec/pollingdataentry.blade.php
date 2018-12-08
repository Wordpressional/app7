@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
    <div class="row">

<div class="col-md-7">
    <h3> Information from polling stations </h3>
<div class="card" style="margin:50px 0">
    <!-- Default panel contents -->
  
    <div class="card-header">During Poll Details</div>
<br>  <center><b>Today: <?php echo date("d-m-Y H:i:s"); ?><b></center><br>
     <ul class="list-group list-group-flush">
       <li class="list-group-item">

    

    <center><b>Enter polling data - Hourly</b></center>
 <br>

 <center><small>Select time</small></center>

   <input class="timepicker text-center form-control" jt-timepicker="" time="model.time" time-string="model.timeString" default-time="model.options.defaultTime" time-format="model.options.timeFormat" start-time="model.options.startTime" min-time="model.options.minTime" max-time="model.options.maxTime" interval="model.options.interval" dynamic="model.options.dynamic" scrollbar="model.options.scrollbar" dropdown="model.options.dropdown"> 
<br></li>
    <li class="list-group-item"><center><b>Enter vouters count</b></center>

<br>

 Male: <input type='text' id="mtotalcount" name="totalcount" class="form-control"  ><br>
 Female: <input type='text' id="ftotalcount" name="totalcount" class="form-control" ><br>
 Other: <input type='text' id="ototalcount" name="totalcount" class="form-control"><br>

 Total Count: <input type='text' id="ototalcount" name="totalcount" class="form-control" readonly="readonly">

<br>
</li>
 <li class="list-group-item">
   <center> <button id='closurecount' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button></center>
</li>
 <li class="list-group-item">
Voters in queue at the closure of poll:
<input type='text' id="ctotalcount" name="totalcount" class="form-control">
<br>
</li>
 <li class="list-group-item">
<button id='closurecount' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button>
</li>
</div>
</div>
</div>
</div>


@endsection
