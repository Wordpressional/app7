<div id="app">
 <div class="posttitlebg">
    <h3 class="hfont">{{ $post->title }}</h3>
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
item_type="postshow"
logged_in="{{ Auth::check() }}"
></like>
</p>

@include ('comments/_list')

</div>
</div>
</div>
</div>
 

        




  