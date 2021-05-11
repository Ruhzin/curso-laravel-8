<h1>Editar o Post: <strong>{{ $post->title }}</strong></h1>


<!-- Retornando os erros para que possa ser preenchido por ex .  
old = ele salva os dados que foram escritos, para que ele possa ver onde errou e assim não perder o que começou a ser escrito.

-->
@if ($errors-> any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }} </li>
        @endforeach
    </ul>
@endif

<form action="{{ route('posts.update', $post-> id) }}" method="post">
    @csrf
    @method('put')
    <input type="text" name="title" id="title" placeholder="titulo" value="{{ $post->title }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{ $post->content }}</textarea>
    <button type="submit">Enviar</button>
</form>