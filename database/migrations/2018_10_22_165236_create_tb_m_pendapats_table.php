<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMPendapatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_pendapats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('foto');
            $table->text('pendapat');
            $table->unsignedInteger('id_sosmed');
            $table->foreign('id_sosmed')->references('id')->on('tb_s_sosmeds')->onDelete('CASCADE');
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
        Schema::dropIfExists('tb_m_pendapats');
    }
}
