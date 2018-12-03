<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Http\Requests\Admin\CommentsRequest;
use App\User;

class CommentController extends Controller
{
    use BrandsTrait;
    /**
     * Show the application comments index.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->brandsAll();
        return view('admin.comments.index', [
            'comments' => Comment::with(['post'=> 'author', 'data'=>$data])->latest()->paginate(50)
        ]);
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Comment $comment)
    {
        $data = $this->brandsAll();
        return view('admin.comments.edit', [
            'comment' => $comment,
            'users' => User::pluck('name', 'id'),
             'data'=>$data,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentsRequest $request, Comment $comment)
    {
        
        $comment->update($request->validated());

        return redirect()->route('admin.comments.edit', $comment)->withSuccess(__('comments.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->withSuccess(__('comments.deleted'));
    }
}
