<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except(['logout']);
    }

    public function login()
    {
        $data = [
            'judul' => 'Login',
            'background' => 'bg-pudar',
        ];

        return view('auth.login', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/')->with('login', 'Login sukses, selamat datang ' . Auth::user()->name . '!');
        } else {
            return redirect('login')->with('error_messages', 'Email atau password salah.');
        }
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('/')->with('logout', 'Logout sukses.');
    }

    public function register()
    {
        $data = [
            'judul' => 'Register',
            'background' => 'bg-pudar',
        ];

        return view('auth.register', $data);
    }

    public function register_store(AuthRequest $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect('login')->with('success', 'Registrasi sukses, silahkan login kembali.');
    }
}
