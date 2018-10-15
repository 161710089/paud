<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul');
            $table->string('foto');
            $table->unsignedInteger('id_kategori_gallery');
            $table->foreign('id_kategori_gallery')->references('id')->on('tb_m_kategori_galleries')->onDelete('CASCADE');
            
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
        Schema::dropIfExists('tb_m_galleries');
    }
}
