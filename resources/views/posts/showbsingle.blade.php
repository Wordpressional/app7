 <div id="app">
        
 <div class="jumbotron jumbotron bg-coverpost ">
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
			

<div class="card-text"><small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->displayname, $post->author) }}</small></div>
<div class="card-text"><small v-pre class="text-muted">{{ $post->pubyear }}</small></div>
<br>


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
 

     
  