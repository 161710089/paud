<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->unique();
            $table->datetime('waktu');
            $table->datetime('waktu_selesai');            
            $table->string('foto');
            $table->string('alamat');
            $table->string('ruangan');
            $table->text('deskripsi');
            $table->string('slug');
            $table->unsignedInteger('id_pengajar');
            $table->foreign('id_pengajar')->references('id')->on('tb_m_pengajars')->onDelete('CASCADE');
         
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
        Schema::dropIfExists('tb_m_events');
    }
}
