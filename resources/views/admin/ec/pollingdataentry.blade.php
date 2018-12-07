@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
    <div class="row">

<div class="col-md-7">
    <h3> Information from Polling Stations </h3>



<div style="margin:50px 0;">
 <button id='1' onClick="show(this.id)" class="btn btn-warning">Click here to start polling</button>

 <div class="pollingdata">
    <br><br>
    <input type='text' id="pollingstartedinpt" name="pollingstartedinpt" value="<?php echo date("d-m-Y H:i:s"); ?>" style="display:none;">
    <div id="pollingstarted" name="pollingstarted" style="color:green; font-weight: bold;"></div>

      
  <br>
    

    <h5>Enter polling data - Hourly</h5>
 <br>

 <h5>Select time</h5>

   <input class="timepicker text-center form-control" jt-timepicker="" time="model.time" time-string="model.timeString" default-time="model.options.defaultTime" time-format="model.options.timeFormat" start-time="model.options.startTime" min-time="model.options.minTime" max-time="model.options.maxTime" interval="model.options.interval" dynamic="model.options.dynamic" scrollbar="model.options.scrollbar" dropdown="model.options.dropdown"> 
<br>
    <h5>Enter vouters count</h5>



 Male: <input type='text' id="mtotalcount" name="totalcount" class="form-control"  ><br>
 Female: <input type='text' id="ftotalcount" name="totalcount" class="form-control" ><br>
 Other: <input type='text' id="ototalcount" name="totalcount" class="form-control"><br>

 Total Count: <input type='text' id="ototalcount" name="totalcount" class="form-control" readonly="readonly">

<br>


Voters in queue at the closure of poll:
<input type='text' id="ctotalcount" name="totalcount" class="form-control">
<br>

<button id='closurecount' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button>
</div>
</div>
</div>
</div>
</div>

@endsection
