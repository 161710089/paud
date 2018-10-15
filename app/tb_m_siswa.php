<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_siswa extends Model
{
       protected $table = 'tb_m_siswas';
protected $fillable = array('nama_lengkap','nama_panggilan','jenis_kelamin','ttl','nik','nama_jalan','nama_desa','							kecamatan','kabupaten','provinsi','agama','kewarganegaraan','anak_ke','
							jumlah_saudara_kandung','jumlah_saudara_tiri','jumlah_saudara_angkat','status_yatim','
							bahasa','golongan_darah','penyakit','imunisasi','ciri_ciri','tinggi_berat_badan','
							jarak_rumah','id_user','id_ortu');
public $timestamp = true;

protected $searchable = [
        'columns' => [
            'tb_m_siswas.nama_lengkap' => 10,
            'tb_m_siswas.nama_panggilan' => 5,
            'tb_m_siswas.nik' => 3,
        ]
    ];


public function tb_m_ortu() {
		return $this->belongsTo('App\tb_m_ortu', 'id_ortu');
	                       }
public function user() {
        return $this->belongsTo('App\user', 'id_user');
                            }
public function tb_m_absensi() {
        return $this->hasMany('App\tb_m_absensi', 'id_absensi');
    }

}
