<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamat';
    protected $primaryKey = 'alamat_id'; // Primary key tabel
    public $incrementing = true; // Jika `alamat_id` adalah auto-increment

    protected $fillable = [
        'alamat_id',
        'id_user',
        'keluarahan',
        'kabupaten',
        'provinsi',
        'detail_alamat'
    ];
    // Relasi: Alamat belongs to User
    public function user()
    {
        return $this->hasOne(User::class, 'id_user', 'id');
    }
}
