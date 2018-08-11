@foreach($posts as $post)
<div class="card-text"><small v-pre class="text-muted">{{ link_to_route('users.show', $post->author->fullname, $post->author) }}</small></div>
@endforeach