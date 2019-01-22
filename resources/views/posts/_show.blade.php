
 @php
  $skips = ["[","]","\""];
    $pval = $post->tags->pluck('tag');

    $ppval = str_replace($skips, '', $pval);
    $sep = explode(',', $ppval);

@endphp

<div class="col-lg-12 col-md-12">

<div class="card card-green carddim">
    <div class="card-body">
	
      <h6 class="card-title"><span v-pre>{{ $post->title }}</span></h6>
	  <div class="card-separator"></div>
	  <br>
	  <div class="imgcenter">
	   @if ($post->hasThumbnail())
    <a href="{{ route('webhome.single', $post)}}">
      @if ($post->hasThumbnail())
		{{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'img-fluid rounded']) }}
		@endif
    </a>
    @endif
    
  
     


	  <div class="card-text">
     

      <!--<small class="text-muted">{{ humanize_date($post->posted_at) }}</small><br>-->
      <small class="text-muted">
        <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $post->comments_count }}
        
   @if($post->likes_count == 0)
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
@else

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
@endif
      </small>
    </div>
     {!! $post->excerpt !!}
     <div class="card-text"><small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->displayname, $post->author) }}</small></div>
      <div class="card-text"><small v-pre class="text-muted">{{ $post->pubyear }}</small></div>
      <br>
     
      <button class="btn btn-sm align-self-center fa-white readmorebtn" >{{ link_to_route('webhome.bsingle', 'Read More', $post) }}</button>

       <div style="padding:0px; margin-bottom: 0px; background: #ffffff;">
      <hr class="line11">
      @foreach($sep as $s)
      <center><i class="fa fa-tags"></i>&nbsp;&nbsp;&nbsp;<span class="link11">{{ link_to_route('webhome.tagtype', $s, $s) }}</span></center>
      @endforeach
      <hr class="line11">


      </div>
      </div>
    </div>
    
  </div>

</div>