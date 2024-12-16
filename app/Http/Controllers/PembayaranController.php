<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index($checkedValue, $jumProduk)
    // public function pembayaran($produk, $jumlah, $options)
    {
        // Decode JSON menjadi array
        $checkedValueArray = json_decode($checkedValue, true);
        $jumProdukArray = json_decode($jumProduk, true);
        // $options = json_decode(urldecode($options));
        $prod = produk::whereIn('kode_produk', $checkedValueArray)->get();

        // Contoh penggunaan data
        $data = $prod->map(function ($produk) use ($checkedValueArray, $jumProdukArray) {
            $index = array_search($produk->kode_produk, $checkedValueArray);
            return [
                'kode_produk' => $produk->kode_produk,
                'nama_produk' => $produk->nama_produk,
                'gambar' => $produk->gambar,
                'harga' => $produk->harga,
                'jumlah' => $jumProdukArray[$index] ?? 0, // Default jumlah = 0 jika tidak ditemukan
                'subtotal' => $produk->harga * ($jumProdukArray[$index] ?? 0),
            ];
        });

        // Tampilkan ke view
        return view('pembayaran', compact('data'));
    }

    public function indexSingle($checkedValue, $jumProduk)
    {
        // Pastikan $checkedValue dan $jumProduk menjadi array
        $checkedValueArray = is_array($checkedValue) ? $checkedValue : [$checkedValue];
        $jumProdukArray = is_array($jumProduk) ? $jumProduk : [$jumProduk];

        // Ambil produk berdasarkan kode_produk
        $prod = Produk::whereIn('kode_produk', $checkedValueArray)->get();

        // Proses data produk
        $data = $prod->map(function ($produk) use ($checkedValueArray, $jumProdukArray) {
            $index = array_search($produk->kode_produk, $checkedValueArray);
            return [
                'kode_produk' => $produk->kode_produk,
                'nama_produk' => $produk->nama_produk,
                'gambar' => $produk->gambar,
                'harga' => $produk->harga,
                'jumlah' => $jumProdukArray[$index] ?? 0, // Default jumlah = 0 jika tidak ditemukan
                'subtotal' => $produk->harga * ($jumProdukArray[$index] ?? 0),
            ];
        });

        // Tampilkan ke view
        return view('pembayaran', compact('data'));
    }
}
