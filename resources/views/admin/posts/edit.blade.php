@extends('admin.layouts.app')

@section('title', 'Editando Post')

@section('content')

<h1>Editar o Post: <strong>{{ $post->title }}</strong></h1>


    <!-- Retornando os erros para que possa ser preenchido por ex .  
    old = ele salva os dados que foram escritos, para que ele possa ver onde errou e assim não perder o que começou a ser escrito.

    -->
    <form action="{{ route('posts.update', $post-> id) }}" method="post"  enctype="multipart/form-data">
        @method('put')
        @include('admin.posts._partials.form')
    </form>



@endsection