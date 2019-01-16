@extends('admin.layouts.masterelection')


@section('content')
  <div class="page-header">
    <h1>Profile</h1>
  </div>

  <div class="row">
    <div class="col-xl-4 col-sm-6 ">
      <div class="bg-userthree text-light">
      <div class="row justify-content-between">
        
        <div class="text-left"  style="padding:30px;">
            <div class="huge"> <i class="fa fa-star" aria-hidden="true"></i>&nbsp;Role</div>
            <div> {{ $thisuser->roles[0]->display_name }}</div>
        </div>
      </div>
    </div>
     
    </div>

    <div class="col-xl-4 col-sm-6">
      <div class="bg-usertwo text-light">
      <div class="row justify-content-between">
        
        <div class="text-left"  style="padding:30px;">
            <div class="huge"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp;Name</div>
            <div>   {{ $thisuser->name }}</div>
        </div>
      </div>
    </div>
     
    </div>

    <div class="col-xl-4 col-sm-6 mb-3">
      <div class="bg-userone text-light">
      <div class="row justify-content-between">
        
        <div class="text-left"  style="padding:30px;">
            <div class="huge"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; Email</div>
            <div>   {{ $thisuser->email }}</div>
        </div>
      </div>
    </div>
    </div>
</div>
 





@endsection
