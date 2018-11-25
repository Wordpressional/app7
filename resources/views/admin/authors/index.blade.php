@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
      <h1>@lang('dashboard.users')</h1>
    </div>

    @include ('admin/authors/_list')
@endsection
