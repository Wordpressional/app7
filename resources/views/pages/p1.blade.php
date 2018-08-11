
@if($posts)
<ul>
@foreach($posts as $post)
<li>
@if($category == 'projects' || $category == 'events')
{{ link_to_route('webhome.single', $post->title, $post) }}
@endif
</li>
@endforeach
</ul>

@if( $category == 'conferences')
@if($pagec == 'conference series')
{{ $pagedetail->content }}

@endif
@endif
<div style="float:right;">
@if($category == 'events')
<a href="{{ url('/arttype').'/'.$category }}" class="btn btn-sm align-self-center" style="background-color:#003F5B; color:#ffffff;">
View All
</a>
@endif
@if($category == 'projects')
<a href="{{ url('/linktype').'/'.$category }}" class="btn btn-sm align-self-center" style="background-color:#003F5B; color:#ffffff;">
View All
</a>
@endif
@if($category == 'conferences')
<a href="{{ url('/arttype').'/'.$category }}" class="btn btn-sm align-self-center" style="background-color:#003F5B; color:#ffffff;">
View All
</a>
@endif
</div>
@else
No Posts	
@endif
