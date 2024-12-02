<?php

namespace App\Http\Controllers;

use App\Models\Montir;
use Illuminate\Http\Request;

class MontirController extends Controller
{
    public function tambahMontir(Request $request){
        // dd($request->all());
        // valiasi data
        $request->validate([          
          'nama_montir' => 'required',
          'pengalaman' => 'required',
        ]);
  
        // Simpan data Montir ke database
        try {
        Montir::create([
        'nama_montir' => $request->nama_montir,
        'pengalaman' => $request->pengalaman,
        'status' => 'kosong'
        ]);
  
        return redirect()->back()->with('success', 'Montir berhasil ditambahkan!');
      } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Gagal menyimpan Montir:' . $e->getMessage());
      }
      }

    public function hapusMontir(Montir $montir){
        $mon = $montir;
        if ($mon) {

            // Hapus Montir dari database
            $mon->delete();
  
            return redirect()->back()->with('success', 'Montir berhasil dihapus!');
        } else {
            return redirect()->back()->with('error', 'Montir tidak ditemukan.');
        }
      }

      public function update(Request $request, $id)
    {
      $request->validate([          
        'nama_montir' => 'required',
        'pengalaman' => 'required',
      ]);

        $montir = Montir::where('id', $id)->first();

        $montir->nama_montir = $request->input('nama_montir');
        $montir->pengalaman = $request->input('pengalaman');
        $montir->save();

        return redirect()->back()->with('success', 'Data jasa berhasil diperbarui.');
    }  
}
