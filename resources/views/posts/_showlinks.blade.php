<div class="spacediv">
<div class="card card-green cardlin">
    <div class="card-body">
	
      <h6 class="card-title"><span v-pre>{{ link_to_route('webhome.single', $post->title, $post) }}</span></h6>
	  <div class="card-separator"></div><br>
	  <div class="row">
	  
  
  <div class="fleft col-lg-9">


     
	  <p class="card-text">
      
      <small class="text-muted">
        <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $post->comments_count }}
        
@if($post->likes_count >= 0)
@if(Auth::user())

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
@else
<p class="mt-3">
<like
likes_count="{{ $post->likes_count }}"
liked=""
item_id="{{ $post->id }}"
item_slug="{{ $post->slug }}"
item_type="posts"
item_token=""
logged_in="{{ Auth::check() }}"
></like>
</p>
@endif
@endif
      </small>
    </p>
    
    </div>
    
  </div>
  </div>
</div>
</div>
