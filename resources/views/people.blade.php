<html>
<head>
<title>People page</title>
</head>
<body>

<ul>
    @foreach($namha as $person)
        <li>{{$person}}</li>
        @endforeach

</ul>

</body>
</html>