<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/welcome')->withErrors([
                'success' => 'Вы успешно Bошли в систему',
            ]);
        }
        return back()->withErrors([
            'error' => 'Предоставленные учетные данные не соответствуют нашим записям.',
        ])->onlyInput('email', 'password');
    }

    public function login(Request $request) {
        return view('login', ['user' => Auth::user()]);
    }

    public function logout(Request $request): RedirectResponse {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->withErrors([
            'success' => 'Вы успешно вышли из системы',
        ]);
    }

}