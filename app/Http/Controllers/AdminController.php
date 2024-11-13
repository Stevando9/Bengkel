<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Kategori;
use App\Models\Montir;
use App\Models\produk;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('Admin.dashboard');
      }

      public function produk(){
        return view('Admin.produk',['produk'=>produk::all(), 'kategori'=>Kategori::all()]);
      }

      public function jasa(){
        return view('Admin.jasa',['jasa'=>Jasa::all()]);
      }

      public function daftarUser(){
        $users = User::where('tipe', '!=', 'admin')->get();
        return view('Admin.user',['users'=>$users]);
      }

      public function montir(){
        return view('Admin.montir',['montir'=>Montir::all()]);
      }
}
