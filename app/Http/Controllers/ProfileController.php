<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        if (!session('user')) {
            return redirect()->route('login');
        }

        return view('profile.index', ['user' => session('user')]);
    }

    public function showChangePasswordForm()
    {
        return view('profile.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        DB::table('users')->where('login', session('user'))->update([
            'password' => Hash::make($request->password),
            'updated_at' => now(),
        ]);

        return redirect()->route('profile')->with('success', 'Пароль успешно изменён!');
    }
}

