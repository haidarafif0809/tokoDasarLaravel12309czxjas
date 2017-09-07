<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hpp', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_faktur');
            $table->string('no_faktur_hpp_masuk')->nullable();
            $table->string('no_faktur_hpp_keluar')->nullable();
            $table->string('kode_barang');
            $table->string('jenis_transaksi');
            $table->integer('jumlah_kuantitas');
            $table->integer('sisa_harga');
            $table->integer('harga_unit');
            $table->integer('total_nilai');
            $table->integer('jenis_hpp');
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
        Schema::dropIfExists('hpp');
    }
}
