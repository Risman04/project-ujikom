<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use DB;


class DataSupplier extends Model
{
    use HasFactory;
    public $fillable = ['kode_supplier', 'nama_supplier', 'alamat', 'telepon'];

    public $timestamps = true;

    public function BarangMasuk()
    {
        return $this->hasMany(BarangMasuk::class, 'id_supplier');
    }

    public static function kode()
    {
        $kode = DB::table('data_suppliers')->max('kode_supplier');
        $addNol = '';
        $kode = str_replace("SUP-", "", $kode);
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

        $kodeBaru = "SUP-".$addNol.$incrementKode;
        return $kodeBaru;
    }

}
