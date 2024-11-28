<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\MontirController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// admin
// Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

Route::get('/login', [AuthControler::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/register', [AuthControler::class, 'register'])->name('register.post');
Route::get('/register', [AuthControler::class, 'showRegisterForm'])->name('register');
Route::get('/logout', [AuthControler::class, 'logout'])->name('logout');


Route::get('/Admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/Admin/produk', [AdminController::class, 'produk'])->name('admin_produk');
Route::get('/Admin/jasa', [AdminController::class, 'jasa'])->name('admin_jasa');
Route::get('/Admin/user', [AdminController::class, 'daftarUser'])->name('admin_user');
Route::get('/Admin/montir', [AdminController::class, 'montir'])->name('admin_montir');

Route::post('/Admin/produk', [ProdukController::class, 'tambahProduk'])->name('tambahProduk');
Route::get('/Admin/hapus/{produk:kode_produk}', [ProdukController::class, 'hapusProduk'])->name('hapusProduk');

Route::post('/Admin/tambahJasa', [JasaController::class, 'tambahJasa'])->name('tambahJasa');
Route::get('/Admin/hapusJasa/{jasa:kode_jasa}', [JasaController::class, 'hapusJasa'])->name('hapusJasa');

Route::post('/Admin/tambahMontir', [MontirController::class, 'tambahMontir'])->name('tambahMontir');
Route::get('/Admin/hapusMontir/{montir:id}', [MontirController::class, 'hapusMontir'])->name('hapusMontir');
// Route::group(['middleware' => ['auth', 'tipe:user']], function () {
//     Route::get('/home', [AuthControler::class, 'index'])->name('user.home');
// });
// Route::group(['middleware' => ['auth', 'tipe:admin']], function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

//login regis
Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/keranjang', function () {
    return view('keranjang');
})->name('keranjang');

//produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

//jasa
Route::get('/produk/detail_produk', function () {
    return view('detail_produk', []);
})->name('detail_produk');

Route::get('/jasa', function () {
    return view('jasa', []);
})->name('jasa');

Route::get('/review_modal', function () {
    return view('review_modal', []);
})->name('review_modal');

Route::get('/pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran');

Route::get('/pembayaranqris', function () {
    return view('pembayaranqris');
})->name('pembayaranqris');

Route::get('/pembayaranbank', function () {
    return view('pembayaranbank');
})->name('pembayaranbank');

Route::get('/pembayarangagal', function () {
    return view('pembayarangagal');
})->name('pembayarangagal');

Route::get('/pembayaranberhasil', function () {
    return view('pembayaranberhasil');
})->name('pembayaranberhasil');

Route::get('/pembayaranberhasilcod', function () {
    return view('pembayaranberhasilcod');
})->name('pembayaranberhasilcod');

Route::get('/update', function () {
    return view('pembayaran');
})->name('pembayaran');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
