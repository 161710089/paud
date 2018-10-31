<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_ortu extends Model
{
     protected $table = 'tb_m_ortus';
protected $fillable = array('nama_ayah','tempat_lahir_ayah','tanggal_lahir_ayah','agama_ayah','kewarganegaraan_ayah','pendidikan_ayah','pekerjaan_ayah','penghasilan_ayah','alamat_no_telepon_ayah','nama_ibu','tanggal_lahir_ibu','tempat_lahir_ibu','agama_ibu','kewarganegaraan_ibu','pendidikan_ibu','pekerjaan_ibu','penghasilan_ibu'
	,'alamat_no_telepon_ibu','nama_wali','temapat_lahir_wali','tanggal_lahir_wali','agama_wali','kewarganegaraan_wali','pendidikan_wali','pekerjaan_wali',
	'penghasilan_wali','alamat_no_telepon_wali');
protected $guarded = array('nama_ayah','tempat_lahir_ayah','tanggal_lahir_ayah','agama_ayah','kewarganegaraan_ayah','pendidikan_ayah','pekerjaan_ayah','penghasilan_ayah','alamat_no_telepon_ayah','nama_ibu','tanggal_lahir_ibu','tempat_lahir_ibu','agama_ibu','kewarganegaraan_ibu','pendidikan_ibu','pekerjaan_ibu','penghasilan_ibu','alamat_no_telepon_ibu',
	'nama_wali','temapat_lahir_wali','tanggal_lahir_wali','agama_wali','kewarganegaraan_wali','pendidikan_wali','pekerjaan_wali',
	'penghasilan_wali','alamat_no_telepon_wali');
public $timestamp = true;

public function tb_m_siswa() {
		return $this->hasMany('App\tb_m_siswa', 'id_siswa');
	}
}
