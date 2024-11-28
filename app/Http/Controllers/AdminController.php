<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\User;
use App\Models\Montir;
use App\Models\produk;
use App\Models\Kategori;
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
        return view('Admin.produk',['produk'=>produk::all(), 'kategori'=>Kategori::all()]);
        }
        return redirect()->route('login')->with('error', 'Harap Login.'); 
      }

      public function jasa(){
        if ((Auth::check() && Auth::user()->tipe === 'admin')) {       
        return view('Admin.jasa',['jasa'=>Jasa::all()]);
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
}
