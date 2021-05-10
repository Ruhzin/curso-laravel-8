<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return view('admin.posts.index', compact('posts')); //caminho onde o arquivo de index se encontra
    }

    public function create()
    {
        return view('admin.posts.create');
    }
    public function store(StoreUpdatePost $request)
    {
        Post::create($request->all());

        return  redirect()->route('posts.index');
    }
}
