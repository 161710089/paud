<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSSekolahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_s_sekolahs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_sekolah');
            $table->string('logo');
            $table->string('alamat');
            $table->string('waktu_buka');
            $table->string('hari_buka');
            $table->string('no_telepon');
            $table->unsignedInteger('id_sosmed');
            $table->foreign('id_sosmed')->references('id')->on('tb_s_sosmeds')->onDelete('CASCADE');
            $table->unsignedInteger('id_map');
            $table->foreign('id_map')->references('id')->on('tb_s_maps')->onDelete('CASCADE');
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
        Schema::dropIfExists('tb_s_sekolahs');
    }
}
