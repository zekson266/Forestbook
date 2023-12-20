@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center">
        <h1>Forgot password</h1>
    </div>

    <div class="container d-flex justify-content-center align-items-center my-5">

        <form method="POST">
            @csrf
            <label>email:</label>
            <input type="email" name="email" value="" required>
            <br>
            <button type="submit">Sign In</button>
        </form>
    </div>
@endsection
