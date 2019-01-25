<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $postId
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $postId)
    {
        Log::debug($request, [CommentController::class, 'store()']);
        Log::debug($postId, [CommentController::class, 'store()', '$postId']);

        $request->validate([
            'content' => 'required',
        ]);

        $commentData = [
            'content' => $request->get('content'),
            'user_id' => Auth::id(),
            'post_id' => $postId,
        ];

        Log::debug($commentData, [CommentController::class, 'store()', '$commentData']);

        Comment::create($commentData);

        return redirect()->route('posts.show', $postId)
            ->with('success', 'Comment is saved successfully.');
    }
}
