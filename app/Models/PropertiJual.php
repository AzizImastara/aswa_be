<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertiJual extends Model
{
    use HasFactory;

    protected $table = 'properti_jual';

    protected $primaryKey = 'id_jual';

    public $timestamps = false;

    protected $fillable = ['id_kategori', 'id_user', 'judul', 'no_telepon', 'harga', 'lokasi', 'kamar_tidur', 'kamar_mandi', 'gambar', 'deskripsi'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}
