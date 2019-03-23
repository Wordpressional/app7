@extends('cadmin.layouts.master')

@section('content')
 <h1>Edit Authors</h1>

     <p>@lang('users.show') : {{ link_to_route('users.show', route('users.show', $user), $user) }}</p>

    @include('cadmin/authors/_eform')
@endsection
