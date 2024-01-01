<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Http\Requests\Auth\SignupRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\UpdatePassRequest;

Route::view('/signup','auth.signup')->name('signup')
    ->middleware('guest');
Route::view('/login','auth.login')->name('login')
    ->middleware('guest');

// Route::get('/logout',[App\Http\Controllers\AuthController::class,'logout'])
//     ->middleware('auth');

// Logout
Route::get('/logout',function (){

    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');

})->middleware('auth');

// Route::post('/signup',[App\Http\Controllers\AuthController::class,'signup'])
//     ->middleware('guest');

// Signup
Route::post('/signup', function (SignupRequest $request){
    $credentials = $request->validated();

    $user = User::create($credentials);

    event(new Registered($user));

    Auth::login($user);

    return redirect()->route('verification.notice');
})->middleware('guest');

// Route::post('/login',[App\Http\Controllers\AuthController::class,'login'])
//     ->middleware('guest');

// Login
Route::post('/login', function (LoginRequest $request){
    $credentials = $request->validated();

    if(Auth::attempt($credentials,$request->has('remember'))){
        $request->session()->regenerate();

        return redirect()->intended('admin');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->middleware('guest');

// Verefication notice
Route::get('/email/verify', function () {
    return view('auth.verification-notice');
})->middleware('auth')->name('verification.notice');

// Handling verefication link
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/signin');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resend verefication mail
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Pass reset form
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

// Pass reset action 
Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);
 
    $status = Password::sendResetLink(
        $request->only('email')
    );
 
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

// Update password form
Route::get('/reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// Update password Action
Route::post('/reset-password/{token}', function (UpdatePassRequest $request) {
    $credentials = $request->validated();
 
    $status = Password::reset(
        $credentials,
        function (User $user, string $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));
 
            $user->save();
 
            event(new PasswordReset($user));
        }
    );
 
    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');