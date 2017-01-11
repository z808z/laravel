@extends('main')

@section('content')
        <h3>{{ $article->title }}</h3>
        <p><small><a href="/edit/{{$article->id}}">Изменить статью</a></small> <small><a href="/delete/{{$article->id}}">Удалить статью</a></small></p>
        <p>{!! $article->content !!}</p>
@endsection