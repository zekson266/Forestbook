<div class="collapse" id="navbarsExample11">
    <div class="container my-5">
        @auth
        <a class="navbar-brand col-lg-4 d-flex justify-content-center align-items-center me-0 d-block mb-2" href="/logout">{{ Auth::user()->name }}</a>
        <a class="navbar-brand col-lg-4 d-flex justify-content-center align-items-center me-0 d-block mb-2" href="#">Каталог</a>

        @else
        <a class="navbar-brand col-lg-4 d-flex justify-content-center align-items-center me-0 d-block mb-2" href="#">Каталог</a>
        <a class="navbar-brand col-lg-4 d-flex justify-content-center align-items-center me-0 d-block mb-2" href="/login">Увійти</a>
        <a class="navbar-brand col-lg-4 d-flex justify-content-center align-items-center me-0 d-block" href="/signup">Зареєструватися</a>
        @endauth
    </div>
</div>
