<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Mail\PostComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PostCommentController extends Controller
{

    public function store(Post $post, Request $request)
    {
        $this->validate($request, [
            'comment' => 'required|max:800',
        ]);

        $post->comments()->create([
            'comment' => $request->comment,
            'user_id' => $request->user()->id
        ]);

        Mail::to($post->user)->send(new PostComment(auth()->user(), $post));

        return back();
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('deleteComment', $comment);
        $comment->delete();
        return back();
    }
}