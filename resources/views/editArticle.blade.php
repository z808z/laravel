@extends('main')

@section('content')
    <h1>Изменение статьи</h1>
    <form action="" method="POST">
        <p><label for="title">Заголовок статьи</label></p>
        <p><input type="text" name="title" value="{{ $article->title }}"</p>
        <h3><label for="description">Короткое описание статьи (максимум 255 символов)</label></h3>
        <p><textarea name="description" id="" cols="30" rows="5">{{ $article->description }}</textarea></p>
        <p><label for="content">Текст статьи</label></p>
        <p><textarea name="content" id="" cols="30" rows="10">{{ $article->content }}</textarea></p>
        {{ csrf_field() }}
        <input type="submit">
    </form>
@endsection
