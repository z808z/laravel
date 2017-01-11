@extends('main')

@section('content')
    <h1>Изменение статьи</h1>
    <form action="" method="POST">
        <p><label for="title">Заголовок статьи</label></p>
        <p><input type="text" name="title" value="{{ $article->title }}"</p>
        <p><label for="content">Текст статьи</label></p>
        <p><textarea name="content" id="" cols="30" rows="10">{{ $article->content }}</textarea></p>
        {{ csrf_field() }}
        <input type="submit">
    </form>
@endsection
