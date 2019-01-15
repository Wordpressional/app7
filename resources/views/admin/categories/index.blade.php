@extends('admin.layouts.master')



@section('content')


 <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.category')</h1>
      <a href="{{ route('admin.category.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
      </a>
    </div>


	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover table-striped table-sm table-responsive-md">
		 		<thead>
					<th>@lang('category.catname')</th>

					<th>Edit</th>
					<th>View</th>
					<th>Delete</th>

					<tbody>

						@if($categories->count())
						 @foreach($categories as $category)

			              <tr>
			              	<td>
			              		@if($category->trashed())
			              		<strike style='color:red'>
								<p style='color:blue'>{{ $category->name }}<p>
								</strike>
			              		@else
								{{ $category->name }}
			              		@endif
			              	</td>

			              	<td>
			              	@if($category->name == "Default_Cat")
			              	@else
			              	<a class="btn btn-info" href="{{ route('admin.category.edit',['id'=>$category->id]) }}">
			              	
			              			<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
			              	</a>
			              	@endif
			              	</td>
			              	<td>
			              		<a class="btn btn-warning" href="{{ route('webhome.cattype', $category->name) }}" target="_blank">
			              	
			              			<span><i class="fa fa-eye" aria-hidden="true"></i></span>
			              	</a>
			              </td>
			              	<td>
			              	@if($category->trashed())
			              	<a class="btn btn-warning" href="{{ route('admin.category.restore',['id'=>$category->id]) }}">
			              	
			              			<i class="fa fa-repeat" aria-hidden="true"></i>
			              	</a>
			              	<a class="btn btn-danger" href="{{ route('admin.category.delete',['id'=>$category->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	@elseif($category->name == "Default_Cat")
			              	@else
			              	<a class="btn btn-danger" href="{{ route('admin.category.delete',['id'=>$category->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	@endif
			              	</td>

			              </tr>
			             

						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		No Category Create yet 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@stop