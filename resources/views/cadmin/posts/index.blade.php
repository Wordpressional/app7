@extends('cadmin.layouts.master')

@section('content')
    <div class="page-header d-flex justify-content-between">
    	 @if($thisuser->isCMSSubscriber() == "yes")
    	 <h1>@lang('dashboard.posts')</h1>
    	 @else
    	 <h1>@lang('dashboard.posts')</h1>
    	 @endif
      
      <a href="{{ route('cadmin.posts.new.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
      </a>
    </div>

    @include ('cadmin/posts/_list')
@endsection
