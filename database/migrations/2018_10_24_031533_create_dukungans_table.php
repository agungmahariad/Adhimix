<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDukungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dukungans', function (Blueprint $table) {
            $table->increments('id_dukungan');
            $table->integer('id_company');
            $table->string('nama_proyek');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('owner');
            $table->date('proyek_mulai');
            $table->date('proyek_akhir');
            $table->text('alamat');
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
        Schema::dropIfExists('dukungans');
    }
}
