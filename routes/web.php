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

