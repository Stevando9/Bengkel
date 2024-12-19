<?php

use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthControler;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\pembayaranbank;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MontirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\pembayaranbankController;

// admin
// Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

Route::get('/login', [AuthControler::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/register', [AuthControler::class, 'register'])->name('register.post');
Route::get('/register', [AuthControler::class, 'showRegisterForm'])->name('register');
Route::get('/logout', [AuthControler::class, 'logout'])->name('logout');

// Route::post('/update-user', [UserController::class, 'update'])->name('user.update');
Route::middleware(['auth'])->group(function () {
    // Menggunakan controller UserController dengan method update
    // Route::put('/user/update', [UserController::class, 'update'])->name('user.update');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');
    Route::put('/ulasan/{id}', [UlasanController::class, 'update'])->name('ulasan.update');
    Route::post('/ulasan', [UlasanController::class, 'storeOrUpdate'])->name('ulasan.storeOrUpdate');
});

Route::get('/Admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/Admin/produk', [AdminController::class, 'produk'])->name('admin_produk');
Route::get('/Admin/jasa', [AdminController::class, 'jasa'])->name('admin_jasa');
Route::get('/Admin/user', [AdminController::class, 'daftarUser'])->name('admin_user');
Route::get('/Admin/montir', [AdminController::class, 'montir'])->name('admin_montir');
Route::get('/Admin/setting', [AdminController::class, 'setting'])->name('admin_settings');
Route::get('/Admin/penjualan', [AdminController::class, 'jual'])->name('admin_jual');
Route::get('/Admin/pendapatan', [AdminController::class, 'trans'])->name('admin_dapat');

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

Route::get('/keranjang', [KeranjangController::class, 'index'])->name('keranjang');
Route::get('/keranjang/tambah/{kode_produk}', [KeranjangController::class, 'add'])->name('addKeranjang');
Route::post('/keranjang/add', [KeranjangController::class, 'add'])->name('keranjang.add');
Route::post('/keranjang/update', [KeranjangController::class, 'updateJumlah'])->name('keranjang.update');
Route::get('/keranjang/remove/{id}', [KeranjangController::class, 'remove'])->name('keranjang.remove');

//produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/kategori/{kategori_id}', [ProdukController::class, 'byKategori'])->name('produkByKat');
Route::get('/produk/detail_produk/{kode_produk}', [ProdukController::class, 'detail'])->name('detailProduk');
//jasa
Route::get('/jasa', [JasaController::class, 'index'])->name('jasa');
Route::post('/motor/tambahMotor', [MotorController::class, 'tambah'])->name('tambahMotor');
Route::post('/jasa/booking', [BookingController::class, 'tambah'])->name('tambahBook');

Route::get('/review_modal', function () {
    return view('review_modal', []);
})->name('review_modal');

// Route::post('/proses-pembayaran', [PembayaranController::class, 'prosesPembayaran'])->name('prosesPembayaran');

Route::get('/pembayaran/{checkedValue}/{jumProdukArray}/{deliveryMethod}', [PembayaranController::class, 'index'])->name('pembayaran');
Route::get('/pembayaran/single/{kode_produk}/{jumlah}/{deliveryMethod}', [PembayaranController::class, 'indexSingle'])->name('pembayaran.single');

Route::get('/pembayaran/konfirmasi/', [PembayaranController::class, 'konfirmasi'])->name('konfirmasipembayaran');


Route::get('pembayaran/pembayaranbank', [PembayaranController::class, 'showPembayaranBank'])->name('pembayaranbank');
Route::get('pembayaran/pembayaranqris', [PembayaranController::class, 'showPembayaranQris'])->name('pembayaranqris');


Route::get('/pembayaran/pembayarangagal', [PembayaranController::class, 'gagal'])->name('pembayarangagal');
Route::get('/pembayaran/pembayaranberhasil', [PembayaranController::class, 'berhasil'])->name('pembayaranberhasil');

Route::get('/pembayaran/pembayaranberhasilcod', [PembayaranController::class, 'cod'])->name('pembayaranberhasilcod');

Route::get('/pembayaranjasa', function () {
    return view('pembayaranjasa', []);
})->name('pembayaranjasa');
// Route::get('/update', function () {
//     return view('pembayaran');
// })->name('pembayaran');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
