@extends('cadmin.layouts.master')

@section('content')
    <h1>@lang('posts.create')</h1>

    {!! Form::open(['route' => ['cadmin.posts.store'], 'method' =>'POST', 'files' => true]) !!}
        @include('cadmin/posts/_form')

        {{ link_to_route('cadmin.posts.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
