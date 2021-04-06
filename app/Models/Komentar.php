<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    use HasFactory;

    protected $fillable = ['berita_id', 'nama_user', 'email_user', 'komentar_user', 'komentar_admin'];

    public function berita(){
        return $this->belongsTo(Berita::class, 'berita_id', 'id');
    }
}
