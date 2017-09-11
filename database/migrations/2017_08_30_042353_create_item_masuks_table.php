<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_faktur');
            $table->string('keterangan');
            $table->decimal('total', 65, 2);
            $table->string('user_buat');
            $table->string('user_edit');
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
        Schema::dropIfExists('item_masuks');
    }
}
