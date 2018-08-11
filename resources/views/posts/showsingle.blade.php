 <div id="app">
        

        <div class="container">
            @include('shared/alerts')

            <div class="row">
                <div class="col-md-12">
                   <div class="bg-white p-3 post-card">
                    <h4 v-pre>{{ $post->title }}</h4>
						

						

						<!--<div class="mb-3">
						<small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->fullname, $post->author) }}</small>,
						<small class="text-muted">{{ humanize_date($post->posted_at) }}</small>
						</div>-->

						<div v-pre class="post-content">
						{!! $post->content !!}
						</div>
					  
				      <!--<div class="card-text"><strong><small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->fullname, $post->author) }}</small></strong></div>
				      <div class="card-text"><strong><small v-pre class="text-muted">{{ $post->pubyear }}</small></strong></div>-->
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
						</div>
						@include ('comments/_list')


                </div>
            </div>
        </div>

        
    </div>
  