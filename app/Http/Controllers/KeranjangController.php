<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\Kategori;
use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\alert;

class KeranjangController extends Controller
{
  public function index()
  {
    if (Auth::check() && Auth::user()->tipe === 'member') {
      // Ambil data keranjang berdasarkan user ID
      $keranjang = Keranjang::with('produk')->where('user_id', Auth::id())->get();

      return view('keranjang', [
        'keranjang' => $keranjang,
        'harga' => 0 // Subtotal default
      ]);
    }

    // Jika pengguna belum login
    return redirect()->route('login')->with('error', 'Harap login terlebih dahulu.');
  }


  public function add(Request $request)
  {
    $kode = $request->kode_produk;

    $prod = Produk::where('kode_produk', $kode)->first();

    if (!$prod) {
      return redirect()->back()->with('error', 'Produk tidak ditemukan.');
    }

    try {
      // Periksa jika produk sudah ada di keranjang
      $keranjang = Keranjang::where('kode_produk', $kode)
        ->where('user_id', Auth::id())
        ->first();

      if ($keranjang) {
        // Perbarui jumlah dan estimasi harga
        $keranjang->jumlah += 1;
        $keranjang->estimasi_harga = $keranjang->jumlah * $prod->harga;
        $keranjang->save();
      } else {
        // Tambahkan produk ke keranjang
        Keranjang::create([
          'kode_produk' => $kode,
          'jumlah' => 1,
          'estimasi_harga' => $prod->harga,
          'user_id' => Auth::id(),
        ]);
      }

      return redirect()->route('keranjang')->with('success', 'Barang berhasil ditambahkan ke keranjang!');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
  }

  public function updateJumlah(Request $request)
  {
    $validated = $request->validate([
      'kode_produk' => 'required|string',
      'jumlah' => 'required|integer|min:1',
    ]);

    // $keranjang = Keranjang::where('kode_produk', $validated['kode_produk'])
    $keranjang = Keranjang::where('kode_produk', $request->kode_produk)
      ->where('user_id', Auth::id())
      ->first();

    if ($keranjang) {
      // $keranjang->jumlah = $validated['jumlah'];
      $keranjang->jumlah = $request->jumlah;
      $keranjang->estimasi_harga = $keranjang->jumlah * $keranjang->produk->harga;
      $keranjang->save();
      return response()->json(['success' => true]);
      // return redirect()->route('keranjang')->with('success', 'Jumlah berhasil diperbarui.');
    }

    return redirect()->back()->with('error', 'Produk tidak ditemukan.');
  }

  public function remove($kode)
  {
    $keranjang = Keranjang::where('id', $kode)->first();
    if ($keranjang) {
      $keranjang->delete();
      
      return redirect()->route('keranjang')->with(alert('Barang Telah dihapus'));
    }

    return redirect()->back()->with('error', 'Barang tidak ditemukan di keranjang.');
  }

  // public function add($kode){
  //     $prod = produk::where('kode_produk', $kode)->first();
  //     try {
  //         Keranjang::create([
  //         'kode_produk' => $kode,
  //         'jumlah' => 1,
  //         'estimasi_harga' => $prod->harga,
  //         'user_id'        => Auth::user()->id,
  //         ]);

  //         return redirect()->route('keranjang')->with('success', 'barang berhasil ditambahkan!');
  //       } catch (\Exception $e) {
  //         echo($e->getMessage());
  //       }
  // }
}
