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
            $table->unsignedBigInteger('id_karyawan')->nullale();
            $table->foreign('id_karyawan')->references('id_user')->on('users');
            $table->unsignedBigInteger('id_pelanggan');
            $table->foreign('id_pelanggan')->references('id_user')->on('users');
            $table->unsignedBigInteger('kode_jenis_cuci');
            $table->foreign('kode_jenis_cuci')->references('kode_jenis_cuci')->on('jenis_cucis');
            $table->integer('jumlah');
            $table->date('tgl_pesanan');
            $table->date('tgl_pengambilan');
            $table->enum('status_cuci', ['menunggu', 'diproses', 'selesai'])->default('menunggu');
            $table->boolean('status_pembayaran')->default(false);
            $table->double('total_bayar');
            $table->double('bayar')->default(0);
            $table->double('kembali')->default(0);
            $table->string('keterangan', 35)->nullable();
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
