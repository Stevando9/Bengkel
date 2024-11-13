<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function tambahJasa(Request $request){
        // valiasi data
        $request->validate([
          'kode_jasa' => 'required|unique:jasa,kode_jasa|string',
          'nama_jasa' => 'required',
          'biaya'        => 'required|decimal:0,2',
        ]);
  
        // Simpan data jasa ke database
        try {
        Jasa::create([
        'kode_jasa' => $request->kode_jasa,
        'nama_jasa' => $request->nama_jasa,
        'biaya'        => $request->biaya,
        ]);
  
        return redirect()->back()->with('success', 'Jasa berhasil ditambahkan!');
      } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan jasa:' . $e->getMessage());
      }
      }

    public function hapusJasa(Jasa $jasa){
        $jas = $jasa;
        if ($jas) {

            // Hapus jasa dari database
            $jas->delete();
  
            return redirect()->back()->with('success', 'Jasa berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Jasa tidak ditemukan.');
        }
      }
}
