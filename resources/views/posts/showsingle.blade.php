<div id="app">
        
 <div class="jumbotron jumbotron bg-coverpost ">
  <div class="overlay"></div>
  <div class="container">
    <h3></h3>

   

    <p class="lead postlead"><span>{{ stripslashes($post->title) }}</span></p>
  </div>
</div>

<div class="container-fluid postbgcolor">
<div class="row">
	<div class="col-md-12 ">
	    <div class="bg-white p-3 post-card">
		<h4 v-pre></h4>
						
			<div v-pre class="post-content">
			
			{!! html_entity_decode($post->content) !!}
				
		
			
			

			
			</div>
			


	

<p class="mt-3">
<like
likes_count="{{ $post->likes_count }}"
liked="{{ $post->isLiked() }}"
item_id="{{ $post->id }}"
item_slug="{{ $post->slug }}"
item_type="posts"
item_token="{{Auth::user()->api_token}}"
logged_in="{{ Auth::check() }}"
></like>
</p>
</div>
@include ('comments/_list')

</div>
</div>
</div>
</div>
 

     
  