<?php

namespace App\Models;

use App\Models\JenisBarang;
use App\Models\SatuanBarang;
use App\Models\BarangMasuk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

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

    public function BarangMasuk2()
    {
        return $this->hasMany(BarangMasuk::class, 'id_data_barang');
    }
    public function BarangKeluar()
    {
        return $this->hasMany(BarangKeluar::class, 'id_data_barang');
    }


    public static function kode()
    {
        $kode = DB::table('data_barangs')->max('kode_barang');
        $addNol = '';
        $kode = str_replace("BRG-", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1)
        {
            $addNol = "000";
        }
        else if (strlen($kode) == 2)
        {
            $addNol = "00";
        }
        else if (strlen($kode) == 3)
        {
            $addNol = "0";
        }

        $kodeBaru = "BRG-".$addNol.$incrementKode;
        return $kodeBaru;
    }

}

