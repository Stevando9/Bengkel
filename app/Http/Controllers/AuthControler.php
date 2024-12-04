<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControler extends Controller
{
    public function showLoginForm(){        
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('home')->with('success', 'Login berhasil. Selamat Datang.');
            $request->session()->regenerate();
        }else{
            return redirect()->back()->with('error', 'Login Gagal');
        }

        // if (Auth::attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('home')->with('success', 'Login berhasil. Selamat Datang.');
        // }

        // return back()->withErrors([
        //     'email' => "Email atau Password salah",
        // ])->onlyInput('email');
    }

    public function logout(Request $request){
        // Logout user
        Auth::logout();

        // Hapus sesi untuk keamanan
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('register');
    }

    // Proses registrasi customer
    public function register(Request $request)
    {
        // // Validasi input
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telp' => 'required|string|max:15', // Tambahkan validasi untuk nomor telepon jika diperlukan
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Menyimpan data ke database
        User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tipe' => 'member',  #Role diset ke customer
            'no_plat' => null,
            'nama_lengkap' => $request->nama_lengkap,
            'no_telpon' => $request->nomor_telp                        
        ]);

        // Redirect ke halaman login setelah registrasi sukses
        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
    

    public function updateAdmin(Request $request, $id)
    {$request->validate([
        'password' => 'nullable|confirmed|min:8', // memastikan password == password_confirmation
        'nomor_telpon' => 'required|string|digits_between:10,15',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $user = User::findOrFail($id);

    // Jika password diisi, maka perbarui password
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->no_telpon = $request->nomor_telpon;

    // Jika ada file foto yang diupload, simpan file baru
    if ($request->hasFile('photo')) {
        // Hapus gambar dari folder `public/img`    
        if ($user->foto) {
            $imagePath = public_path('img/user/' . $user['foto']);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }              
        $usernameSlug = Str::slug($user->nama_lengkap, '-');  
        $imageName = $usernameSlug . '.' . $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move(public_path('img/user'), $imageName);
        $user->foto = $imageName;
    }

    $user->save();

    return redirect()->route('admin_settings')->with('success', 'Data berhasil diperbarui!');
    }
}
