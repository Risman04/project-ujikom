<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    public $fillable = ['id_transaksi', 'tanggal_masuk', 'id_nama_barang', 'jumlah_barang'];

    public $timestamps = true;
}
