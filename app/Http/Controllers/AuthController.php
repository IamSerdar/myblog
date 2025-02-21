<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        $user = DB::table('users')->where('login', $request->login)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user' => $user->login]);
            return redirect()->route('news.index')->with('success', 'Вы успешно вошли!');
        }

        return back()->withErrors(['login' => 'Неверный логин или пароль']);
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('news.index')->with('success', 'Вы вышли из системы.');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'login' => 'required|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        DB::table('users')->insert([
            'login' => $request->login,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session(['user' => $request->login]);

        return redirect()->route('profile')->with('success', 'Вы успешно зарегистрированы!');
    }
}
