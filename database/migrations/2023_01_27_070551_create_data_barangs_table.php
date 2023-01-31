<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->unsignedBigInteger('id_jenis_barang');
            $table->unsignedBigInteger('id_jumlah_barang');
            $table->unsignedBigInteger('id_satuan_barang');
            
            $table->foreign('id_jenis_barang')->references('id')->on('jenis_barangs')
            ->onDelete('cascade');
            $table->foreign('id_satuan_barang')->references('id')->on('satuan_barangs')
            ->onDelete('cascade');
            $table->foreign('id_jumlah_barang')->references('id')->on('barang_masuks')
            ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data_barangs');
    }
};
