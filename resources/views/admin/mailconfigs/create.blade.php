@extends('admin.layouts.master')


@section('content')

     
      @include('admin.includes.errors')

 <div class="page-header">
      <h1>@lang('category.catcreate')</h1>
    </div>
<div class="panel panel-default">
      <div class="panel-body">
      	<form action="{{ route('admin.category.store') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="name">Category Name</label>
            	<input type="text" name="name" placeholder="Enter Your Blog Category Name" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Create Category</button>
                        {{ link_to_route('admin.categories', __('forms.actions.back'), [], ['class' => 'btn btn-secondary pull-left']) }}
            	 </div>
            </div>



      	</form>
      </div>

 </div> 

@stop