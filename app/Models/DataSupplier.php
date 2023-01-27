<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSupplier extends Model
{
    use HasFactory;
    public $fillable = ['kode_supplier', 'nama_supplier', 'alamat', 'telepon'];

    public $timestamps = true;
}
