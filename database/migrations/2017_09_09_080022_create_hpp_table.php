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
            $table->integer('id_barang');
            $table->string('jenis_transaksi');
            $table->decimal('jumlah_kuantitas');
            $table->decimal('harga_unit');
            $table->decimal('total_nilai');
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