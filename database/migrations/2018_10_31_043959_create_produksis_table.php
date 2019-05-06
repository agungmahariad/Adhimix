<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksis', function (Blueprint $table) {
            $table->increments('id_proyek');
            $table->string('nama_proyek');
            $table->string('alamat_proyek');
            $table->string('nama_owner');
            $table->date('tanggal_mulai');
            $table->date('tanggal_akhir');
            $table->integer('vol_kontrak');
            $table->integer('terkirim');
            $table->integer('tersisa');
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
        Schema::dropIfExists('produksis');
    }
}
