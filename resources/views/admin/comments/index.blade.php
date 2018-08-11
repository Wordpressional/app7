@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
      <h1>@lang('dashboard.comments')</h1>
    </div>

    @include ('admin/comments/_list')
@endsection
