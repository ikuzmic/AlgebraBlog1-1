<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        // $posts = DB::table('posts')->get();

        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        request()->validate([
            'title'=>'required|min:3|max:255',
            'body'=>'required|min:3|max:65535'
        ]);

        $post = Post::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id'=>auth()->id()
        ]);
        return redirect()->route('posts.index')->withFlashMessage('Objava dodana uspjesno');
    }
}
