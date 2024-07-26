<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UserSekolah extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user_sekolah';
    protected $fillable = [
        'nama_sekolah', 
        'email', 
        'password', 
        'no_hp', 
        'alamat', 
        'kepala_sekolah', 
        'jenjang_sekolah', 
        'logo', 
        'gambar_kepala_sekolah'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function sekolahImages()
    {
        return $this->hasMany(SekolahImage::class, 'sekolahid');
    }
}
