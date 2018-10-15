<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class tb_m_absensi extends Model
{

    protected $table = 'tb_m_absensis';
protected $fillable = array('tanggal');
public $timestamp = true;

public function tb_m_siswa() {
		return $this->belongsTo('App\tb_m_siswa', 'id_siswa');
	}
public function tb_m_pengajar() {
		return $this->belongsTo('App\tb_m_pengajar', 'id_pengajar');
	}


}
