<a href="{{ route('posts.create') }}">Criar novo post</a>
<hr>

@if (session('success'))    
    <div>
        {{ session('success') }}
    </div>
@endif

<h1>Posts</h1>

@foreach($posts as $post)
    <p>
        {{ $post-> title }}
        [ <a href="{{ route('posts.show', $post-> id) }}">Ver</a> ]
    </p>
@endforeach