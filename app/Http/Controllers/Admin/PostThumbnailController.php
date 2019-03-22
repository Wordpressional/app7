<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Post;

use App\Compbrand;
use App\Role;
use App\Permission;

use Auth;
class PostThumbnailController extends Controller
{
    use BrandsTrait;
    /**
     * Unset the post's thumbnail.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

        $post->update(['thumbnail_id' => null]);

        return redirect()->route('admin.posts.edit', $post)->withSuccess(__('posts.updated'));
    }
}
