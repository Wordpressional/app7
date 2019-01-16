@extends('admin.layouts.keditorheader')



@section('content')


<div class="page-header d-flex justify-content-between">
      <h2>Widget Shortcodes Management</h2>
      
    </div>


	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover table-striped table-sm table-responsive-md">
		 		<thead>
					<th>@lang('form.formname')</th>
					<th>Shortcode</th>
					<th>Edit</th>
					

					

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
			              		
			              		@elseif($form->formname == "Front_Page")
			              		
			              		@else
								{{ $form->shortcode }}
								@endif
			              		
			              	</td>

			              	<td>
			              		@if($form->formname == "Home_Page")
			              		
			              		@elseif($form->formname == "Front_Page")
			              		
			              		@else
			              	<a class="btn btn-info" href="{{ route('admin.forms.shortedit',['id'=>$form->id]) }}">
			              	
			              			<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
			              	</a>
			              		@endif
			              	</td>
			              	
			              	

			              </tr>
			             

						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		No shortcodes are created yet 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
	 	</div>
	 </div>
	

@endsection