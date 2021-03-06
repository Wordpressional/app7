@extends('layouts.app')

@section('content')
  <div class="bg-white p-3 post-card">
    @if ($post->hasThumbnail())
      {{ Html::image($post->thumbnail()->url, $post->thumbnail()->original_filename, ['class' => 'img-fluid rounded']) }}
    @endif

    <h3 v-pre>{{ $post->title }}</h3>

    <div class="mb-3">
      <small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->fullname, $post->author) }}</small>,
      <small class="text-muted">{{ humanize_date($post->posted_at) }}</small>
    </div>

    <div v-pre class="post-content">
      {!! html_entity_decode($post->content) !!}
    </div>

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
  </div>

  @include ('comments/_list')
@endsection
