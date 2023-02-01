<?php

namespace App\Models;

use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Models\BarangMasuk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    public $fillable = ['kode_barang', 'nama_barang', 'id_jenis_barang', 'id_satuan_barang', 'id_jumlah_barang'];

    public $timestamps = true;

    public function JenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis_barang');
    }
    
    public function SatuanBarang()
    {
        return $this->belongsTo(SatuanBarang::class, 'id_satuan_barang');
    }

    public function BarangMasuk()
    {
        return $this->belongsTo(BarangMasuk::class, 'id_jumlah_barang');
    }

    public function BarangMasuk2()
    {
        return $this->hasMany(BarangMasuk::class, 'id_data_barang');
    }

}
