<div class="links">

    <a href="{{ route('homepage') }}">Home Page</a>
    <a href="{{ route('aboutPage') }}">About Page</a>
    @if(!empty($dynamicName))
        <a href="{{ route('hello',['name'=> $dynamicName]) }}">hello</a>
    @endif
</div>