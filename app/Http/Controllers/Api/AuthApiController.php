<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; //Untuk proses auth
use Illuminate\Support\Facades\Validator; //Untuk validasi input

class AuthApiController extends Controller
{
    //Register user baru
    public function register(Request $request)
    {
        //Validasi input register dari user
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        //Jika validasi gagal, kirim error message
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //Jika validasi berhasil
        //Simpan data user ke database setelah enkripsi password
        $user = User::create([
            'name' => $request->name, //Nama user
            'email' => $request->email, //Email user
            'password' => bcrypt($request->password) //Enkripsi password
        ]);

        //Buat token untuk user yang baru register
        $token = $user->createToken('authToken')->accessToken;

        //Kirim response sukses beserta token
        return response()->json([
            'message' => 'Register berhasil',
            'user' => $user,
            'token' => $token
        ]);
    }

    //Login user
    public function login(Request $request)
    {
        //Cek apakah email dan password cocok

        //Jika tidak cocok, kirim error message
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json(['message' => 'Email atau password salah'], 401);
        }

        //Jika cocok
        //Ambil data user berdasarkan email
        $user = Auth::user();

        //Buat token baru setelah login
        $token = $user->createToken('authToken')->accessToken;

        //Kirim response sukses beserta token
        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user,
            'token' => $token
        ]);
    }

    //Mengambil data user yang sedang login
    public function user(Request $request)
    {
        return response()->json($request->user()); //Ambil data user berdasarkan token
    }

    ///Logout dan hapus token
    public function logout(Request $request)
    {
        $request->user()->token()->revoke(); //Nonaktifkan token
        return response()->json(['message' => 'Logout berhasil']); //Kirim success message
    }
}
