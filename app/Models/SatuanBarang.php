<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SatuanBarang extends Model
{
    use HasFactory;
    public $fillable = ['satuan_barang'];

    public $timestamps = true;

    public function databarang()
    {
        return $this->hasOne(DataBarang::class, 'id_barang');
    }
}
