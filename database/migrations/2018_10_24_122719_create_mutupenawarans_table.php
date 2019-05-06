<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutupenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mutupenawarans', function (Blueprint $table) {
            $table->increments('id_mutu_penawaran');
            $table->integer('id_proyek');
            $table->string('id_mutu');
            $table->string('slump');
            $table->string('spec');
            $table->string('vol');
            $table->string('harga');
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
        Schema::dropIfExists('mutupenawarans');
    }
}
