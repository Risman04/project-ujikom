<?php

namespace App\Models;
use App\Models\SatuanBarang;
use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    public $fillable = ['id_transaksi', 'tanggal_masuk','id_kode_barang', 'id_nama_barang', 'pengirim', 'jumlah_barang', 'id_satuan_barang'];

    public $timestamps = true;

    public function DataBarang()
    {
        return $this->hasMany(DataBarang::class, 'id_jumlah_barang');
    }

    public function DataBarangKode()
    {
        return $this->belongsTo(DataBarang::class, 'id_kode_barang');
    }

    public function DataBarangNama()
    {
        return $this->belongsTo(DataBarang::class, 'id_nama_barang');
    }

    public function SatuanBarang()
    {
        return $this->belongsTo(SatuanBarang::class, 'id_satuan_barang');
    }
}
