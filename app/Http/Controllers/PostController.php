<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function dataValidate()
    {
        $validatedData = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required',
        ]);
        if (request('post_image')) {
            $validatedData['post_image'] = request('post_image')->store('images');
        }
        return $validatedData;
    }

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('blog-post', compact('post'));
    }

    public function create()
    {
        $post = new Post();
        return view('admin.posts.create', compact('post'));
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function store(Request $request) {
        $inputs = $this->dataValidate();
        auth()->user()->posts()->create($inputs);

        session()->flash('post-create-message', 'Post is created with title: ' . $inputs['title']);
        return redirect()->route('post.index');
    }

    public function update(Post $post)
    {
        $inputs = $this->dataValidate();
        auth()->user()->posts()->update($inputs);
        session()->flash('post-update-message', 'Post is updated with title: ' . $inputs['title']);
        return redirect()->route('post.index');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        Session::flash('message', 'Post is deleted');

        return back();
    }
}
