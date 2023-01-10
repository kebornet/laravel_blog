<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\CommentUserLike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function store($comment_id)
    {
        $id_post_comment = Comment::find($comment_id)->post_id;
        User::find(Auth::id())->likedComments()->toggle($comment_id);

        return redirect()->route('post.show', ['id' => $id_post_comment]);
    }
}
