<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbSSosmedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_s_sosmeds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Facebook')->nullable();
            $table->string('Instagram')->nullable();
            $table->string('Twitter')->nullable();
            $table->string('Pinterest')->nullable();
            $table->string('Email')->nullable();
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
        Schema::dropIfExists('tb_s_sosmeds');
    }
}
