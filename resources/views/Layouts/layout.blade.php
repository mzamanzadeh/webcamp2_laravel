<html>
<head>
    <title>My website - @yield('title')</title>
</head>
<body>
    {{--@include('Layouts.menu')--}}

    @section('content')
        This is parent content.
        <br>

        @show

</body>
</html>