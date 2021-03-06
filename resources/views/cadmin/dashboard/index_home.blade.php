@extends('cadmin.layouts.master')

@section('content')
  <div class="page-header">
    <h1>@lang('dashboard.this_week')</h1>
  </div>

  <div class="row">
    <div class="col-xl-4 col-sm-6 mb-3">
      @include('cadmin/dashboard/_posts')
    </div>

    <div class="col-xl-4 col-sm-6 mb-3">
      @include('cadmin/dashboard/_comments')
    </div>

    <div class="col-xl-4 col-sm-6 mb-3">
      @include('cadmin/dashboard/_users')
    </div>
</div>
 
<div class="page-header">
    <h1>@lang('dashboard.count')</h1>
  </div>

  <div class="row">
    <div class="col-xl-12 col-sm-12 mb-3">
      @include('cadmin/dashboard/_rbac')
    </div>

   
</div>




@endsection
