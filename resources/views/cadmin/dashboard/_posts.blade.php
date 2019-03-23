@component('components.cards.default', ['class' => 'bg-userone text-light m-2'])
    <div class="row justify-content-between">
        <i class="fa fa-file-text fa-5x" aria-hidden="true"></i>
        <div class="text-right">
            <div class="huge">{{ $posts->count() }}</div>
            <div>{{ trans_choice('posts.new_posts', $posts->count()) }}</div>
        </div>
    </div>

    @slot('footer')
        <a href="{{ route('cadmin.posts.index') }}" class="d-flex justify-content-between text-light">
            <span>@lang('dashboard.details')</span>
            <span><i class="fa fa-arrow-circle-right"></i></span>
        </a>
    @endslot
@endcomponent
