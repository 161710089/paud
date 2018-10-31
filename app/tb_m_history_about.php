<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_history_about extends Model
{
 protected $table = 'tb_m_history_abouts';
protected $fillable = array('fotohistory','history');
public $timestamp = true;

public function tb_m_about() {
		return $this->hasMany('App\tb_m_about', 'id_about');
	}
	public function tb_m_history_about_pencapaian() {
		return $this->hasMany('App\tb_m_history_about_pencapaian', 'id_about');
	}
}
