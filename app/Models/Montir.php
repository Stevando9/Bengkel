<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montir extends Model
{
    protected $table = 'montir';
    public $timestamps = false;
    protected $fillable = [
        'nama_montir',
        'pengalaman',
        'status',
    ];
}
