<?php

namespace App\Observers;

use App\Page;

class PageObserver
{
    /**
     * Listen to the Post saving event.
     *
     * @param  Post $post
     * @return void
     */
    public function saving(Page $page)
    {
        $page->name = str_slug($page->display_name, '-');
    }
}
