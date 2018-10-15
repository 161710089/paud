<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_s_map extends Model
{
    protected $table = 'tb_s_maps';
	protected $fillable = array('garis_lintang','garis_bujur');
	public $timestamp = false;

	public function tb_s_sekolah() {
		return $this->hasMany('App\tb_s_sekolah', 'id_sekolah');
	}
}
