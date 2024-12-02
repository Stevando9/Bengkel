<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\produk;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    public function index(){
      return view('jasa',['jasa'=>Jasa::all(),'produk'=>produk::all()]);
    }

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


    public function update(Request $request, $kodeJasa)
    {
        $request->validate([
            'nama_jasa' => 'required|string|max:255',
            'biaya' => 'required|min:0',
        ]);

        $jasa = Jasa::where('kode_jasa', $kodeJasa)->first();

        $jasa->nama_jasa = $request->input('nama_jasa');
        $jasa->biaya = $request->input('biaya');
        $jasa->save();

        return redirect()->back()->with('success', 'Data jasa berhasil diperbarui.');
    }  

}
