<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_siswas', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nama_lengkap');
            $table->string('jenis_kelamin');
            $table->string('ttl');
            $table->integer('nik')->unique();
            $table->string('nama_panggilan')->nullable();
            $table->string('nama_jalan')->nullable();
            $table->string('nama_desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('agama')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('jumlah_saudara_kandung')->nullable();
            $table->string('jumlah_saudara_tiri')->nullable();
            $table->string('jumlah_saudara_angkat')->nullable();
            $table->string('status_yatim')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('penyakit')->nullable();
            $table->string('imunisasi')->nullable();
            $table->string('ciri_ciri')->nullable();
            $table->string('tinggi_berat_badan')->nullable();
            $table->string('jarak_rumah')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedInteger('id_ortu')->nullable();
            $table->foreign('id_ortu')
                  ->references('id')
                  ->on('tb_m_ortus')
                  ->onDelete('CASCADE');
         
            $table->unsignedInteger('id_user')->nullable();
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
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
        Schema::dropIfExists('tb_m_siswas');
    }
}
