<h1>Sign Up</h1>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="POST">  @csrf
        <label>email:</label>
        <input type="email" name="email" value="" required>
        <br>
        <label>name:</label>
        <input type="text" name="name" value="" required>
        <br>
        <label>password:</label>
        <input type="password" name="password" value="" required>
        <br>
        <label>password conf:</label>
        <input type="password" name="password_confirmation" value="" required>
        <br>
        <button type="submit">Sign Up</button>
    </form>
</div>