<?php

namespace App\Models;

use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    public $fillable = ['kode_barang', 'nama_barang', 'id_jenis_barang', 'jumlah_barang', 'id_satuan_barang'];

    public $timestamps = true;

    public function JenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang');
    }
    
    public function SatuanBarang()
    {
        return $this->belongsTo(SatuanBarang::class, 'id_satuan_barang');
    }
}
