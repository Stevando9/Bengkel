<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $primaryKey = 'kode_pembayaran';
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'transaksi';
    protected $fillable = [
        'kode_pembayaran',
        'totalHarga',
        'metode_pembayaran',
        'id_user',
    ];    

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
