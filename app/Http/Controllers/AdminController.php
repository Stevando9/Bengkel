<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('Admin.dashboard');
      }

      public function produk(){
        return view('Admin.produk');
      }

      public function jasa(){
        return view('Admin.jasa');
      }

      public function daftarUser(){
        return view('Admin.user');
      }

      public function montir(){
        return view('Admin.montir');
      }
}
