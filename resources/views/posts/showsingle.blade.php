<div id="app">
        
 <div class="jumbotron jumbotron bg-cover ">
  <div class="overlay"></div>
  <div class="container">
    <h3></h3>

   

    <p class="lead postlead"><span>{{ $post->title }}</span></p>
  </div>
</div>

<div class="container-fluid postbgcolor">
<div class="row">
	<div class="col-md-12 ">
	   
		<h4 v-pre></h4>
						
			<div v-pre class="post-content">
			
			{!! html_entity_decode($post->content) !!}
				
		
			
			

			
			</div>
			


	

	<p class="mt-3">
<like
likes_count="{{ $post->likes_count }}"
liked="{{ $post->isLiked() }}"
item_id="{{ $post->id }}"
item_type="posts"
logged_in="{{ Auth::check() }}"
></like>
</p>

@include ('comments/_list')

</div>
</div>
</div>
</div>
 

        


<div class="copy_right_area1">
<div class="container"> 
{!! html_entity_decode($branding->footer) !!}
</div>
</div>

  