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
    

</div>
</div>
</div>
</div>
</div>

@endsection
