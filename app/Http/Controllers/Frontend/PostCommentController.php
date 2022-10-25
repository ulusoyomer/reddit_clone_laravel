<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Support\Facades\Request;

class PostCommentController extends Controller
{
    public function store($community_slug, Post $post): \Illuminate\Http\RedirectResponse
    {
        $post->comments()->create([
            'user_id' => auth()->id(),
            'content' => Request::input('content')
        ]);

        return back();
    }
}
