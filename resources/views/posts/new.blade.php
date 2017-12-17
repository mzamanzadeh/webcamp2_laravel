@extends('Layouts.layout')

@section('content')

    <form action="{{ route('posts.store') }}" method="post">

        <div>
            <label>
                title:
            </label>
            <input name="title" type="text">
        </div><br>

        <div>
            <label>
                slug:
            </label>
            <input name="slug" type="text">
        </div><br>


        <div>
            <label>
                summary:
            </label>
            <textarea name="summary"></textarea>
        </div><br>


        <div>
            <label>
                publish?
            </label>
            <input name="publish" value='1' type="checkbox">
        </div><br>

        <button type="submit">save</button>

        {{ csrf_field() }}

    </form>

    @endsection