<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    protected $primaryKey = 'kode_produk';
    public $incrementing = false;
    protected $table = 'produk';
    protected $fillable = [
        'kode_produk',
        'nama_produk',
        'kategori_id',
        'stok',
        'harga',        
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }
}
