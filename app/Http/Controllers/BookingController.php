<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Montir;
use App\Models\produk;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function tambah(Request $request){
        $request->validate([
            'jasa' => 'required',
            'motor' => 'required',
            'tanggal_booking'     => 'required',
            'jam_booking'        => 'required',
            'keluhan'        => 'nullable',
            'produk' => 'nullable'
          ]);
          $kodeJasa= $request['jasa'];
          $kodeProduk= $request['produk'];
          $random= rand(1,4);
          $jasa = Jasa::where('kode_jasa', $kodeJasa)->first();
          $estimasi =0;
                  
          if($request->produk){
            $produk = produk::where('kode_produk',$kodeProduk)->first();
            $estimasi =+ $jasa->biaya + $produk->harga;
          }else{
            $estimasi =+ $jasa->biaya;
          }                    
          try {
            if ($request->produk===''||$request->produk) {
                Booking::create([
                    'id_user'=>Auth::user()->id,
                    'id_montir'=>$random,
                    'keluhan'=>$request->keluhan,
                    'estimasi_harga'=>$estimasi,
                    'booking_jam'=>$request->jam_booking,
                    'booking_tanggal'=>$request->tanggal_booking,
                    'status'=>'Pengerjaan',
                    'kode_jasa'=>$request->jasa,
                    'kode_produk'=>$request->produk
                ]);
            }else{
                Booking::create([
                    'id_user'=>Auth::user()->id,
                    'id_montir'=>$random,
                    'keluhan'=>$request->keluhan,
                    'estimasi_harga'=>$estimasi,
                    'booking_jam'=>$request->jam_booking,
                    'booking_tanggal'=>$request->tanggal_booking,
                    'status'=>'Pengerjaan',
                    'kode_jasa'=>$request->jasa,
                    'kode_produk' => null
                ]);
            }
            echo('berhasil');
          } catch (\Throwable $th) {
            echo($th) ;
          }
    }
}
