<?php

namespace App\Http\Controllers\CAdmin;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Http\Traits\BrandsTrait;
use App\Http\Requests\CAdmin\CommentsRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

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
        $thisuser = User::where('email', Auth::user()->email)->first();

         if($thisuser->isCMSSubscriber() == "yes") {
        return view('cadmin.comments.index', [
            'comments' => Comment::where('author_id', $thisuser->id)->with(['post','author'])->latest()->paginate(10),
            'data' =>  $data,
            'thisuser' => $thisuser,
        ]);
    }
    else
    {
        return view('cadmin.comments.index', [
            'comments' => Comment::with(['post','author'])->latest()->paginate(10),
            'data' =>  $data,
            'thisuser' => $thisuser,
        ]);
    }
    }

    /**
     * Display the specified resource edit form.
     */
    public function edit(Comment $comment)
    {
        $data = $this->brandsAll();
        return view('cadmin.comments.edit', [
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

        return redirect()->route('cadmin.comments.edit', $comment)->withSuccess(__('comments.updated'));
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

        return redirect()->route('cadmin.comments.index')->withSuccess(__('comments.deleted'));
    }
}
