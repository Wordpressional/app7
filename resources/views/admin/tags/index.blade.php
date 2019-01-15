@extends('admin.layouts.master')



@section('content')


<div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.tag')</h1>
      <a href="{{ route('admin.tags.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
      </a>
    </div>


	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover table-striped table-sm table-responsive-md">
		 		<thead>
					<th>@lang('tag.tagname')</th>

					<th>Edit</th>
					<th>View</th>
					<th>Delete</th>

					<tbody>

						@if($tags->count())
						 @foreach($tags as $tag)

			              <tr>
			              	<td>
			              		@if($tag->trashed())
			              		<strike style='color:red'>
								<p style='color:blue'>{{ $tag->tag }}<p>
								</strike>
			              		@else
								{{ $tag->tag }}
			              		@endif
			              		
			              	</td>

			              	<td>

			              	<a class="btn btn-info" href="{{ route('admin.tags.edit',['id'=>$tag->id]) }}">
			              	
			              	<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
			              	</a>
			              	</td>

			              	<td>
			              		<a class="btn btn-warning" href="{{ route('webhome.tagtypeconf', $tag->tag) }}" target="_blank">
			              	
			              			<span><i class="fa fa-eye" aria-hidden="true"></i></span>
			              	</a>

			                </td>

			              	<td>
			              	@if($tag->trashed())
			              	<a class="btn btn-warning" href="{{ route('admin.tags.restore',['id'=>$tag->id]) }}">
			              	
			              			<i class="fa fa-repeat" aria-hidden="true"></i>
			              	</a>
			              	<a class="btn btn-danger" href="{{ route('admin.tags.delete',['id'=>$tag->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	
			              	@else
			              	<a class="btn btn-danger" href="{{ route('admin.tags.delete',['id'=>$tag->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	@endif
			              	</td>

			              </tr>
			             

						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		No tags are created yet 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@stop