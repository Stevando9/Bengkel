<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'password' => 'nullable|min:6',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $user = Auth::user();
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->no_telpon = $request->phone;

        // Perbarui atau buat data alamat
        $user->alamat()->updateOrCreate([], [
            'detail_alamat' => $request->address,
        ]);

        $user->save();

        return redirect()->back()->with('success', 'Data akun berhasil diperbarui.');
    }
}
