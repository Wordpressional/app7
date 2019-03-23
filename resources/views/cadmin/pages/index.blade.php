@extends('cadmin.layouts.master')

@section('content')
    <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.pages')</h1>
      <a href="{{ route('cadmin.pages.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
      </a>
    </div>

    @include ('cadmin/pages/_list')
@endsection
