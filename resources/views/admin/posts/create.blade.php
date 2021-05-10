<h1>Cadastrar novo Post</h1>


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

<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <input type="text" name="title" id="title" placeholder="titulo" value="{{ old('title') }}">
    <textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{ old('content') }}</textarea>
    <button type="submit">Enviar</button>
</form>