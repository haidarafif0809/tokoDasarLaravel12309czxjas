<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
 
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_barang');
            $table->string('kode_barcode')->nullable();
            $table->string('nama_barang');
            $table->bigInteger('harga_beli');
            $table->bigInteger('harga_jual');
            $table->bigInteger('harga_jual2')->nullable();
            $table->bigInteger('harga_jual3')->nullable();
            $table->bigInteger('harga_jual4')->nullable();
            $table->bigInteger('harga_jual5')->nullable();
            $table->bigInteger('harga_jual6')->nullable();
            $table->bigInteger('harga_jual7')->nullable(); 
            $table->string('satuans_id');
            $table->string('kategori_barangs_id')->nullable(); 
            $table->string('status')->nullable();  
            $table->string('foto')->nullable();
            $table->bigInteger('limit_stok')->nullable();
            $table->bigInteger('over_stok')->nullable();   
            $table->string('golongan_barang')->nullable(); 
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
        Schema::dropIfExists('barangs');        
    }
}
