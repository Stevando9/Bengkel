<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Update user data (password, phone, address).
     */
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'password' => 'nullable|min:6',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        // Perbarui password jika ada
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Perbarui nomor telepon
        $user->no_telpon = $request->phone;

        // Perbarui atau buat data alamat
        $user->alamat()->updateOrCreate(
            ['id_user' => $user->id],
            ['detail_alamat' => $request->address]
        );

        $user->save();

        return redirect()->back()->with('success', 'Data akun berhasil diperbarui.');
    }

    /**
     * Update user profile photo.
     */
    public function updateFoto(Request $request)
    {
        // Validasi input
        $request->validate([
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Maksimal ukuran 2MB
        ]);

        $user = Auth::user();

        // Proses file foto jika ada
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');

            // Simpan file di folder 'public/img'
            $fotoPath = $foto->store('public/img');

            // Ambil nama file untuk disimpan di database
            $fotoName = basename($fotoPath);

            // Hapus file lama jika ada
            if ($user->foto) {
                Storage::delete('public/img/' . $user->foto);
            }

            // Simpan nama file ke database
            $user->foto = $fotoName;
        }

        $user->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
