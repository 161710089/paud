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
            $table->integer('id_ticket')->unsigned()->index();
            $table->foreign('id_ticket')->references('id')->on('tb_m_tickets')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')
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
