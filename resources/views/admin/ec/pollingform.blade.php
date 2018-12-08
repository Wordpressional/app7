@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
	<div class="row">

<div class="col-md-7">
	<h3> Information from polling stations </h3>
<div class="card" style="margin:50px 0">
    <!-- Default panel contents -->
    <div class="card-header">Pre Poll Details</div>
<br>  <center><b>Today: <?php echo date("d-m-Y H:i:s"); ?><b></center><br>
    <ul class="list-group list-group-flush">
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
        <li class="list-group-item">    <center><p>Mock Poll Conducted </p></center>
                 <center>  <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
<span class="absolute-no">NO</span>
</label></center> 
        </li>
         <li class="list-group-item">
    <center>  <button id='mockpoll' onClick="submitclosurecount()" class="btn btn-primary">Submit  </button></center>
</li>
       
    </ul>
</div> 
</div>
</div>
</div>
@endsection