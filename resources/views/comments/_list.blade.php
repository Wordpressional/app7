<h2 class="mt-2">{{ trans_choice('comments.count', $post->comments_count) }}</h2>

@include ('comments/_form')

<comment-list
	post_slug="{{ $post->slug }}"
    post_id="{{ $post->id }}"
    api_token="{{ $api_token }}"
    loading_comments="@lang('comments.loading_comments')"
    data_confirm="@lang('forms.comments.delete')">
</comment-list>
