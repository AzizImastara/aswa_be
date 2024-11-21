<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    public $timestamps = false;
    protected $fillable = ['nama'];
    public function properti()
    {
        return $this->hasMany(Properti::class, 'id_kategori', 'id_kategori');
    }

    public function propertiJual()
    {
        return $this->hasMany(PropertiJual::class, 'id_kategori', 'id_kategori');
    }
}
