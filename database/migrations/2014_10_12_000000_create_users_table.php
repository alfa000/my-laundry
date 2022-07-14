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
        // Schema::create('karyawans', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama');
        //     $table->string('username');
        //     $table->string('password');
        //     $table->enum('peran', ['manajer', 'kasir']);
        //     $table->string('no_hp', 13);
        //     $table->text('alamat');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
