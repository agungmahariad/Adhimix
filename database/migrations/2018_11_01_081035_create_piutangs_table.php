<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiutangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('piutangs', function (Blueprint $table) {
            $table->increments('id_credit_list');
            $table->integer('id_proyek');
            $table->string('nama_proyek');
            $table->string('no_inv');
            $table->string('no_faktur');
            $table->date('tanggal_inv');
            $table->string('dpp_ppn');
            $table->integer('total_terbayar');
            $table->date('tanggal_terakhir_bayar');
            $table->date('tanggal_terakhir_update');
            $table->integer('sisa_kredit');
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
        Schema::dropIfExists('piutangs');
    }
}
