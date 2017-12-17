@extends('Layouts.layout')

@section('content')

    <h1>{{ $post->title }}</h1>

    <p>
        {{ $post->summary }}
    </p>
    <p>
       visit count: {{ $post->visit_count }}
    </p>

    @endsection