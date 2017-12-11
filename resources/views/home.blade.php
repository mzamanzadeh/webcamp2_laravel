@extends('Layouts.layout')

@section('title', 'Home')
{{--@section('title')
    Home
    @endsection--}}

@section('content')
    Child content.
    @parent

@endsection
