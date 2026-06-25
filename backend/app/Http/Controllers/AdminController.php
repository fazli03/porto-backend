<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function showLogin()
    {
        if (session('admin_authenticated')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $correct = Hash::check(
            $request->input('password'),
            config('admin.password_hash')
        );

        if (!$correct) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }

        session(['admin_authenticated' => true]);

        return redirect()->route('admin.dashboard');
    }

    public function logout()
    {
        session()->forget('admin_authenticated');

        return redirect()->route('admin.login');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
