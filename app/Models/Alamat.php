<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamat';

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
        return $this->hasOne(User::class);
    }
}
