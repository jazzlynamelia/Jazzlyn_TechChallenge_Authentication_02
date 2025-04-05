<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //Untuk auth deafult laravel
use Illuminate\Support\Facades\Hash; //Untuk enkripsi password
use Laravel\Passport\HasApiTokens;   //Untuk auth token Passport

class AuthController extends Controller
{
    //Tampilin halaman register
    public function showRegister()
    {
        return view('auth.register'); //Tampilin form register
    }

    //Proses register
    public function register(Request $request)
    {
        //Validasi data dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        //Simpan user ke database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), //Enkripsi password
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    //Tampilin halaman login
    public function showLogin()
    {
        return view('auth.login'); //Tampilin form login
    }

    //Proses login
    public function login(Request $request)
    {
        //Validasi form
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        //Cek credential user
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors([
                'email' => 'Email atau password salah.',
            ]);
        }

        //Ambil user dan buat token Passport
        $user = Auth::user();
        $token = $user->createToken('authToken')->accessToken;

        //Redirect ke dashboard
        return redirect()->route('dashboard');
    }

    //Return ke dashboard setelah login sukses
    public function dashboard()
    {
        return view('dashboard');
    }

    //Logout user
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete(); //Hapus semua token Passport user saat ini

        Auth::logout(); //Logout dari session

        return redirect('/login');
    }
}
