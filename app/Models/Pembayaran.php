<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $primaryKey = 'no_pembelian';
    public $timestamps = false;
    protected $table = 'pembelian';
    protected $fillable = [
        'id_user',
        'kode_produk',
        'alamat_tujuan',
        'no_telp',
        'penerima',
        'jumlah',
        'totalHarga'
    ];

    public function produk()
    {
        return $this->belongsTo(produk::class, 'kode_produk', 'kode_produk');
    }

    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'Jasa', 'kode_jasa');
    }
    
}
