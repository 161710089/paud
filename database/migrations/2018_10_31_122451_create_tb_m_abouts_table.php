<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_abouts', function (Blueprint $table) {
            $table->increments('id');
            $table->text('about');
            $table->string('foto');
            $table->unsignedInteger('id_history_about');
            $table->foreign('id_history_about')->references('id')->on('tb_m_history_abouts')->onDelete('CASCADE');
            
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
        Schema::dropIfExists('tb_m_abouts');
    }
}
