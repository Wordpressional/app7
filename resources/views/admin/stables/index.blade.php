@extends('admin.layouts.keditorheader')



@section('content')


<div class="page-header d-flex justify-content-between">
      <h2>Tables Management</h2>
      
    </div>


	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover table-striped table-sm table-responsive-md">
		 		<thead>
					<th>Contact Form Name</th>
					<th>Table Name</th>
					<th>Editing</th>
					

					<th>Deleting</th>

					<tbody>

						@if($stables->count())
						 @foreach($stables as $stable)

			              <tr>
			              	<td>
			              		@if($stable->trashed())
			              		<strike style='color:red'>
								<p style='color:blue'>{{ $stable->cformname }}<p>
								</strike>
			              		@else
								{{ $stable->cformname }}
			              		@endif
			              		
			              	</td>
			              	<td>
			              		
								{{ $stable->cshortcode }}
			              		
			              	</td>

			              	<td>

			              	<a class="btn btn-info" href="{{ route('admin.stables.edit',['id'=>$stable->id]) }}">
			              	
			              			<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
			              	</a>
			              	</td>
			              	
			              	<td>
			              	@if($stable->trashed())
			              	<a class="btn btn-warning" href="{{ route('admin.stables.restore',['id'=>$stable->id]) }}">
			              	
			              			<i class="fa fa-repeat" aria-hidden="true"></i>
			              	</a>
			              	<a class="btn btn-danger" href="{{ route('admin.stables.delete',['id'=>$stable->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	
			              	@else
			              	<a class="btn btn-danger" href="{{ route('admin.stables.delete',['id'=>$stable->id]) }}">
			              	
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