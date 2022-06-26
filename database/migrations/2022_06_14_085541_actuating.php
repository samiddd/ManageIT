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
        Schema::create('actuating', function (Blueprint $table) {
            $table->id('id_actuating');
            $table->integer('id_kegiatan');
            $table->string('nama_tugas');
            $table->string('id_prioritas')->nullable();
            $table->date('tanggal_tugas')->nullable();
            $table->time('waktu_tugas')->nullable();
           // $table->timestamps('created_at');
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
