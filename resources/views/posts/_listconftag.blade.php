@if($page)

<div class=" col-lg-12 bg-white padboth marboth">
{!! $page->content !!}
</div>
@endif

<div>
                  
    @each('posts/_showtagconf', $posts, 'post', 'posts/_empty')
  
</div>

<div class="d-flex justify-content-center">
    {{ $posts->links() }} 
</div>

