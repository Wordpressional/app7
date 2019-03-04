@extends('admin.layouts.master')

@section('content')
    <h1>@lang('pages.create')</h1>
<br>
<p style="color:blue;">Disable static page and enable only landing page link add "nil" to header and footer field.</p>
<hr>
    {!! Form::open(['route' => ['admin.pages.store'], 'method' =>'POST', 'files' => true]) !!}
        @include('admin/pages/_form')

        {{ link_to_route('admin.pages.index', __('forms.actions.back'), [], ['class' => 'btn btn-secondary']) }}
        {!! Form::submit(__('forms.actions.save'), ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
@endsection
