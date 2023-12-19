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

        Auth::attempt($credentials,$request->has('remember'));

        return 0;
    }
    
    //=======================================================
    
    public function signup(Request $request){
        $credentials = $request->validate([
            'name' => ['required', 'string','min:3','max:55'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => [
                'required',
                Password::min(8)
                    ->letters()
                    ->symbols()
                    ->numbers()
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

