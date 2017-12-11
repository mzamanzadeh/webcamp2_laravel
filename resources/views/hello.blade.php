@extends('base')

@section('title','Hello Page')

@section('content')
      @if($name!=null)
           hello {{ $name }}
               @else
               Invalid Parameter
               @endif

{{--    hello {{ $name or 'Ananymous' }}--}}

    {{--@unless($name==null)
        hello {{ $name }}
     @else
        Invalid Parameter

    @endunless--}}

    {{--@for($i=0;$i<10;$i++)--}}
        {{--Line {{ $i }}<br>--}}
    {{--@endfor--}}

    @endsection