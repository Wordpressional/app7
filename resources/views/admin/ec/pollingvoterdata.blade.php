@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
    <div class="row">

<div class="col-md-7">
    <h3> Information from Polling Stations </h3>



<div style="margin:50px 0;">

    <h5>Final voter turnout count</h5>



   <input type='text' id="ototalcount" name="totalcount" class="form-control" >

<br>



 <li class="list-group-item">
            <center><p> Safe arrival of polling party at Record Room </p></center>
                    <center> <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center>
        </li>
<br>

<button id='closurecount' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button>
</div>
</div>
</div>
</div>

@endsection
