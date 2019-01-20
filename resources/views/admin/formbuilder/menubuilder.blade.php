@extends('admin.layouts.master')


@section('content')
<div class="page-header">
        <h2>Menu Builder</h2>
            <hr>
</div>

{!! Menu::render() !!}
@endsection
@section('menuscripts')

    {!! Menu::scripts() !!}

@endsection