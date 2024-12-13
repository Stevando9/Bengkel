<?php

namespace App\Http\Controllers;

use App\Models\produk;
use App\Models\Kategori;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('home',['produk'=>produk::with('kategori')->get(), 'kategori'=>Kategori::all(), 'ulasan'=>Ulasan::with('user')->get()]);
    }
}
