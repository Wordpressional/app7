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
	<div class="col-md-12 ">
	   
		<h4 v-pre></h4>
						
			<div v-pre class="post-content">
			
			{!! html_entity_decode($page->content) !!}
				
		
			
			

			
			</div>
			


	</div>
</div>
</div>
<div class="copy_right_area1">
<div class="container"> 
{!! html_entity_decode($branding->footer) !!}
</div>
</div>
@endsection
@section('css')
<style>
/* Banner Background Color */
.bg-cover{
	background: {{ $colorsetting[11]->color }};
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

/* Background Page Color */

body.bg-light {
    background: {{ $colorsetting[8]->color }} !important;
}

/* Footer Background Color */

.copy_right_area1 {
    background: {{ $colorsetting[9]->color }} !important;
}

.lead span {
	color: {{ $colorsetting[0]->color }} !important;
}
</style>
@endsection