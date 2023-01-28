<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;
    public $fillable = ['nama_jenis_barang'];

    public $timestamps = true;

    public function DataBarang()
    {
        return $this->hasMany(DataBarang::class, 'id_jenis_barang');
    }

}
