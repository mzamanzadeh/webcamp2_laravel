<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/people', function () {

//    $people = ['Farzad','Mohammad','Ali'];
    $people = [];
    return view('people', ['namha'=> $people]);
//    return view('people',compact('people'));
//    return view('people')->with('namha',$people);
//    return view('people')->withNamha($people);

});

Route::get('/name-{name}-{id}',
    'PagesController@name');

Route::get('/hello/{name?}','PagesController@hello')->name('hello');

Route::get('/about', 'PagesController@about')->name('aboutPage');
Route::get('/', 'PagesController@home')->name('homepage');

Route::get('/posts', "PostController@index")->name('posts.index');

Route::get('/posts/{id}', "PostController@show")
    ->name('posts.show')
    ->where('id',"\d");

Route::post('/posts/{id}/newcomment', "PostController@newComment")
    ->name('posts.new.comment');


Route::get('/posts/new',"PostController@create")->name('posts.new');
Route::post('/posts/new',"PostController@store")->name('posts.store');

Route::get('/posts/edit/{id}',"PostController@edit")->name('posts.edit');
Route::post('/posts/update/{id}',"PostController@update")->name('posts.update');