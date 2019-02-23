@extends('layouts.frontendsite')

@section('contentfrontend')



<div class="container-fluid">
<div class="row">
	
			
			{!! html_entity_decode($page->content) !!}
				
		
		
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