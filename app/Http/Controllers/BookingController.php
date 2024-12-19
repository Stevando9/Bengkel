<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function tambah(Request $request){
        $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk|string',
            'nama_produk' => 'required',
            'kategori'     => 'required',
            'stok'        => 'required|integer',
            'harga'        => 'required|decimal:0,2',
            'gambar'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
          ]);
    }
}
