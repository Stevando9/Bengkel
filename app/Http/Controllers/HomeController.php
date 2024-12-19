<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\produk;
use App\Models\Ulasan;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home',['produk'=>produk::with('kategori')->get(), 'kategori'=>Kategori::all(), 'ulasan'=>Ulasan::with('user')->get(), 'jasa'=>Jasa::all()]);
    }

    // public function booking_jasa(Request $request){
    //     // Tangkap input dari halaman Home
    //     $data = $request    ->validate([
    //         'nama_jasa' => 'required',
    //         'tanggal' => 'required|date',
    //         'jam' => 'required',
    //         'produk' => 'nullable|string',
    //         'promo' => 'nullable|string',
    //     ]);

    //     // Simpan ke dalam session
    //     session([
    //         'booking_data' => $data,
    //     ]);

    //     // Redirect ke halaman Jasa
    //     return redirect()->route('jasa');
    // }
}
