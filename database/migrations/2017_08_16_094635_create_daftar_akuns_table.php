<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_akuns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_daftar_akun')->unique();
            $table->string('nama_daftar_akun');
            $table->string('group_akun');
            $table->string('kategori_akun');
            $table->string('tipe_akun');
            $table->string('user_buat')->nullable();
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
        Schema::dropIfExists('daftar_akuns');
    }
}
