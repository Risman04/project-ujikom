<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    public $fillable = ['kode_barang', 'nama_barang', 'jenis_barang', 'jumlah_barang', 'satuan'];

    public $timestamps = true;
}
