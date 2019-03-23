<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('comments.count', $comments->total()) }}</caption>
    <thead>
        <tr>
            <th>@lang('comments.attributes.content')</th>
            <th>@lang('comments.attributes.post')</th>
            <th>@lang('comments.attributes.author')</th>
            <th>@lang('comments.attributes.posted_at')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ str_limit($comment->content, 50) }}</td>
                <td>@if($thisuser->isCMSAdmin() == "yes") {{ link_to_route('cadmin.posts.edit', $comment->post->title, $comment->post->id) }}  @else {{ $comment->post->title }} @endif</td>
                <td>@if($thisuser->isCMSAdmin() == "yes" || $thisuser->isSuperadministrator() == "yes") {{ link_to_route('cadmin.authors.edita', $comment->author->fullname, $comment->author) }} @else {{ $comment->author->fullname }} @endif</td>
                <td>{{ humanize_date_with_timezone($comment->posted_at,'d F Y, H:i') }}</td>
                <td>
                     @if($thisuser->isCMSAdmin() == "yes" || $thisuser->isSuperadministrator() == "yes")
                    <a href="{{ route('cadmin.comments.edit', $comment) }}" class="btn btn-primary btn-sm">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </a>
                   
                    {!! Form::model($comment, ['method' => 'DELETE', 'route' => ['cadmin.comments.destroy', $comment], 'class' => 'form-inline', 'data-confirm' => __('forms.comments.delete')]) !!}
                    {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', ['class' => 'btn btn-danger btn-sm', 'name' => 'submit', 'type' => 'submit']) !!}
                    @endif

                        
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $comments->links() }}
</div>
