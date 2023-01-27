<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;
    public $fillable = ['jenis_barang'];

    public $timestamps = true;

    public function databarang()
    {
        return $this->hasOne(DataBarang::class, 'id_jenis');
    }

}
