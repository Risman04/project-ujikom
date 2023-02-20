<?php

namespace App\Models;

use App\Models\SatuanBarang;
use App\Models\DataBarang;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;

class BarangKeluar extends Model
{
    use HasFactory;
    public $fillable = ['id_transaksi', 'tanggal_keluar', 'id_data_barang', 'id_supplier', 'jumlah_barang', 'id_satuan_barang', 'alamat'];

    public $timestamps = true;

    public function DataBarang2()
    {
        return $this->belongsTo(DataBarang::class, 'id_data_barang');
    }


    public function SatuanBarang()
    {
        return $this->belongsTo(SatuanBarang::class, 'id_satuan_barang');
    }

    public static function kode()
    {
        $kode = DB::table('barang_masuks')->max('id_transaksi');
        $addNol = '';
        $kode = str_replace("TRK-", "", $kode);
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

        $kodeBaru = "TRK-".$addNol.$incrementKode;
        return $kodeBaru;
    }
}
