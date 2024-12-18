<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Keranjang;
use App\Models\produk;
use App\Models\Transaksi;
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

    public function indexSingle($checkedValue, $jumProduk, $deliveryMethod)
    {
        // Pastikan $checkedValue dan $jumProduk menjadi array
        $checkedValueArray = is_array($checkedValue) ? $checkedValue : [$checkedValue];
        $jumProdukArray = is_array($jumProduk) ? $jumProduk : [$jumProduk];

        // Ambil produk berdasarkan kode_produk
        $prod = Produk::whereIn('kode_produk', $checkedValueArray)->get();
        $jasa = Jasa::where('kode_jasa', 'J003')->first();

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

    public function showPembayaranBank(Request $request)
    {
        // Ambil data dari query string
        $data = json_decode($request->input('data'), true); // Decode JSON ke array
        $total = json_decode($request->input('total'),true);

        // $total =0;
        // foreach ($data as $item) {
        //     $total+=$item['subtotal'];
        // }        
        // Ambil nama bank dari query string
        $bank = $request->input('metode'); // 'bank' berasal dari query parameter (?bank=)
        return view('pembayaranbank', compact('data','bank','total'));
    }

    public function showPembayaranQris(Request $request)
    {
        // Ambil data dari query string
        $data = json_decode($request->input('data'), true); // Decode JSON ke array
        $total = json_decode($request->input('total'),true);

        // $total =0;
        // foreach ($data as $item) {
        //     $total+=$item['subtotal'];
        // }        
        // Ambil nama bank dari query string
        $bank = $request->input('metode'); // 'bank' berasal dari query parameter (?bank=)
        return view('pembayaranqris', compact('data','total','bank'));
    }

    public function konfirmasi(Request $request){
        $data= json_decode($request->input('data'), true);
        $total = $request->input('total');
        $metode = $request->input('metode');
        $random = rand(100000000000, 999999999999);
        try {
            Transaksi::create([
                'kode_pembayaran' => $random,
                'totalHarga' => $total,
                'metode_pembayaran' => $metode,
                'id_user' => Auth::user()->id,
                'status' => "pending"               
            ]);
        } catch (\Throwable $th) {
            echo $th;
        }
        $trans=Transaksi::where('kode_pembayaran',$random)->first();
        return view('konfirmasipembayaran', compact('trans','data'));
    }

    public function gagal(Request $request){
        $transId= $request->input('trans');
        $data= json_decode($request->input('data'), true);        

        $transaksi = Produk::where('kode_pembayaran', $transId)->first();
        if ($transaksi) {
            $transaksi->update(['status' => 'failed']);
            $transaksi->save(); // Jangan lupa untuk menyimpan perubahan
        }
        return view('pembayarangagal',compact('transaksi'));
    }

    public function berhasil(Request $request){
        $transId= $request->input('trans');
        $data= json_decode($request->input('data'), true);
        foreach ($data as $item) {
            if (!isset($item['kode_produk'])) {
                continue; // Lewati jika tidak ada 'kode_produk'
            }
    
            $keranjang = Keranjang::where('kode_produk', $item['kode_produk'])->first();
            if ($keranjang) {
                $keranjang->delete();
            }
        }   
        $transaksi = Transaksi::where('kode_pembayaran', $transId)->first();
        if ($transaksi) {
            $transaksi->update(['status' => 'success']);
            $transaksi->save(); // Jangan lupa untuk menyimpan perubahan
        }
        return view('pembayaranberhasil',compact('transaksi'));       
    }
}
