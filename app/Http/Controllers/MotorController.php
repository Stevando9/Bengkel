<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
{
    public function tambah(Request $request){
        $request->validate([          
            'plat' => 'required',
            'merk' => 'required',            
          ]);

          try {
            Motor::create([
            'no_plat' => $request->plat,
            'merk_motor' => $request->merk,
            'id_user' => Auth::user()->id
            ]);
      
            return redirect()->back()->with('success', 'Motor berhasil ditambahkan!');
          } catch (\Exception $e) {
            echo $e;
          }
    }
}
