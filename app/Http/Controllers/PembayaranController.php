<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index($checkedValue, $jumProdukArray)
    {
        // Decode JSON menjadi array
        $checkedValueArray = json_decode($checkedValue, true);
        $jumProdukArray = json_decode($jumProdukArray, true);

        $prod= produk::whereIn('kode_produk',$checkedValueArray);

        // Contoh penggunaan data
        $data = $prod->map(function ($produk) use ($checkedValueArray, $jumProdukArray) {
            $index = array_search($produk->kode_produk, $checkedValueArray);
            return [
                'kode_produk' => $produk->kode_produk,
                'nama_produk' => $produk->nama_produk,
                'harga' => $produk->harga,
                'jumlah' => $jumProdukArray[$index] ?? 0, // Default jumlah = 0 jika tidak ditemukan
                'subtotal' => $produk->harga * ($jumProdukArray[$index] ?? 0),
            ];
        });

        // Tampilkan ke view
        return view('pembayaran', compact('data'));
    }

}
