<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index(){
    if ((Auth::check() && Auth::user()->tipe === 'member')) {
        $keranjang= Keranjang::with('produk')->where('user_id',Auth::user()->id)->get();
        $total = $keranjang->count();
        $harga = Keranjang::where('user_id', Auth::user()->id)->sum('estimasi_harga');
        return view('keranjang',compact('keranjang', 'total', 'harga'));
      }
      return redirect()->route('login')->with('error', 'Harap Login.');    
    }

    public function add($kode){
        $prod = produk::where('kode_produk', $kode)->first();
        try {
            Keranjang::create([
            'kode_produk' => $kode,
            'jumlah' => 1,
            'estimasi_harga' => $prod->harga,
            'user_id'        => Auth::user()->id,
            ]);
      
            return redirect()->route('keranjang')->with('success', 'barang berhasil ditambahkan!');
          } catch (\Exception $e) {
            echo($e->getMessage());
          }
    }
}
