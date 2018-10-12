@extends('admin.layouts.keditorheader')



@section('content')


<div class="page-header d-flex justify-content-between">
      <h2>Contact Form Builder</h2>
      <a href="{{ route('admin.cforms.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> Add
      </a>
    </div>


	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover table-striped table-sm table-responsive-md">
		 		<thead>
					<th>Contact Form Name</th>
					<th>Contact Form Shortcode</th>
					<th>Editing</th>
					<th>Preview</th>

					<th>Deleting</th>

					<tbody>

						@if($cforms->count())
						 @foreach($cforms as $cform)

			              <tr>
			              	<td>
			              		@if($cform->trashed())
			              		<strike style='color:red'>
								<p style='color:blue'>{{ $cform->cformname }}<p>
								</strike>
			              		@else
								{{ $cform->cformname }}
			              		@endif
			              		
			              	</td>
			              	<td>
			              		
								[{{ $cform->cshortcode}}]{{ $cform->cshortcode }}[/{{ $cform->cshortcode}}]
			              		
			              	</td>

			              	<td>

			              	<a class="btn btn-info" href="{{ route('admin.cforms.edit',['id'=>$cform->id]) }}">
			              	
			              			<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
			              	</a>
			              	</td>
			              	<td>

			              	<a class="btn btn-warning" href="{{ route('admin.cforms.preview',['id'=>$cform->id]) }}">
			              	
			              			<span><i class="fa fa-eye" aria-hidden="true"></i></span>
			              	</a>
			              	</td>
			              	<td>
			              	@if($cform->trashed())
			              	<a class="btn btn-warning" href="{{ route('admin.cforms.restore',['id'=>$cform->id]) }}">
			              	
			              			<i class="fa fa-repeat" aria-hidden="true"></i>
			              	</a>
			              	<a class="btn btn-danger" href="{{ route('admin.cforms.delete',['id'=>$cform->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	
			              	@else
			              	<a class="btn btn-danger" href="{{ route('admin.cforms.delete',['id'=>$cform->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	@endif
			              	</td>

			              </tr>
			             

						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		No forms are created yet 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@endsection