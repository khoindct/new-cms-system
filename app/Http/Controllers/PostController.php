<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function dataValidate(Request $request)
    {
        $validatedData = $request->validate([
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
        return view('admin.posts.index');
    }

    public function show(Post $post)
    {
        return view('blog-post', compact('post'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required',
        ]);
        if (request('post_image')) {
            $validatedData['post_image'] = request('post_image')->store('images');
        }
        auth()->user()->posts()->create($validatedData);

//        Auth::user()->posts()->create($this->dataValidate());
        return back();
    }
}
