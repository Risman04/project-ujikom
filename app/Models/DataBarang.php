<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    public $fillable = ['id','kode_barang', 'nama_barang', 'id_jenis_barang', 'jumlah_barang', 'id_satuan_barang'];

    public $timestamps = true;
}
