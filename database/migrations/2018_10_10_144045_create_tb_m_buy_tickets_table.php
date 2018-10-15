<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMBuyTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_buy_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_event')->unsigned()->index();
            $table->foreign('id_event')->references('id')->on('tb_m_events')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('id_user')->unsigned()->index();
            $table->foreign('id_user')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->boolean('is_returned')->default(false);
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
        Schema::dropIfExists('tb_m_buy_tickets');
    }
}
