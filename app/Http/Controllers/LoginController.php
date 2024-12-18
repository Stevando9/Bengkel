<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8'
            ],
            ['password.min' => 'Password harus minimal 8 karakter.']
        );

        // Jika login berhasil
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect berdasarkan tipe user
            return $this->authenticated($request, Auth::user());
        }

        // Jika login gagal
        return redirect()->back()->with('error', 'Password atau email salah.');
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->tipe == 'admin') {
            return redirect('/Admin/dashboard')->with('success', 'Login berhasil. Selamat datang' . $user->nama_lengkap . '!');
        } elseif ($user->tipe == 'member') {
            return redirect('/home')->with('success', 'Login berhasil. Selamat datang ' . $user->nama_lengkap . '!');
        }

        return redirect()->back()->with('error', 'Tipe pengguna tidak valid.');
    }
}
