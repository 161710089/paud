<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMOrtusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_ortus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_ayah')->nullable();
            $table->string('ttl_ayah')->nullable();
            $table->string('agama_ayah')->nullable();
            $table->string('kewarganegaraan_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('alamat_no_telepon_ayah')->nullable();
           
            $table->string('nama_ibu')->nullable();
            $table->string('ttl_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('kewarganegaraan_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('alamat_no_telepon_ibu')->nullable();
           
            $table->string('nama_wali')->nullable();
            $table->string('ttl_wali')->nullable();
            $table->string('agama_wali')->nullable();
            $table->string('kewarganegaraan_wali')->nullable();
            $table->string('pendidikan_wali')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('penghasilan_wali')->nullable();
            $table->string('alamat_no_telepon_wali')->nullable();
            
           //  $table->UnsignedInteger('nik');
           // $table->primary(['id','nik']);
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
        Schema::dropIfExists('tb_m_ortus');
    }
}
