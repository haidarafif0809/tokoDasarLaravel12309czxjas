<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pelanggan')->unique();
            $table->string('nama_pelanggan');
            $table->string('no_telpon'); 
            $table->string('tanggal_lahir');
            $table->string('alamat');
            $table->string('level_harga')->default(1);;
            $table->integer('default_pelanggan')->default(0);
            $table->integer('flafon')->default(0);
            $table->integer('flafon_usia')->default(0);
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
        Schema::dropIfExists('pelanggans');
    }
}
