<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = User::find(Auth::id())->posts;

        return view('admin.post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('admin.post.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->description = $request->input('description');
        $post->save();

        return redirect()->route('admin.post.show', ['id' => $post->id]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->excerpt = $request->input('excerpt');
        $post->description = $request->input('description');
        $post->update();

        return redirect()->route('admin.post.show', ['id' => $post->id]);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = Post::find($id)->comments;

        return view('admin.post.show', ['post' => $post, 'comments' => $comments]);
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('admin.post.edit', ['post' => $post]);
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('admin.post.index');
    }
}
