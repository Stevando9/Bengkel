<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    protected $primaryKey = 'no_plat';
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'motor';
    protected $fillable = [
        'no_plat',
        'merk_motor',
        'id_user'
    ];
}
