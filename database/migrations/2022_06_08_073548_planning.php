<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planning', function (Blueprint $table) {
            $table->increments('id_planning');
            $table->integer('id_kegiatan');
            $table->string('latar_belakang_kegiatan');
            $table->string('deskripsi_kegiatan');
            $table->string('tujuan_kegiatan');
            $table->string('sasaran_kegiatan');
            $table->string('tempat_kegiatan');
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
        //
    }
};
