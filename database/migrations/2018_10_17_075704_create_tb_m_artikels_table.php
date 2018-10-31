<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMArtikelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_artikels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('judul')->unique();
            $table->string('foto');
            $table->text('deskripsi');
            $table->string('slug');
            $table->unsignedInteger('id_kategori_artikel');
            $table->string('pengedit')->nullable();
            $table->unsignedInteger('id_user');
            
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('CASCADE');
            
            $table->foreign('id_kategori_artikel')
                  ->references('id')
                  ->on('tb_m_kategori_artikels')
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
        Schema::dropIfExists('tb_m_artikels');
    }
}
