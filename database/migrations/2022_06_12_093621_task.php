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
        Schema::create('tugas', function (Blueprint $table) {
            $table->id('id_tugas');
            $table->integer('id_divisi');
            $table->string('nama_tugas');
            $table->string('id_prioritas')->nullable();
            $table->integer('id_user')->nullable();
            $table->date('tanggal_tugas')->nullable();
            $table->time('waktu_tugas')->nullable();
            $table->boolean('status');
            $table->integer('id_kegiatan');
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
