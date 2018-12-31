@auth
  <comment-form
  	post_slug="{{ $post->slug }}"
      post_id="{{ $post->id }}"
      api_token="{{ $api_token }}"
      placeholder="@lang('comments.placeholder.content')"
      button="@lang('comments.comment')">
  </comment-form>
@else
  @component('components.alerts.default', ['type' => 'warning'])
    @lang('comments.sign_in_to_comment')
  @endcomponent
@endauth
