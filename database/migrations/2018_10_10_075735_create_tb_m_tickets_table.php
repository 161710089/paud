<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_event');
            $table->foreign('id_event')
                  ->references('id')
                  ->on('tb_m_events')
                  ->onDelete('CASCADE');
            $table->integer('jumlah_tiket_tersedia')->unsigned();
            $table->double('harga',15,2);
            $table->date('tersedia_tanggal');
            $table->date('sampai_tanggal');
            $table->integer('tiket_terpesan')->unsigned()->nullable();
            
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
        Schema::dropIfExists('tb_m_tickets');
    }
}
