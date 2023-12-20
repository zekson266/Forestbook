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
                    <input class="form-control border-0 input-login-password"
                        name="name"
                        type="text"
                        id="floatingInputName"
                        placeholder="Name"
                        required
                        minlength="3"
                        maxlength="50"
                    >
                    <label for="floatingInputName">Ім’я</label>
                </div>
                <div class="form-floating">
                    <input class="form-control border-0 input-login-password"
                        name="email"
                        type="email"
                        id="floatingInputEmail"
                        placeholder="Email"
                        required
                    >
                    <label for="floatingInputEmail">Email</label>
                </div>
                <div class="form-floating">
                    <input class="form-control border-0 input-login-password"
                        name="password"
                        type="password"
                        id="floatingPassword"
                        placeholder="Password"
                        required
                        minlength="8"
                        pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$"
                        title="Пароль повинен містити щонайменше 8 символів, як мінімум одну літеру, одну цифру та один спеціальний символ"
                    >
                    <label for="floatingPassword">
                        Пароль
                    </label>
                </div>
                <div class="form-floating">
                    <input class="form-control border-0 input-login-password"
                        name="password_confirmation"
                        type="password"
                        id="floatingPassword_confirmation"
                        placeholder="password_confirmation"
                        required
                        minlength="8"
                        pattern="^(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]+$"
                        title="Пароль повинен містити щонайменше 8 символів, як мінімум одну літеру, одну цифру та один спеціальний символ"
                    >
                    <label for="floatingPassword_confirmation">
                        Пароль ще раз
                    </label>
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
