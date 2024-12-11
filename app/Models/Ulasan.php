<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';
    protected $fillable = ['isiPesan', 'rating', 'id_user'];

    // relasi user dan model
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user')->withDefault([
            'nama_lengkap' => 'Anonim',
            'foto' => 'default.jpg',
        ]);
    }
}
