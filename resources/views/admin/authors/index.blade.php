@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
      <h1>Authors</h1>
      <a class="btn btn-sm btn-primary moveright" href="{{route('admin.authors.createa')}}">Add New User</a>
    </div>

<br>
    @include ('admin/authors/_list')
@endsection
