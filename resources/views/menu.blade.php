@auth
<a href="/logout">{{ Auth::user()->name }}</a>
@else
    <a href="/signin">Sign In</a>
@endauth