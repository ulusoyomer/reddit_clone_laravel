<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostVote;

class PostVoteController extends Controller
{
    public function upVote(Post $post): \Illuminate\Http\RedirectResponse
    {
        $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();
        if (!is_null($isVoted)) {
            if ($isVoted->vote === -1) {
                $isVoted->update(['vote' => 1]);
                $post->increment('votes', 2);
            }
        } else {
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => 1,
            ]);
            $post->increment('votes');
        }
        return redirect()->back();
    }

    public function downVote(Post $post)
    {
        $isVoted = PostVote::where('post_id', $post->id)->where('user_id', auth()->id())->first();
        if (!is_null($isVoted)) {
            if ($isVoted->vote ===1){
                $isVoted->update(['vote' => -1]);
                $post->decrement('votes', 2);
            }
        }else {
            PostVote::create([
                'post_id' => $post->id,
                'user_id' => auth()->id(),
                'vote' => -1,
            ]);
            $post->decrement('votes');
        }
    }
}
