@extends('cadmin.layouts.master')


@section('content')

     
      @include('cadmin.includes.errors')


      <div class="page-header">
      	<h1>Create a New Tag</h1>
      </div>
<div class="panel panel-default">
      <div class="panel-body">
      	<form action="{{ route('cadmin.tags.store') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="tag">Tag Name</label>
            	<input type="text" name="tag" placeholder="Enter Your Blog Category Name" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Create Tag</button>
                         {{ link_to_route('cadmin.tags', __('forms.actions.back'), [], ['class' => 'btn btn-secondary pull-left']) }}
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop