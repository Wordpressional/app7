@extends('cadmin.layouts.master')

@section('content')
    <div class="page-header">
      <h1>Authors</h1>
      <a class="btn btn-sm btn-primary moveright" href="{{route('cadmin.authors.createa')}}">Add New User</a>
    </div>

<br>
    @include ('cadmin/authors/_list')
@endsection
