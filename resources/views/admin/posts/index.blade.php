@extends('admin.layouts.app')
@section('title', 'Listagens dos Posts')

@section('content')
    
    <h1 class="text-center text-3x1 uppercase font-black my-4">Posts cadastrados</h1>

    @if (session('success'))    
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a class="bg-transparent hover:bg-gray-500 text-gray-700 font-semibold hover:text-white py-1 px-4 border border-gray-500 hover:border-transparent rounded" href="{{ route('posts.create') }}">Criar novo post</a>
    <br>
    <br>

    <form action=" {{ route('posts.search') }}" method="post">
            @csrf
            <input class="shadow appearance-none border rounded w-100 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="search" type="text" placeholder="Filtrar">
            <button class="bg-transparent hover:bg-green-500 text-green-700 font-semibold hover:text-white py-2 px-4 border border-green-500 hover:border-transparent rounded" type="submit">Filtrar</button>
    </form>
    <br>
    


    @foreach($posts as $post)
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <p>
                <img src="{{ url("storage/$post->image") }}" alt="{{ $post->title }}" style="max-width:50px;">
                {{ $post-> title }}
                <a class="bg-transparent hover:bg-red-500 text-red-700 font-semibold hover:text-white py-0.1 px-4 border border-red-500 hover:border-transparent rounded" href="{{ route('posts.show', $post-> id) }}">Ver</a>
                <a class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-0.1 px-4 border border-blue-500 hover:border-transparent rounded"href="{{ route('posts.edit', $post-> id) }}">Editar</a>
            </p>
        </div>
    @endforeach

    <hr>
    @if(isset($filters))
        {{ $posts->appends($filters)->links() }}
    @else
        {{ $posts->links() }}
    @endif
@endsection 