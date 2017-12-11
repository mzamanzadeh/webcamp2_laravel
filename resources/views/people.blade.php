<html>
<head>
<title>People page</title>
</head>
<body>

<ul>

  {{--  @foreach($namha as $person)
        <li>{{$person}}</li>
        @endforeach--}}

        @forelse($namha as $person)
                <li>{{ $person }}</li>
                @empty

                No people found!

                @endforelse

</ul>

</body>
</html>