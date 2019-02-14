@extends('layouts.frontend')

@section('contentfrontend')


{!! html_entity_decode($page->headercode) !!}
 

  <div class="container-fluid bakimgs">
    <h3 class="leads">{{ $page->display_name }}</h3>

  </div>

<div class="container-fluid">
<div class="row">
	<div class="col-md-12 ">
	   
		
						
			<div v-pre class="post-content">
			
			{!! html_entity_decode($page->content) !!}
				
		
			
			

			
			</div>
			


	</div>
</div>
</div>
<div class="copy_right_area1">
<div class="container-fluid"> 
{!! html_entity_decode($page->footercode) !!}
</div>
</div>
@endsection
@section('css')

@if($page->ptitlecolor)
<style>

.project_area:before
{
	background: transparent !important;
}
.overlay {
   background: transparent !important;
}

/* Background Page Color */

body.bg-light {
    background: {{ $page->pcontbgcolor }} !important;
}

/* Footer Background Color */

.copy_right_area1 {
    background: {{ $page->pcontbgcolor }} !important;
}

.leads h3 {
	color: {{ $page->ptitlecolor }} !important;
}
</style>
@endif
@endsection
@section('menuscripts')

    {!! Menu::scripts() !!}

@endsection