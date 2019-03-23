<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CAdmin\PageRequest;
use App\Http\Resources\Page as PageResource;
use App\Page;

use Illuminate\Http\Request;


class PageController extends Controller
{
    

    /**
     * Return the posts.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return PageResource::collection(
            Page::search($request->input('q'))->paginate($request->input('limit', 20))
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\PageRequest $request
     * @param  Page $page
     * @return \Illuminate\Http\Response
     */
    public function update(PageRequest $request, Page $page)
    {
        $this->authorize('update', $page);

        $page->update($request->only(['display_name', 'name', 'content', 'author_id']));

        if ($request->hasFile('thumbnail')) {
            $page->storeAndSetThumbnail($request->file('thumbnail'));
        }

         $page->tags()->sync($request->tags);

        return new PageResource($page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(PageRequest $request)
    {
        $this->authorize('store', Page::class);

        $page = Page::create($request->only(['display_name', 'name', 'content', 'author_id']));

        return new PageResource($page);
    }

    /**
     * Return the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        return new PageResource($page);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $this->authorize('delete', $page);

        $page->delete();

        return response()->noContent();
    }
}
