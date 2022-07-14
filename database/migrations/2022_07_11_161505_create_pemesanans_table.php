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
            $table->id();
            $table->unsignedBigInteger('karyawan_id');
            $table->foreign('karyawan_id')->references('id')->on('karyawans')->onDelete('cascade');
            $table->unsignedBigInteger('pelanggan_id');
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('cascade');
            $table->unsignedBigInteger('jenis_cuci_id');
            $table->foreign('jenis_cuci_id')->references('id')->on('jenis_cucis')->onDelete('cascade');
            $table->integer('jumlah');
            $table->date('tgl_pesanan');
            $table->date('tgl_pengambilan');
            $table->enum('status_cuci', ['menunggu', 'proses', 'selesai']);
            $table->boolean('status_pembayaran');
            $table->text('keterangan');
            // $table->timestamps();
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
