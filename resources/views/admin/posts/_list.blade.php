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
            <th>Actions</th>
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
                <td>{{ link_to_route('admin.authors.edita', $post->author->name, $post->author) }}</td>
                
                <td>{{ humanize_date($post->posted_at, 'd/m/Y H:i:s') }}</td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->comments_count }}</span></td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->likes_count }}</span></td>
                <td>
                    <a class="btn btn-warning" href="{{ route('webhome.single', $post) }}" target="_blank">
                
                        <span><i class="fa fa-eye" aria-hidden="true"></i></span>
                </a>

                </td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>

                    @if($post->trashed())
                    <a class="btn btn-warning" href="{{ route('admin.posts.restore', ['id' => $post->id]) }}">
                            
                            <i class="fa fa-repeat" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-danger" href="{{ route('admin.posts.delete', ['id' => $post->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                    @else

                     <a class="btn btn-danger" href="{{ route('admin.posts.delete', ['id' => $post->id]) }}">
                    
                            <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>

                    @endif
                </td>
            </tr>
           
           
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
