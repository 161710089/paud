<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMPengajarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_pengajars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('ttl');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('pendidikan');
            $table->string('alamat_no_telepon');
            $table->string('foto');
           
            $table->unsignedInteger('id_mapel');
            $table->foreign('id_mapel')
                  ->references('id')
                  ->on('tb_m_mata_pelajarans')
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
        Schema::dropIfExists('tb_m_pengajars');
    }
}
