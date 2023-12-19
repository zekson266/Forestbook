@include('menu')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li> 
            @endforeach
        </ul>
    </div>
@endif

<h1>Sign In</h1>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="POST">  @csrf
        <label>email:</label>
        <input type="email" name="email" value="" required>
        <br>
        <label>password:</label>
        <input type="password" name="password" value="" required>
        <br>
        <button type="submit">Sign In</button>
    </form>

    <a href="/signup">Sign Up</a>
    <a href="/forgot-password">Forgot password</a>
</div>