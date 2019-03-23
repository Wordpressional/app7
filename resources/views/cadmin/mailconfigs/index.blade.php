@extends('cadmin.layouts.master')



@section('content')


 <div class="page-header d-flex justify-content-between">
      <h1>@lang('dashboard.mailconf')</h1>
      <a href="{{ route('cadmin.mailconfig.createmailconfig') }}" class="btn btn-primary btn-sm align-self-center">
        <i class="fa fa-plus-square" aria-hidden="true"></i> @lang('forms.actions.add')
      </a>
    </div>


	 <div class="panel panel-default">
	 	<div class="panel-body">
	 		
			<table class="table table-hover table-striped table-sm table-responsive-md">
		 		<thead>
					<th>@lang('mailconfig.mname')</th>

					<th>Edit</th>
					<th>View</th>
					<th>Delete</th>

					<tbody>

						@if($mailconfs->count())
						 @foreach($mailconfs as $mconf)

			              <tr>
			              	<td>
			              		@if($mconf->trashed())
			              		<strike style='color:red'>
								<p style='color:blue'>{{ $mconf->mailfname }}<p>
								</strike>
			              		@else
								{{ $mconf->mailfname }}
			              		@endif
			              	</td>

			              	<td>
			              	
			              	<a class="btn btn-info" href="{{ route('cadmin.mailconfig.editmailconfig',['id'=>$mconf->id]) }}">
			              	
			              			<span><i class="fa fa-pencil" aria-hidden="true"></i></span>
			              	</a>
			              
			              	</td>
			              	<td>
			              		<a class="btn btn-warning" href="{{ route('cadmin.mailconfig.viewmailconfig' ,['id'=>$mconf->id]) }}" target="_blank">
			              	
			              			<span><i class="fa fa-eye" aria-hidden="true"></i></span>
			              	</a>
			              </td>
			              	<td>
			              	@if($mconf->trashed())
			              	<a class="btn btn-warning" href="{{ route('cadmin.mailconfig.restoremailconfig',['id'=>$mconf->id]) }}">
			              	
			              			<i class="fa fa-repeat" aria-hidden="true"></i>
			              	</a>
			              	<a class="btn btn-danger" href="{{ route('cadmin.mailconfig.deletemailconfig',['id'=>$mconf->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	 @else
			              	<a class="btn btn-danger" href="{{ route('cadmin.mailconfig.deletemailconfig',['id'=>$mconf->id]) }}">
			              	
			              			<i class="fa fa-trash" aria-hidden="true"></i>
			              	</a>
			              	@endif
			              	</td>

			              </tr>
			             
			             
						 @endforeach

						 @else 
                              <tr>
                              	<th colspan="5" style="background-color: rgb(23,45,67);color: white;" class="text-center">
                              		No Config File Created yet 
                              	</th>
                              </tr>

						 @endif
					</tbody>
				</thead>
			</table>
			 <div class="d-flex justify-content-center">
        {{ $mailconfs->links() }}
      </div>
	 	</div>
	 </div>
	

@stop