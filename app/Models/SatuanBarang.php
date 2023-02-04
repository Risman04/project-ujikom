<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;
    public $fillable = ['nama_satuan_barang'];

    public $timestamps = true;

    public function DataBarang()
    {
        return $this->hasMany(DataBarang::class, 'id_satuan_barang');
    }

    public function BarangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_satuan_barang');
    }
}
