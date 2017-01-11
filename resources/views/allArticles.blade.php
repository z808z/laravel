@extends('main')

@section('content')
    @foreach ($articles as $article)
        <h3><a href="/{{$article->id}}">{{ $article->title }}</a></h3>
        <p>{!! $article->description !!} <a href="/{{$article->id}}">Читать далее...</a></p>
    @endforeach

@endsection
