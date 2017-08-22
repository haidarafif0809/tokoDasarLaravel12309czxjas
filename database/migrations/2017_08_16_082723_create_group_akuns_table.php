<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_akuns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_group_akun')->unique();
            $table->string('nama_group_akun');
            $table->string('parent');
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
        Schema::dropIfExists('group_akuns');
    }
}
