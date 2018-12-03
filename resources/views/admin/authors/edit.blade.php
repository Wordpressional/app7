@extends('admin.layouts.master')

@section('content')
    <p>@lang('users.show') : {{ link_to_route('users.show', route('users.show', $user), $user) }}</p>

    @include('admin/authors/_form')
@endsection
