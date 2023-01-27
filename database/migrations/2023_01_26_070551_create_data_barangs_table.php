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
            $table->unsignedBigInteger('id_barang');
            $table->string('nama_barang');
            $table->string('jenis_barang');
            $table->integer('jumlah_barang');
            $table->string('satuan');
            $table->timestamps();

            $table->foreign('id_barang')->references('id')->on('jenisbarangs')
                ->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('satuanbarangs')
                ->onDelete('cascade');
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
