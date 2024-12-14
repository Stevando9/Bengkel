<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'no_pembelian';
    protected $table = 'pembelian';
    protected $fillable = [
        'id_user',
        'kode_produk',
        'alamat_tujuan',
        'no_telp',
        'penerima',
        'jumlah'
    ];
}
