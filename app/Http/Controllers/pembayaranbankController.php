<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pembayaranbankController extends Controller
{

    public function pembayaranBank(Request $request)
    {
        $validBanks = ['bca', 'mandiri', 'bri'];
        // Ambil nama bank dari query string
        $bank = $request->query('bank', 'bca'); // Default ke BCA jika tidak ada parameter
        if (!in_array($bank, $validBanks)) {
            abort(404, "Metode pembayaran tidak valid");
        }
        return view('pembayaranbank', ['bank' => $bank]);
    }
}
