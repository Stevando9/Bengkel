<?php

namespace App\Http\Controllers;

use App\Models\produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index(){
        return view('produk',['produk'=>produk::with('kategori')->get()]);
      }

    public function tambahProduk(Request $request){
      $request->validate([
        'kode_produk' => 'required|unique:produk,kode_produk|string',
        'nama_produk' => 'required',
        'kategori'     => 'required',
        'stok'        => 'required|integer',
        'harga'        => 'required|decimal:0,2',
        'gambar'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
      ]);

      // Mengambil nama produk dan membuat slug untuk nama file
      $productNameSlug = Str::slug($request->kode_produk, '-');      
      $imageName = $productNameSlug . '.' . $request->file('gambar')->getClientOriginalExtension();

      // Menyimpan gambar ke folder `public/images/products`
      $request->file('gambar')->move(public_path('img/produk'), $imageName);

      $kategoriId = $request['kategori'];

      // Simpan data produk ke database
      try {
      produk::create([
      'kode_produk' => $request->kode_produk,
      'nama_produk' => $request->nama_produk,
      'kategori_id'     => $kategoriId,
      'stok'        => $request->stok,
      'harga'        => $request->harga,
      'gambar'        => $imageName,
      ]);

      return redirect()->back()->with('success', 'Produk berhasil ditambahkan!');
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'Gagal menyimpan produk:' . $e->getMessage());
    }
    }

    public function hapusProduk(produk $produk){
      $prod = $produk;
      if ($prod) {
          // Hapus gambar dari folder `public/img`          
          $imagePath = public_path('img/produk' . $prod['gambar']);
          if (file_exists($imagePath)) {
              unlink($imagePath);
          }

          // Hapus produk dari database
          $prod->delete();

          return redirect()->back()->with('success', 'Produk berhasil dihapus!');
      } else {
          return redirect()->back()->with('error', 'Produk tidak ditemukan.');
      }
    }

    public function update(Request $request, $kodeProduk)
    {
        $request->validate([
            'nama_produk' => 'required',
            'kategori'     => 'required',
            'stok'        => 'required|integer',
            'harga'        => 'required|decimal:0,2',
            'gambar'        => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $produk = produk::where('kode_produk', $kodeProduk)->first();
        $kategoriId = $request['kategori'];

        $produk->nama_produk = $request->input('nama_produk');
        $produk->kategori_id = $kategoriId;
        $produk->stok = $request->input('stok');
        $produk->harga = $request->input('harga');
        if ($request->hasFile('gambar')) {
          // Hapus gambar dari folder `public/img`    
          if ($produk->gambar) {
              $imagePath = public_path('img/produk/' . $produk['foto']);
              if (file_exists($imagePath)) {
                  unlink($imagePath);
              }
          }              
          $productNameSlug = Str::slug($produk->kode_produk, '-');  
          $imageName = $productNameSlug . '.' . $request->file('gambar')->getClientOriginalExtension();
          $request->file('gambar')->move(public_path('img/produk'), $imageName);
          $produk->gambar = $imageName;
          }
        $produk->save();

        return redirect()->back()->with('success', 'Data Produk berhasil diperbarui.');
    }  

}
