@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
	<div class="row">

<div class="col-md-7">
	<h3> Information from polling stations </h3>
<div class="card" style="margin:50px 0">
    <!-- Default panel contents -->
    <div class="card-header">Exception Details</div>

    <ul class="list-group list-group-flush">
       <li class="list-group-item">
            <center><p> Poll Interrupted due to EVM Non-Functioning </p></center>
                    <center> <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center>
        </li>
        <li class="list-group-item">    <center><p>Poll interruption due to Law & Order problem </p></center>
                 <center>  <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center> 
        </li>

        <li class="list-group-item">    <center><p>Poll interruption due to other Problem </p></center>
                 <center>  <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center> 
        </li>

        <li class="list-group-item">    <center><p>Problem resolved </p></center>
                 <center>  <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center> 
        </li>
       
    </ul>
</div> 
</div>
</div>
</div>
@endsection