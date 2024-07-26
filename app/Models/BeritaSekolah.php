<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaSekolah extends Model
{
    use HasFactory;

    protected $table = 'berita_sekolah';
    protected $fillable = ['sekolahid', 'title', 'deskripsi', 'isi'];

    public function images()
    {
        return $this->hasMany(BeritaImage::class, 'beritaid');
    }
}
