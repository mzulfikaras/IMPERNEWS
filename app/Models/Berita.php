<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'author', 'kategori_id', 'gambar', 'isi_berita'];

    public function kategori(){
        return $this->belongsTo(KategoriBerita::class, 'kategori_id', 'id');
    }

    public function komentar(){
        return $this->hasMany(Komentar::class, 'berita_id', 'id');
    }
}
