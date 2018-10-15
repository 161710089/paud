<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_mata_pelajaran extends Model
{
     protected $table = 'tb_m_mata_pelajarans';
protected $fillable = array('nama_mata_pelajaran');
public $timestamp = true;

public function pengajar() {
		return $this->hasMany('App\pengajar', 'id_pengajar');
	}
}
