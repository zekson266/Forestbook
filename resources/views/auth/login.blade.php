@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-center align-items-center my-5">
        <div class="col-lg-4 col-md-5 col-sm-7 col">
            <main class="form-signin ">
                <form method="POST">
                    @csrf
                    <div class="h3 mb-3 fw-normal d-flex justify-content-center login-text">Вхід</div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-floating">
                        <input name="email" type="email" class="form-control border-0 input-login-password"
                            id="floatingInput" placeholder="Login" required>
                        <label for="floatingInput">Логін</label>
                    </div>
                    <div class="form-floating">
                        <input name="password" type="password" class="form-control border-0 input-login-password"
                            id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Пароль</label>
                    </div>
                    <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Запам'ятати мене
                        </label>
                    </div>
                    <button class="btn btn-primary w-100 py-2 login-btn" type="submit">УВІЙТИ</button>
                    <div class="d-flex justify-content-center mt-4">
                        <a class="login-a" href="/forgot-password">
                            Забули пароль?
                        </a>
                    </div>
                    <div class="d-flex justify-content-center mt-1">
                        <a class="login-a" href="/signup">
                            Не маєте акаунта? Зареєструватися
                        </a>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection
