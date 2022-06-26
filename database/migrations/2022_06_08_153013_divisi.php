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
        Schema::create('divisi', function (Blueprint $table) {
            $table->id('id_divisi');
            $table->integer('id_kegiatan');
            $table->string('nama_divisi');
            $table->integer('id_user', 0);
            $table->integer('progress', 0);
            $table->integer('status_pic',0);
           // $table->timestamps(now());
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
