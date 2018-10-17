<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_kategori_artikel extends Model
{
     protected $table = 'tb_m_kategori_artikels';
	 protected $fillable = array('kategori');
	 public $timestamp = true;

	public function tb_m_artikel() {
		return $this->hasMany('App\tb_m_artikel', 'id_kategori_artikel');
	}

public function getRouteKeyName()
	{
	return 'slug';
	}
}
