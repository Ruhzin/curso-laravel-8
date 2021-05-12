@if ($errors-> any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }} </li>
            @endforeach
        </ul>
        <!-- Retornando os erros para que possa ser preenchido por ex .  
        old = ele salva os dados que foram escritos, para que ele possa ver onde errou e assim não perder o que começou a ser escrito.

    -->
@endif



@csrf

<input type="file" name="image" id="image">
<input type="text" name="title" id="title" placeholder="titulo" value="{{ $post->title ?? null }}">
<textarea name="content" id="content" cols="30" rows="4" placeholder="Conteúdo">{{ $post->title   ?? null }}</textarea>
<button type="submit">Enviar</button>