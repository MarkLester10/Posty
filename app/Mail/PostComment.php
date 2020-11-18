<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostComment extends Mailable
{
    use Queueable, SerializesModels;

    public $commentator;

    public $post;

    public function __construct(User $commentator, Post $post)
    {
        $this->commentator = $commentator;
        $this->post = $post;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.post_comment')
            ->subject('Someone commented on your post');
    }
}