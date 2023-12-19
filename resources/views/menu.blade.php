@auth
<a href="/logout">{{ Auth::user()->name }}</a>
@else
    <a href="/login">Sign In</a>
@endauth