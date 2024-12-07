<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    public $timestamps = false;
    protected $fillable = [
        'kode_produk',
        'jumlah',
        'estimasi_harga',
        'user_id'
    ];

    public function produk()
    {
        return $this->belongsTo(produk::class, 'kode_produk', 'kode_produk');
    }
}
