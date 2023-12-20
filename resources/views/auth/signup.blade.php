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
    <div class="col-lg-4 my-3">
        <main class="form-signin w-100 m-auto">
            <form method="POST">
                @csrf
                <div class="h3 mb-3 fw-normal d-flex justify-content-center login-text">Реєстрація</div>
                <div class="form-floating">
                    <input name="name" type="text" class="form-control border-0 input-login-password"
                        id="floatingInput" placeholder="Name" required>
                    <label for="floatingInput">Ім’я</label>
                </div>
                <div class="form-floating">
                    <input name="email" type="email" class="form-control border-0 input-login-password"
                        id="floatingInput" placeholder="Email" required>
                    <label for="floatingInput">Email</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control border-0 input-login-password"
                        id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Пароль</label>
                </div>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control border-0 input-login-password"
                        id="floatingPassword" placeholder="password_confirmation" required>
                    <label for="floatingPassword">Пароль ще раз</label>
                </div>
                <button class="btn btn-primary w-100 py-2 login-btn mt-4" type="submit">Зареєструватися</button>
                <div class="d-flex justify-content-center mt-4">
                    <a class="login-a" href="/login">
                        Вже маєте акаунт? Увійти
                    </a>
                </div>
            </form>
        </main>
    </div>
</div>
@endsection
