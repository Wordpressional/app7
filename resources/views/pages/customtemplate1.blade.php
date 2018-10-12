@extends('layouts.frontend')

@section('contentfrontend')


{!! html_entity_decode($branding->pagebanner) !!}
 
<div class="jumbotron jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h3></h3>

   

    <p class="lead"><span>{{ $page->display_name }}</span></p>
  </div>
</div>

<div class="container-fluid">
<div class="row">
	<div class="col-md-12">
	   <div class="bg-white p-3 post-card minh">
		<h4 v-pre></h4>
						
			<div v-pre class="post-content">
			
			{!! html_entity_decode($page->content) !!}
				
		
			
			</div>

			
			</div>
			


	</div>
</div>
</div>
 
@include ('layouts/innerpagefooter')

@endsection
@section('css')
<style>
.jumbotron{
	background: {{ $colorsetting[11]->color }} !important;

}
.project_area {
    background: {{ $colorsetting[11]->color }} !important;
}
.main_menu_area
{
  background: {{ $colorsetting[11]->color }} !important;
}
.project_area:before
{
	background: transparent !important;
}
.overlay {
   background: transparent !important;
}

body.bg-light {
    background: {{ $colorsetting[8]->color }} !important;
}

.bg-mycolor {
	background: {{ $colorsetting[1]->color }} !important;
}
</style>
@endsection