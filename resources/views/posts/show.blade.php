@extends('Layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ $post->title }}
                    </div>
                    <div class="panel-body">
                        {{ $post->summary }}

                        <hr>
                        insert a new Comment:
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('posts.new.comment',['id'=> $post->id]) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('writer') ? ' has-error' : '' }}">
                                <label for="writer" class="col-md-4 control-label">your name:</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="writer" value="{{ old('writer') }}" autofocus>

                                    @if ($errors->has('writer'))
                                        <span class="help-block">
             <strong>{{ $errors->first('writer') }}</strong>
        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                                <label for="comment" class="col-md-4 control-label">your comment:</label>

                                <div class="col-md-6">
            <textarea class="form-control" name="comment">{{ old('comment') }}</textarea>
                                    @if ($errors->has('comment'))
                                        <span class="help-block">
            <strong>{{ $errors->first('comment') }}</strong>
        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        save
                                    </button>

                                </div>
                            </div>
                        </form>
<hr>

                        <ul class="list-group">
                            @foreach($post->comments as $comment)
                                <li>
                                    by <b>{{ $comment->writer }}</b><br>
                                    {{ $comment->comment }}
                                </li>
                                @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
