<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    public $fillable = ['id_barang', 'nama_barang', 'jenis_barang', 'jumlah_barang', 'satuan'];

    public $timestamps = true;

    public function jenisbarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_barang');
    }

    public function satuanbarang()
    {
        return $this->belongsTo(SatuanBarang::class, 'id_barang');
    }

}
