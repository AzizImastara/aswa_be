<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Properti extends Model
{
    use HasFactory;

    protected $table = 'properti';

    protected $primaryKey = 'id_properti';

    public $timestamps = false;

    protected $fillable = ['id_kategori', 'gambar', 'judul', 'harga', 'lokasi', 'kamar_tidur', 'kamar_mandi', 'deskripsi'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }
}
