@extends('admin.layouts.masterelection')


@section('content')
<div class="container">
	<div class="row">

<div class="col-md-6">
	<h3> Pre Poll Details </h3>
<div class="card" style="margin:50px 0">
    <!-- Default panel contents -->
    <div class="card-header">Pre Poll Details</div>

    <ul class="list-group list-group-flush">
       <li class="list-group-item">
            Safe Arrival
                    <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
</label>
        </li>
        <li class="list-group-item">
            Mock Poll Conducted
                    <label class="switch ">
<input type="checkbox" class="primary">
<span class="slider round"></span>
</label>
        </li>
       
    </ul>
</div> 
</div>
</div>
</div>
@endsection