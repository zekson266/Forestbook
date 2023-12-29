<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Auth\Events\Registered;


class AuthController extends Controller
{
    //=======================================================

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required','email','exists:users,email'],
            'password' => ['required']
        ]);

        if(Auth::attempt($credentials,$request->has('remember'))){
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    //=======================================================

    public function signup(Request $request){
        $credentials = $request->validate([
            'name' => ['required', 'string','min:3','max:55'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*\d)(?=.*[@$!%*#?&])[^\s]+$/',
            ],
            'password_confirmation' => ['required','same:password']
        ]);

        $user = User::create($credentials);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    //=======================================================

    public function logout(Request $request){

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

