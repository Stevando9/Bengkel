<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = [
        'id_user',
        'id_montir',
        'keluhan',
        'estimasi_harga',
        'booking_jam',
        'booking_tanggal',
        'status',
        'kode_jasa',
        'kode_produk'
    ];
}
