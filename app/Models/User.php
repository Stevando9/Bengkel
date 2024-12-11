<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'tipe',
        'no_plat',
        'nama_lengkap',
        'no_telpon'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function alamat()
    {
        return $this->hasOne(Alamat::class, 'id_user', 'id');
    }

    public function ulasan()
    {
        return $this->hasOne(Ulasan::class, 'id_user');
    }

    // Metode pembaruan data (tidak menerima Request)
    // public function updateProfile($data)
    // {
    //     if (!empty($data['password'])) {
    //         $this->password = Hash::make($data['password']);
    //     }
    //     $this->no_telpon = $data['phone'];
    //     $this->alamat()->updateOrCreate([], ['detail_alamat' => $data['address']]);
    //     $this->save();
    // }
}
