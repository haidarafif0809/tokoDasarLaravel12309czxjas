<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJurnalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurnals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_jurnal');
            $table->string('keterangan_jurnal');
            $table->integer('id_akun_jurnal');
            $table->decimal('debit', 65, 2)->default(0);
            $table->decimal('kredit', 65, 2)->default(0);
            $table->string('jenis_transaksi');
            $table->string('no_faktur');
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
        Schema::dropIfExists('jurnals');
    }
}
