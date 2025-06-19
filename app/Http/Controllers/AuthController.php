<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login', [
            'title' => 'Login | ',
            'description' => ''
        ]);
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password'); // Ambil email dan password

        if (Auth::attempt($credentials)) {
            // Ambil nama pengguna setelah login
            $user = Auth::user();
            $name = $user->name; // Mengambil nama dari user yang sedang login

            // Jika login berhasil, alihkan ke halaman login dengan pesan sukses
            return redirect('login')->with('success', 'Selamat datang, ' . $name);
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return redirect('login')->with('error', 'Email atau password salah.');
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
