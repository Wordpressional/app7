@extends('cadmin.layouts.master')

@section('content')
    <p>@lang('posts.show') : {{ link_to_route('webhome.single', route('webhome.single', $comment->post), $comment->post) }}</p>
    @include('cadmin/comments/_form')
@endsection
