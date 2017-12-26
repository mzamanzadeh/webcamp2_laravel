@extends('Layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">edit post</div>
                    <div class="panel-body">
                        <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="{{ route('posts.update',['id'=> $post->id]) }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" autofocus>

                                    @if ($errors->has('title'))
                                        <span class="help-block">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
                                <label for="summary" class="col-md-4 control-label">Summary</label>

                                <div class="col-md-6">

                                    <textarea class="form-control" row="8" name="summary">{{ $post->summary }}</textarea>
                                    @if ($errors->has('summary'))
                                        <span class="help-block">
<strong>{{ $errors->first('summary') }}</strong>
</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                                <label for="slug" class="col-md-4 control-label">Slug</label>

                                <div class="col-md-6">
                                    <input id="slug" type="text"  class="form-control" name="slug" value="{{ $post->slug }}">

                                    @if ($errors->has('slug'))
                                        <span class="help-block">
<strong>{{ $errors->first('slug') }}</strong>
</span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('categories') ? ' has-error' : '' }}">
                                <label for="categories" class="col-md-4 control-label">select categories</label>

                                <div class="col-md-6">

                                    <select name="categories[]" class="form-control" multiple="multiple">
                                        @foreach($categories as $category)
                                            <option
                                                    @foreach($post->categories as $c)
                                                            @if($c->id==$category->id)
                                                                selected
                                                                @endif
                                                            @endforeach
                                                    value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('categories'))
                                        <span class="help-block">
<strong>{{ $errors->first('categories') }}</strong>
</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('full_text') ? ' has-error' : '' }}">
                                <label for="full_text" class="col-md-4 control-label">full text</label>

                                <div class="col-md-6">

                                    <textarea class="form-control" row="8" name="full_text">{{ $post->full_text }}</textarea>
                                    @if ($errors->has('full_text'))
                                        <span class="help-block">
<strong>{{ $errors->first('full_text') }}</strong>
</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
                                <label for="photo" class="col-md-4 control-label">photo</label>

                                <div class="col-md-6">
                                    <img width="100%" src="{{ $post->photo }}">
                                    <input id="photo" type="file" class="form-control" name="photo" value="{{ old('photo') }}">

                                    @if ($errors->has('photo'))
                                        <span class="help-block">
<strong>{{ $errors->first('photo') }}</strong>
</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('publish') ? ' has-error' : '' }}">
                                <label for="publish" class="col-md-4 control-label">publish?</label>

                                <div class="col-md-6">
                                    <input id="publish"
                                           @if($post->publish)
                                                checked
                                                   @endif

                                           type="checkbox" name="publish" value="1" >

                                    @if ($errors->has('publish'))
                                        <span class="help-block">
<strong>{{ $errors->first('publish') }}</strong>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
