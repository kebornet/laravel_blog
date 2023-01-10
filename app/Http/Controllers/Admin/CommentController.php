<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = User::find(Auth::id())->comments;

        return view('admin.comment.index', ['comments' => $comments]);
    }

    public function store(Request $request, $post_id)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->post_id = $post_id;
        $comment->content = $request->input('content');
        $comment->published_by = 3;
        $comment->save();

        return redirect()->route('post.show', ['id' => $post_id])
            ->with('success', 'Ваш комментарий опубликован');;
    }

    public function edit($id)
    {
        $comment = Comment::findOrFail($id);

        return view('admin.comment.edit', ['comment' => $comment]);
    }

    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->content = $request->input('content');
        $comment->update();

        return redirect()
            ->route('admin.comment.edit', ['id' => $comment->id])
            ->with('success', 'Комментарий отредактирован');
    }

    public function delete(Comment $comment, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()
            ->route('admin.comment.index')
            ->with('success', 'Комментарий удален');
    }
}
