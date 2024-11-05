<?php

use App\Http\Controllers\AuthControler;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/well', function () {
    return view('welcome');
});

// admin
// Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');

Route::get('/login', [AuthControler::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/register', [AuthControler::class, 'register'])->name('register.post');
Route::get('/register', [AuthControler::class, 'showRegisterForm'])->name('register');


Route::get('/Admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('/Admin/produk', [AdminController::class, 'produk'])->name('admin_produk');
Route::get('/Admin/jasa', [AdminController::class, 'jasa'])->name('admin_jasa');
Route::get('/Admin/user', [AdminController::class, 'daftarUser'])->name('admin_user');
Route::get('/Admin/montir', [AdminController::class, 'montir'])->name('admin_montir');

// Route::group(['middleware' => ['auth', 'tipe:user']], function () {
//     Route::get('/home', [AuthControler::class, 'index'])->name('user.home');
// });
// Route::group(['middleware' => ['auth', 'tipe:admin']], function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });

//login regis

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/keranjang', function () {
    return view('keranjang');
})->name('keranjang');

//produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');

//jasa
Route::get('/jasa', function () {
    return view('jasa', []);
})->name('jasa');

Route::get('/review_modal', function () {
    return view('review_modal', []);
})->name('review_modal');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
