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
Route::get('/Admin/setting', [AdminController::class, 'setting'])->name('admin_settings');

Route::post('/Admin/setting/{id}', [AuthControler::class, 'updateAdmin'])->name('admin_update');

Route::post('/Admin/tambahProduk', [ProdukController::class, 'tambahProduk'])->name('tambahProduk');
Route::get('/Admin/hapus/{produk:kode_produk}', [ProdukController::class, 'hapusProduk'])->name('hapusProduk');
Route::post('/Admin/editProduk/{kode_produk}', [ProdukController::class, 'update'])->name('updateProduk');

Route::post('/Admin/tambahJasa', [JasaController::class, 'tambahJasa'])->name('tambahJasa');
Route::get('/Admin/hapusJasa/{jasa:kode_jasa}', [JasaController::class, 'hapusJasa'])->name('hapusJasa');
Route::post('/Admin/editJasa/{kode_jasa}', [JasaController::class, 'update'])->name('updateJasa');

Route::post('/Admin/tambahMontir', [MontirController::class, 'tambahMontir'])->name('tambahMontir');
Route::get('/Admin/hapusMontir/{montir:id}', [MontirController::class, 'hapusMontir'])->name('hapusMontir');
Route::post('/Admin/editMontir/{id}', [MontirController::class, 'update'])->name('updateMontir');
// Route::group(['middleware' => ['auth', 'tipe:user']], function () {
//     Route::get('/home', [AuthControler::class, 'index'])->name('user.home');
// });
// Route::group(['middleware' => ['auth', 'tipe:admin']], function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

//login regis
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/keranjang', function () {
    return view('keranjang');
})->name('keranjang');

//produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/kategori/{kategori_id}', [ProdukController::class, 'byKategori'])->name('produkByKat');
Route::get('/produk/detail_produk/{kode_produk}', [ProdukController::class, 'detail'])->name('detailProduk');
//jasa
Route::get('/jasa', [JasaController::class, 'index'])->name('jasa');


Route::get('/review_modal', function () {
    return view('review_modal', []);
})->name('review_modal');

Route::get('pembayaran', function () {
    return view('pembayaran');
})->name('pembayaran');

Route::get('/pembayaran/pembayaranqris', function () {
    return view('pembayaranqris');
})->name('pembayaranqris');

Route::get('/pembayaran/pembayaranbank', function () {
    return view('pembayaranbank');
})->name('pembayaranbank');

Route::get('/pembayaran/pembayarangagal', function () {
    return view('pembayarangagal');
})->name('pembayarangagal');

Route::get('/pembayaran/pembayaranberhasil', function () {
    return view('pembayaranberhasil');
})->name('pembayaranberhasil');

Route::get('/pembayaran/pembayaranberhasilcod', function () {
    return view('pembayaranberhasilcod');
})->name('pembayaranberhasilcod');

Route::get('/update', function () {
    return view('pembayaran');
})->name('pembayaran');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
