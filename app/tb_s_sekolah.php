<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_s_sekolah extends Model
{
    protected $table = 'tb_s_sekolahs';
	protected $fillable = array('logo','nama_sekolah','alamat','no_telepon','waktu_buka','hari_buka','id_sosmed','id_map');
public $timestamp = false;

public function tb_s_sosmed() {
		return $this->belongsTo('App\tb_s_sosmed', 'id_sosmed');
	}
public function tb_s_map() {
		return $this->belongsTo('App\tb_s_map', 'id_map');
	}
}
