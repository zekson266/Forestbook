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
        <h1>Sign Up</h1>
    </div>

    <div class="container d-flex justify-content-center align-items-center my-5">
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
@endsection
