@extends('admin.layouts.master')


@section('content')

     
      @include('admin.includes.errors')


      <div class="page-header">
      	<h1>Create a New Tag</h1>
      </div>
<div class="panel panel-default">
      <div class="panel-body">
      	<form action="{{ route('admin.tags.store') }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="tag">Tag Name</label>
            	<input type="text" name="tag" placeholder="Enter Your Blog Category Name" class="form-control">
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Create Tag</button>
            	 </div>
            </div>



      	</form>
      </div>

  </div>

@stop