@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
      <h1>Authors</h1>
    </div>

    @include ('admin/authors/_list')
@endsection
