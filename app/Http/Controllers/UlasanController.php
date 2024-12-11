<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    // Simpan ulasan baru
    public function store(Request $request)
    {
        $request->validate([
            'isiPesan' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Ulasan::create([
            'isiPesan' => $request->isiPesan,
            'rating' => $request->rating,
            'id_user' => auth()->id(),
        ]);

        return response()->json(['message' => 'Ulasan berhasil disimpan']);
    }

    // Update ulasan yang sudah ada
    public function update(Request $request, $id)
    {
        $request->validate([
            'isiPesan' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $ulasan = Ulasan::where('id', $id)->where('id_user', auth()->id())->firstOrFail();
        $ulasan->update([
            'isiPesan' => $request->isiPesan,
            'rating' => $request->rating,
        ]);

        return response()->json(['message' => 'Ulasan berhasil diperbarui']);
    }
    public function storeOrUpdate(Request $request)
    {
        $validated = $request->validate([
            'isiPesan' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Cari ulasan user saat ini berdasarkan id_user
        $ulasan = Ulasan::where('id_user', auth()->id())->first();

        if ($ulasan) {
            // Update ulasan yang sudah ada
            $ulasan->update([
                'isiPesan' => $validated['isiPesan'],
                'rating' => $validated['rating'],
            ]);

            return response()->json([
                'message' => 'Ulasan Anda telah diperbarui.',
            ], 200);
        } else {
            // Buat ulasan baru
            Ulasan::create([
                'id_user' => auth()->id(),
                'isiPesan' => $validated['isiPesan'],
                'rating' => $validated['rating'],
            ]);

            return response()->json([
                'message' => 'Ulasan Anda telah ditambahkan.',
            ], 201);
        }
    }
}
