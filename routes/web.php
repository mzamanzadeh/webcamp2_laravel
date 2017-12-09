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

Route::get('/', function () {

    $people = ['Farzad','Mohammad','Ali'];

//    return view('people', ['namha'=> $people]);
//    return view('people',compact('people'));
//    return view('people')->with('namha',$people);
    return view('people')->withNamha($people);

});

Route::get('/name-{name}-{id}',
    'PagesController@name');

Route::get('/about1', function(){
    return view('about');
})->name('aboutPage');