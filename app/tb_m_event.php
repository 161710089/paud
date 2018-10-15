<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_event extends Model
{
protected $table = 'tb_m_events';
protected $fillable = array('judul','waktu','waktu_selesai','foto','alamat','deskripsi','slug','id_pengajar');
public $timestamp = true;

	public function tb_m_pengajar() {
	return $this->belongsTo('App\tb_m_pengajar', 'id_pengajar');
	}
	
	public function tb_m_ticket() {
		return $this->hasMany('App\tb_m_ticket','id_event');
	}
	
	public function getRouteKeyName()
	{
	return 'slug';
	}

}
