<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Update user data (password, phone, address).
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'password' => 'nullable|confirmed|min:8',
            'detail_alamat' => 'nullable|string|max:255',
            'phone' => 'required|string|max:15',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);      
        $user = User::findOrFail($id);

        // Update password jika ada
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        // Update nomor telepon
        $user->no_telpon = $request->phone;

        // Update alamat jika ada
        if ($request->filled('detail_alamat')) {
            $user->alamat->detail_alamat = $request->detail_alamat;
        }

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

        return redirect()->route('home')->with('success', 'Data berhasil diperbarui!');
        
    }

    // public function update(Request $request, $id) {
    //     $user = User::findOrFail($id);
    //     // Validasi input
    //     $request->validate([
    //         'password' => 'nullable|min:6',
    //         'phone' => 'required|string|max:15',
    //         'address' => 'required|string|max:255',
    //     ]);

    //     $user = Auth::user();

    //     // Perbarui password jika ada
    //     if ($request->filled('password')) {
    //         $user->password = Hash::make($request->password);
    //     }

    //     // Perbarui nomor telepon
    //     $user->no_telpon = $request->phone;

    //     // Perbarui atau buat data alamat
    //     $user->alamat()->updateOrCreate(
    //         ['id_user' => $user->id],
    //         ['detail_alamat' => $request->address]
    //     );

    //     $user->save();

    //     return redirect()->back()->with('success', 'Data akun berhasil diperbarui.');
    // }

    /**
     * Update user profile photo.
     */    
}
