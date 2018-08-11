<?php

namespace App\Providers;

use App\Comment;
use App\Observers\CommentObserver;
use App\Observers\PostObserver;
use App\Observers\PageObserver;
use App\Observers\UserObserver;
use App\Post;
use App\Page;
use App\User;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Post::observe(PostObserver::class);
        Page::observe(PageObserver::class);
        User::observe(UserObserver::class);
        Comment::observe(CommentObserver::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
