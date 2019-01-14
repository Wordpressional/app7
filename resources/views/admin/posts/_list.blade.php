<table class="table table-hover table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('posts.count', $posts->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('posts.attributes.title')</th>
             <th>Category</th>
            <th>@lang('posts.attributes.author')</th>
            <th>Role</th>
            <th>@lang('posts.attributes.posted_at')</th>
            <th><i class="fa fa-comments" aria-hidden="true"></i></th>
            <th><i class="fa fa-heart" aria-hidden="true"></i></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
         
         @if($tuser == $post->author->displayname )
         @if($post->author->roles[0]->name == $data['n_userrole'])
        
       <tr>
                <td>@if($post->trashed())
                    <strike style='color:red'>
                    <p style='color:blue'>{{ $post->title }}<p>
                    </strike>
                    @else
                    {{ $post->title }} 
                    @endif</td>
                <td>{{ $post->category['name'] }}</td>
                <td>{{ link_to_route('admin.authors.edita', $post->author->displayname, $post->author) }}</td>
                <td> {{$post->author->roles[0]->name}} </td>
                <td>{{ humanize_date($post->posted_at, 'd/m/Y H:i:s') }}</td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->comments_count }}</span></td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->likes_count }}</span></td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">
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
           
            @endif
            @endif
            @if($post->author->isSuperadministrator() == "yes")

            <tr>
                <td>@if($post->trashed())
                    <strike style='color:red'>
                    <p style='color:blue'>{{ $post->title }}<p>
                    </strike>
                    @else
                    {{ $post->title }} 
                    @endif</td>
                <td>{{ $post->category['name'] }}</td>
                <td>{{ link_to_route('admin.authors.edita', $post->author->displayname, $post->author) }}</td>
                <td> {{$post->author->roles[0]->name}} </td>
                <td>{{ humanize_date($post->posted_at, 'd/m/Y H:i:s') }}</td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->comments_count }}</span></td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->likes_count }}</span></td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">
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
           
            @endif
            @if($post->author->isCMSAdmin() == "yes")
            @if($post->author->roles[0]->name != "superadministrator")
            <tr>
                <td>@if($post->trashed())
                    <strike style='color:red'>
                    <p style='color:blue'>{{ $post->title }}<p>
                    </strike>
                    @else
                    {{ $post->title }} 
                    @endif</td>
                <td>{{ $post->category['name'] }}</td>
                <td>{{ link_to_route('admin.authors.edita', $post->author->displayname, $post->author) }}</td>
                <td> {{$post->author->roles[0]->name}} </td>
                <td>{{ humanize_date($post->posted_at, 'd/m/Y H:i:s') }}</td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->comments_count }}</span></td>
                <td><span class="badge badge-pill badge-secondary">{{ $post->likes_count }}</span></td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">
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
           
            

             @endif
             @endif
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $posts->links() }}
</div>
