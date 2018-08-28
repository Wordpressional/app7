 @extends('layouts.frontend')

@section('contentfrontend')
 @include ('layouts/innerpageheader')
  
 
<div class="jumbotron jumbotron bg-cover">
  <div class="overlay"></div>
  <div class="container">
    <h3></h3>

   

    <p class="lead"><span>{{ $page->display_name }}</span></p>
  </div>
</div>

<div class="container-fluid">
<div class="row">
	<div>
	   <div class="minh">
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

  