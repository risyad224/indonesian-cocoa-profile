<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (Session::has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah'])->withInput();
        }

        Session::put('admin_id', $user->id);
        Session::put('admin_name', $user->name);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        Session::forget(['admin_id', 'admin_name']);
        return redirect()->route('admin.login');
    }
}
