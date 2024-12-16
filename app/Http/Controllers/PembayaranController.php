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
        // Logika untuk memproses data
        // return view('checkout', compact('produk', 'jumlah', 'options'));
    }

    // public function prosesPembayaran(Request $request)
    // {
    //     try {
    //         $dataProduk = $request->input('dataProduk');
    //         $userId = Auth::id();
    //         $alamat = $request->input('alamat');
    //         $noTelp = $request->input('noTelp');
    //         $penerima = $request->input('nama');
    //         $subtotal = $request->input('subtotal');
    //         $biayaPengiriman = $request->input('biayaPengiriman');
    //         $metodePembayaran = $request->input('metode');
    //         $totalHargaKeseluruhan = $subtotal + $biayaPengiriman;

    //         foreach ($dataProduk as $produk) {
    //             DB::table('pembelian')->insert([
    //                 'id_user' => $userId,
    //                 'kode_produk' => $produk['kode_produk'],
    //                 'alamat_tujuan' => $alamat,
    //                 'no_telp' => $noTelp,
    //                 'penerima' => $penerima,
    //                 'jumlah' => $produk['jumlah'],
    //                 'totalHarga' => $produk['subtotal'],
    //                 'created_at' => now(),
    //                 'updated_at' => now(),
    //             ]);
    //         }

    //         return response()->json([
    //             'success' => true,
    //             'redirect' => route('pembayaranberhasil', ['metode' => $metodePembayaran])
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => $e->getMessage()
    //         ]);
    //     }
    // }
}
