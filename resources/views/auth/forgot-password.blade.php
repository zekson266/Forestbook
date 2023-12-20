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
<div class="container d-flex justify-content-center align-items-center my-5">
    <div class="col-lg-5 my-3">
        <main class="form-signin w-100 m-auto">
            <form method="POST">
                @csrf
                <div class="h3 mb-3 fw-normal d-flex justify-content-center login-text">Відновлення паролю</div>
                <div class="form-floating">
                    <input name="email" type="email" class="form-control border-0 input-login-password"
                        id="floatingInput" placeholder="Login" required>
                    <label for="floatingInput">email</label>
                </div>
                <button class="btn btn-primary w-100 py-2 login-btn mt-4" type="submit">Відновити</button>
            </form>
        </main>
    </div>
</div>
@endsection
