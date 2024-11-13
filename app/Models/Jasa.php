<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $primaryKey = 'kode_jasa';
    public $incrementing = false;
    protected $table = 'jasa';
    protected $fillable = [
        'kode_jasa',
        'nama_jasa',
        'biaya',
    ];
}
