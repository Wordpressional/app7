<div class="card mb-2">
  
    <h6 v-pre class="card-title" style="padding:10px 0px 0px 30px;">
      {{ link_to_route('webhome.single', $post->title, $post) }}
    </h6>

   <!--  <div v-pre class="card-text post-content">{!! $post->content !!}</div>
    <p class="card-text">
      <small class="text-muted">{{ humanize_date($post->posted_at) }}</small><br>
      <small class="text-muted">
        <i class="fa fa-comments-o" aria-hidden="true"></i> {{ $post->comments_count }}
        <i class="fa fa-heart-o ml-2" aria-hidden="true"></i> {{ $post->likes_count }}
      </small>
    </p> -->

</div>
