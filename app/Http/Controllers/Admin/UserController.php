<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required|string|max:255|unique:users,login',
            'role' => 'required|in:admin,content_manager,user',
            'password' => 'required|min:6|confirmed'
        ]);

        User::create([
            'login' => $request->login,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Пользователь создан');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'login' => 'required|string|max:255|unique:users,login,' . $user->id,
            'role' => 'required|in:admin,content_manager,user',
            'password' => 'nullable|min:6|confirmed'
        ]);
    
        $data = $request->only(['login', 'role']);

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
    
        $user->update($data);
    
        return redirect()->route('admin.users.index')->with('success', 'Пользователь обновлён');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'Пользователь удалён');
    }
}


