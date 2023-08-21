<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function store(Request $request, Post $post)
    {
        $post->comments()->with([
            'user',
            'replies',
        ])->create([
            'user_id' => auth()->id(),
            'body' => $request->body,
            'parent_id' => $request->parent_id ?? null,
        ]);


        return back();
    }
}
