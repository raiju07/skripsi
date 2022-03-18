<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLamaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lamaran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('pelamar_id');
            $table->integer('lowongan_id');
            $table->integer('nilai_ujian')->default(0);
            $table->integer('nilai_wawancara')->default(0);
            $table->enum('status', ['daftar','proses', 'lulus', 'gagal']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lamaran');
    }
}
