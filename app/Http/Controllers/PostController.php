<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class  PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(); // paginando tudo, posso passar quantos parametros eu quero que seja visto.

        return view('admin.posts.index', compact('posts')); //caminho onde o arquivo de index se encontra
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(StoreUpdatePost $request)
    {
        $data = $request->all();

        if ($request->image->isValid()) {

            $nameFile = Str::of($request->title)->slug('-') . '.' .$request->image->getClientOriginalExtension();


            $image = $request->image->storeAs('posts', $nameFile);
            $data['image'] = $image;
        }

        Post::create($data);

        return  redirect()
                        ->route('posts.index')
                        ->with('success','Post atualizado com sucesso !');
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

    public function edit($id)
    {
        if (!$post = Post::find($id)){
            return redirect()->back();
        }

        return view('admin.posts.edit', compact('post'));
    }

    public function update(StoreUpdatePost $request, $id)
    {
        if (!$post = Post::find($id)){
            return redirect()->back();
        }

        $post->update($request->all());

        return redirect()
                        ->route('posts.index')
                        ->with('success','Post alterado com sucesso !');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $posts = Post::where('title', 'LIKE', "%{$request->search}%")
                        ->orWhere('content', 'LIKE', "%{$request->search}%")
                        ->paginate();

        return view('admin.posts.index', compact('posts','filters'));
    }
}
