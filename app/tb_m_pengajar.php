<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_pengajar extends Model
{
    protected $table = 'tb_m_pengajars';
protected $fillable = array('nama','jenis_kelamin','tempat_lahir','tanggal_lahir','agama','kewarganegaraan','pendidikan','alamat_no_telepon','foto','id_mapel');
public $timestamp = true;

public function tb_m_mata_pelajaran() {
		return $this->belongsTo('App\tb_m_mata_pelajaran', 'id_mapel');
	}
public function tb_m_absensi() {
        return $this->hasMany('App\tb_m_absensi', 'id_absensi');
    }
public function tb_m_event()
{
  // Setiap user akan memiliki banyak tb_m_event
  return $this->hasMany('App\tb_m_event','id_pengajar');
}

}
