<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ],[
            'email.required'=>'Email wajib diisi',
            'email.email'=>'Format email tidak valid',
            'password.required'=>'Password wajib diisi',
        ]);

        // Coba login
        if (Auth::attempt($request->only('email', 'password'))) {
            // Ambil user yang sedang login
            $user = Auth::user();

            // Cek role user
            if ($user->role == 'SuperAdmin') {
                return redirect()->intended('admin/super-admin');
            } elseif ($user->role == 'Admin') {
                return redirect()->intended('admin/admin');
            } else {
                return redirect()->intended('admin'); // default jika role lain
            }
        }

        // Jika login gagal
        return back()->withErrors(['email' => 'Email atau password salah!'])->withInput();
    }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    function registerForm()
    {
        return view('register');
    }

    function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'role' => 'required'
        ],[
            'name.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'role.required' => 'Role wajib dipilih'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role
        ]);

        return redirect('/')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
}
