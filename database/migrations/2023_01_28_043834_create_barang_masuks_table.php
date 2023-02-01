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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('id_transaksi');
            $table->date('tanggal_masuk');
            $table->unsignedBigInteger('id_data_barang');
            $table->string('pengirim');
            $table->integer('jumlah_barang');
            $table->unsignedBigInteger('id_satuan_barang');
            
            $table->foreign('id_satuan_barang')->references('id')->on('satuan_barangs')
            ->onDelete('cascade');
            $table->foreign('id_data_barang')->references('id')->on('data_barangs')
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
        Schema::dropIfExists('barang_masuks');
    }
};
