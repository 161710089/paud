<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMAbsensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_absensis', function (Blueprint $table) {
            $table->increments('id');
           $table->unsignedInteger('id_pengajar')->nullable();
            $table->foreign('id_pengajar')
                  ->references('id')
                  ->on('tb_m_pengajars')
                  ->onDelete('CASCADE');
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_akhir');
            $table->time('selisih_jam');
                        

            $table->unsignedInteger('id_siswa');
            $table->foreign('id_siswa')
                  ->references('id')
                  ->on('tb_m_siswas')
                  ->onDelete('CASCADE');
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
        Schema::dropIfExists('tb_m_absensis');
    }
}
