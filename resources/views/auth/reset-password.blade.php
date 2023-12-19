@include('menu')


<h1>Reset Password</h1>
<div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="POST">  @csrf
        <label>email:</label>
        <input type="email" name="email" value="{{ urldecode(request('email')) }}" required>
        <br>
        <label>token:</label>
        <input type="text" name="token" value="{{ $token }}" required>
        <br>
        <label>password:</label>
        <input type="password" name="password" value="" required>
        @error('password')
            <span class="error">{{ $message }}</span>
        @enderror
        <br>
        <label>password conf:</label>
        <input type="password" name="password_confirmation" value="" required>
        <br>
        <button type="submit">Sign Up</button>
    </form>
</div>