@extends('Layouts.layout')

@section('content')
    @foreach($posts as $post)
        <div>
            <a href="{{ route('posts.show', ['id'=> $post->id]) }}">
                {{ $post->title }}
            </a>
        </div>
        <hr>
        @endforeach
    @endsection