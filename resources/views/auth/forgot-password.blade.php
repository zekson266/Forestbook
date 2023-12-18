@include('menu')

<h1>Forgot password</h1>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="POST">  @csrf
        <label>email:</label>
        <input type="email" name="email" value="" required>
        <br>
        <button type="submit">Sign In</button>
    </form>
</div>