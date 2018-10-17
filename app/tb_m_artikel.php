<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_artikel extends Model
{
protected $table = 'tb_m_artikels';
protected $fillable = array('judul','foto','deskripsi','slug','pengdit','id_kategori_artikel','id_user');
public $timestamp = true;

public function User() {
	return $this->belongsTo('App\User', 'id_user');
	}

public function tb_m_kategori_artikel() {
		return $this->belongsTo('App\tb_m_kategori_artikel', 'id_kategori_artikel');
	}
public function getRouteKeyName()
{
	return 'slug';
}

}
