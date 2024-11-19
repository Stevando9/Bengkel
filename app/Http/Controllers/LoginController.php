<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{

    public function login(Request $request)
    {
        // Validasi data login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Jika validasi berhasil, lakukan login
        if (Auth::attempt($credentials)) {
            // Pengguna berhasil login, redirect sesuai role            
            $request->session()->regenerate();
            return $this->authenticated($request, Auth::user())
                ?: redirect()->intended('/fail');
        }

        // Jika login gagal, kirimkan error
        return redirect()->back()->with('error', 'Login Gagal');
    }

    protected function authenticated(Request $request, $user)
    {   
        if ($user->tipe == 'admin') {
            return redirect('/Admin/dashboard')->with('success', 'Login berhasil. Selamat Datang.');
        } else if ($user->tipe == 'member') {
            return redirect('/home')->with('success', 'Login berhasil. Selamat Datang.');            
        }

        return redirect()->back()->with('error', 'Login Gagal');
    }
}
