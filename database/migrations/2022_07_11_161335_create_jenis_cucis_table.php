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
        Schema::create('jenis_cucis', function (Blueprint $table) {
            $table->id('kode_jenis_cuci');
            $table->string('nama', 35);
            $table->float('harga');
            $table->enum('satuan', ['kg', 'pcs']);
            $table->integer('hari');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jenis_cucis');
    }
};
