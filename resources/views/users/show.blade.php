@extends('layouts.frontend')

@section('contentfrontend')


{!! html_entity_decode($branding->pagebanner) !!}
 

     
 

<div class="container marboth">

  <div class="row">
    <div class="col-md-12">
      <div class="card mb-2">
        <div class="card-body text-center">
          <h2 v-pre class="card-title mb-0">{{ $user->displayname }}</h2>
          <!--<small class="card-subtitle mb-2 text-muted">{{ $user->email }}</small>-->

          <div class="card-text row mt-3">
            <div class="col-md-4">
              <span class="text-muted d-block">@lang('comments.comments')</span>
              {{ $comments_count }}
            </div>

            <div class="col-md-4">
              <span class="text-muted d-block">@lang('posts.posts')</span>
              {{ $posts_count }}
            </div>

            <div class="col-md-4">
              <span class="text-muted d-block">@lang('likes.likes')</span>
              {{ $likes_count }}
            </div>
          </div>

          @profile($user)
            {{ link_to_route('users.edit', __('users.edit'), [], ['class' => 'btn btn-primary btn-sm float-right']) }}
          @endprofile
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <h2>@lang('comments.last_comments')</h2>
      @each('users/_comment', $comments, 'comment')
    </div>

    <div class="col-md-12">
      <h2>Latest Posts</h2>
   
         
                
            @each('posts/_showlinks', $posts, 'post', 'posts/_empty')

          
          
    </div>
  </div>
</div>



<div class="copy_right_area1">
<div class="container"> 
{!! html_entity_decode($branding->footer) !!}
</div>
</div>
@endsection
@section('css')
<style>
/* Banner Background Color */
.bg-cover {
    background: {{ $colorsetting[11]->color }} !important;
    
}
.project_area:before
{
  background: transparent !important;
}
.overlay {
   background: transparent !important;
}

/* Background Page Color */

body.bg-light {
    background: {{ $colorsetting[8]->color }} !important;
}

/* Footer Background Color */

.copy_right_area1 {
    background: {{ $colorsetting[9]->color }} !important;
}

.lead span {
  color: {{ $colorsetting[0]->color }} !important;
}
</style>
@endsection