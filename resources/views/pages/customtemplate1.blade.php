 @extends('layouts.frontend')

@section('contentfrontend')
 @include ('layouts/innerpageheader')
  @include ('layouts/innerpageslider')
 
<div class="jumbotron jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h3></h3>

   

    <p class="lead"><span>{{ $page->display_name }}</span></p>
  </div>
</div>

<div class="container">
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
