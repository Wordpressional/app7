<div class="spacediv">

<div class="card card-green cardart">
    <div class="card-body">
	
      <h6 class="card-title"><span v-pre>{{ $post->title }}</span></h6>
	  <div class="card-separator"></div><br>
	  <div class="row">
	  
	   
 
   <div class=" col-lg-2">
		  @if ($post->hasThumbnail())
    <a href="{{ route('webhome.single', $post)}}">
      @if ($post->hasThumbnail())
		{{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'img-fluid img-fluid-art rounded']) }}
		@endif
    </a>
	
  @endif
 </div>
  @if ($post->hasThumbnail())
    <div class=" col-lg-10">
  @else
    <div class=" col-lg-12">
  @endif  
	  <p class="card-text">
     {!! $post->excerpt !!}
      <small class="text-muted">
        <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $post->comments_count }}
        
        <like
		likes_count="{{ $post->likes_count }}"
		liked="{{ $post->isLiked() }}"
		item_id="{{ $post->id }}"
		item_type="posts"
		logged_in="{{ Auth::check() }}"
		></like>
      </small>
    </p>
      <button class="btn btn-sm align-self-center btnstyle readmorebtn">{{ link_to_route('webhome.single', 'Read More', $post) }}</button>
   </div>
  </div>
  </div>
  </div>
</div>


