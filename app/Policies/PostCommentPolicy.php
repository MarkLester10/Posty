<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Comment;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostCommentPolicy
{
    use HandlesAuthorization;

    public function deleteComment(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id;
    }
}