<table class="table table-hover table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('posts.count', $posts->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('posts.attributes.title')</th>
             <th>Category</th>
            <th>@lang('posts.attributes.author')</th>
           
            <th>@lang('posts.attributes.posted_at')</th>
            <th><i class="fa fa-comments" aria-hidden="true"></i></th>
            <th><i class="fa fa-heart" aria-hidden="true"></i></th>
            <th>View</th>
             @if($thisuser->isCMSSubscriber() == "yes")
             <th></th>
             @else
            <th>Actions</th>
             @endif
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)

            <tr>
                <td>@if($post->trashed())
                    <strike style='color:red'>
                    <p style='color:blue'>{{ $post->title }}<p>
                    </strike>
                    @else
                    {{ $post->title }} 
                    @endif</td>
                <td>{{ $post->category['name'] }}</td>
                <td>@if($thisuser->isCMSAdmin() == "yes" || $thisuser->isSAdmin() == "yes" || $thisuser->isSuperadministrator() == "yes") 
                    @if($post->author)
                        {{ link_to_route('cadmin.authors.edita', $post->author->name, $post->author) }} @else {{ $post->author->name }} 
                    @endif
                @endif</td>
                
                <td>{{ humanize_date($post->posted_at, 'd/m/Y H:i:s') }}</td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->comments_count }}</span></td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->likes_count }}</span></td>
                <td>
                    <a class="btn btn-warning" href="{{ route('webhome.single', $post) }}" target="_blank">
                
                        <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                </a>

                </td>
                @if($thisuser->isCMSSubscriber() == "yes")
                <td></td>
                @else

                <td>
                    

                    @if($post->trashed())
                    @if($thisuser->isCMSEditor() == "yes" || $thisuser->isCMSAuthor() == "yes")
                    @if($post->createdby == $thisuser->id)
                    <a class="btn btn-warning" href="{{ route('cadmin.posts.restore', ['id' => $post->id]) }}">
                            
                            <i class="fa fa-repeat" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" href="{{ route('cadmin.posts.delete', ['id' => $post->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
                    @else
                     <a class="btn btn-warning" href="{{ route('cadmin.posts.restore', ['id' => $post->id]) }}">
                            
                            <i class="fa fa-repeat" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" href="{{ route('cadmin.posts.delete', ['id' => $post->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
                    @else
                    @if($thisuser->isCMSEditor() == "yes" || $thisuser->isCMSAuthor() == "yes")
                    <a href="{{ route('cadmin.posts.edit', $post->id) }}" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    @if($post->createdby == $thisuser->id)

                     <a class="btn btn-danger" href="{{ route('cadmin.posts.delete', ['id' => $post->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @else
                    
                    @endif
                    
                    @else
                    <a href="{{ route('cadmin.posts.edit', $post->id) }}" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" href="{{ route('cadmin.posts.delete', ['id' => $post->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                    @endif
                    @endif
                </td>
                @endif
            </tr>
           
           
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
