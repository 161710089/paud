<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_artikel extends Model
{
protected $table = 'tb_m_artikels';
protected $fillable = array('judul','foto','deskripsi','slug','id_user');
public $timestamp = true;

public function User() {
	return $this->belongsTo('App\User', 'id_user');
	}

public function getRouteKeyName()
{
	return 'slug';
}

}
