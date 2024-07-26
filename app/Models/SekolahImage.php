<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SekolahImage extends Model
{
    use HasFactory;

    protected $table = 'sekolah_images';
    protected $fillable = ['sekolahid', 'gambar'];
}
