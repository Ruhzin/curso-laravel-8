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

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post){
            return redirect()->route('posts.index');
        }

        return view('admin.posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post){
            return redirect()->route('posts.index');
        }

        $post->delete();

        return redirect()
                        ->route('posts.index')
                        ->with('success','Post deletado com sucesso !');
    }
}
