<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawarans', function (Blueprint $table) {
            $table->increments('id_penawaran');
            $table->integer('id_company');
            $table->string('nama_proyek');
            $table->string('owner');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('mulai_proyek');
            $table->string('akhir_proyek');
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
        Schema::dropIfExists('penawarans');
    }
}
