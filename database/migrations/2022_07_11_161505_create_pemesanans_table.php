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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('no_pemesanan');
            $table->unsignedBigInteger('id_karyawan');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans');
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggans');
            $table->unsignedBigInteger('kode_jenis_cuci');
            $table->foreign('kode_jenis_cuci')->references('kode_jenis_cuci')->on('jenis_cucis');
            $table->integer('jumlah');
            $table->date('tgl_pesanan');
            $table->date('tgl_pengambilan');
            $table->enum('status_cuci', ['menunggu', 'diproses', 'selesai']);
            $table->boolean('status_pembayaran');
            $table->text('keterangan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
};
