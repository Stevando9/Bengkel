<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\User;
use App\Models\Montir;
use App\Models\produk;
use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard(){
      if ((Auth::check() && Auth::user()->tipe === 'admin')) {
        return view('Admin.dashboard'); 
      }
      return redirect()->route('login')->with('error', 'Harap Login.');                
      }

      public function produk(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {        
        return view('Admin.produk',['produk'=>produk::with('kategori')->get(), 'kategori'=>Kategori::all()]);
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }

      public function jasa(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {       
        return view('Admin.jasa',['jasa'=>Jasa::all()]);
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }

      public function jual(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {   

          return view('Admin.laporan_penjualan',['data'=>Pembayaran::with(['produk', 'jasa'])->get()]);
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }

      public function trans(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {   

          return view('Admin.laporan_pendapatan',['data'=>Transaksi::with(['user'])->get()]);
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }

      public function daftarUser(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {  
        $users = User::where('tipe', '!=', 'admin')->get();
        return view('Admin.user',['users'=>$users]);
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }

      public function montir(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {  
        return view('Admin.montir',['montir'=>Montir::all()]);
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }

      public function setting(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {  
        return view('Admin.settings');
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }
}
