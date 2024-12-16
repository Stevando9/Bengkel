<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    public function index($checkedValue, $jumProduk, $deliveryMethod)
    // public function pembayaran($produk, $jumlah, $options)
    {
        // Decode JSON menjadi array
        $checkedValueArray = json_decode($checkedValue, true);
        $jumProdukArray = json_decode($jumProduk, true);

        $prod = produk::whereIn('kode_produk', $checkedValueArray)->get();
        $jasa = Jasa::where('kode_jasa', 'J003')->first();

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

        // Tentukan biaya tambahan berdasarkan metode pengiriman
        $additionalCost = 0;
        if ($deliveryMethod === 'radioKirim') {
            $additionalCost = 15000; // Biaya kirim
        } elseif ($deliveryMethod === 'radioPasang') {
            $additionalCost = $jasa['biaya']; // Biaya pasang di tempat
        }

        // Subtotal
        $subtotal = $data->sum('subtotal');
        $total = $subtotal + $additionalCost;

        // Tampilkan ke view
        return view('pembayaran', compact('data', 'subtotal', 'additionalCost', 'total', 'deliveryMethod'));
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
