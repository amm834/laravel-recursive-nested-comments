<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class Comment extends Component
{
    public \App\Models\Comment $comment;
    public Post $post;

    public function mount(\App\Models\Comment $comment, Post $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    public function render()
    {
        return view('livewire.comment');
    }
}
