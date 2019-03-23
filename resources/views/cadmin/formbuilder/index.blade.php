@extends('cadmin.layouts.keditorindex')



@section('content')


<div class="page-header d-flex justify-content-between">
      <h2>Page Builder</h2>
      <a href="{{ route('cadmin.forms.create') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> Add
      </a>
    </div>


	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover table-striped table-sm table-responsive-md">
		 		<thead>
					<th>@lang('form.formname')</th>
					<th>Shortcode</th>
					<th>Edit</th>
					<th>Preview</th>

					<th>Delete</th>

					<tbody>

						@if($forms->count())
						 @foreach($forms as $form)

			              <tr>
			              	<td>
			              		@if($form->trashed())
			              		<strike style='color:red'>
								<p style='color:blue'>{{ $form->formname }}<p>
								</strike>
			              		@else
								{{ $form->formname }}
			              		@endif
			              		
			              	</td>
			              	<td>
			              		@if($form->formname == "Home_Page")
			              		[homepage]{{$form->shortcode}}[/homepage]
			              		@elseif($form->formname == "Front_Page")
			              		[frontpage]{{$form->shortcode}}[/frontpage]
			              		@else
								[{{ $form->shortcode}}]{{ $form->shortcode }}[/{{ $form->shortcode}}]
								@endif
			              		
			              	</td>

			              	<td>

			              	<a class="btn btn-info" href="{{ route('cadmin.forms.edit',['id'=>$form->id]) }}">
			              	
			              			<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
			              	</a>
			              	</td>
			              	<td>
			              	@if($form->formname == "Home_Page")
			              	<a class="btn btn-warning" href="{{ URL::to('/') }}">
			              	
			              			<span><i class="fa fa-eye" aria-hidden="true"></i></span>
			              	</a>
			              	@else
			              	<a class="btn btn-warning" href="{{ route('cadmin.forms.preview',['id'=>$form->id]) }}">
			              	
			              			<span><i class="fa fa-eye" aria-hidden="true"></i></span>
			              	</a>
			              	@endif
			              	
			              	</td>
			              	<td>
			              	@if($form->trashed())
			              	<a class="btn btn-warning" href="{{ route('cadmin.forms.restore',['id'=>$form->id]) }}">
			              	
			              			<i class="fa fa-repeat" aria-hidden="true"></i>
			              	</a>
			              	<a class="btn btn-danger" href="{{ route('cadmin.forms.delete',['id'=>$form->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	
			              	@else
			              	@if($form->formname != "Home_Page")
			              	@if($form->formname != "Front_Page")
			              	<a class="btn btn-danger" href="{{ route('cadmin.forms.delete',['id'=>$form->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	@endif
			              	@endif
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
			<div class="d-flex justify-content-center">
			{{ $forms->links() }}
		    </div>
	 	</div>
	 </div>
	

@endsection