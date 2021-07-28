<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    public function store(Post $post, CommentRequest $request): RedirectResponse
    {
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body'    => $request->input('body'),
        ]);

        return back()->with('success', 'Thanks for Commenting!');
    }
}
