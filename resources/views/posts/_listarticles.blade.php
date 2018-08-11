
<div>

    @each('posts/_showarticles', $posts, 'post', 'posts/_empty')
</div>

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>

