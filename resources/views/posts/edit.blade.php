@extends('Layouts.layout')

@section('content')

    <form action="{{ route('posts.update',['id'=> $post->id]) }}" method="post">

        <div>
            <label>
                title:
            </label>
            <input value="{{ $post->title }}" name="title" type="text">
        </div><br>

        <div>
            <label>
                slug:
            </label>
            <input name="slug" value="{{ $post->slug }}" type="text">
        </div><br>


        <div>
            <label>
                summary:
            </label>
            <textarea name="summary">{{ $post->summary }}</textarea>
        </div><br>


        <div>
            <label>
                publish?
            </label>
            <input
                    @if($post->publish) checked @endif
                    name="publish" value='1' type="checkbox">
        </div><br>

        <button type="submit">save</button>

        {{ csrf_field() }}

    </form>

    @endsection