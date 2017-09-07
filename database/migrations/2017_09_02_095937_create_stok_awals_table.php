<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStokAwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_awals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nomor_faktur');
            $table->integer('id_produk');
            $table->integer('jumlah_produk');
            $table->string('keterangan')->nullable();
            $table->string('user_buat');
            $table->string('user_edit')->nullable();           
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
        Schema::dropIfExists('stok_awals');
    }
}
