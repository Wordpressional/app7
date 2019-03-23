@extends('cadmin.layouts.master')


@section('content')

     
      @include('cadmin.includes.errors')


     <div class="page-header">
      	<h1>Update  Tag :{{ $tag->tag }}</h1>
      </div>
<div class="panel panel-default">
      <div class="panel-body">
      	<form action="{{ route('cadmin.tags.update',['id'=>$tag->id]) }}" method="POST">
      		
      		{{ csrf_field() }}

            <div class="form-group">
            	<label for="tag">Tag Name</label>
            	<input type="text" name="tag" value="{{ $tag->tag }}"  placeholder="Enter Your Blog Category Name" class="form-control">
                  <br>
                  <p>@lang('posts.link') : {{ link_to_route('webhome.tagtypeconf', route('webhome.tagtypeconf', $tag->tag), $tag->tag) }}</p>
            </div>

            <div class="from-group">
            	 <div class="text-right">
            	 	<button class="btn btn-success" type="submit">Update Tag</button>
                         {{ link_to_route('cadmin.tags', __('forms.actions.back'), [], ['class' => 'btn btn-secondary pull-left']) }}
            	 </div>
                  
             
             
            
            </div>
            


      	</form>
      </div>

  </div>

@stop