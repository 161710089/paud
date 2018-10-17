<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_kategori_gallery extends Model
{
     protected $table = 'tb_m_kategori_galleries';
	 protected $fillable = array('kategori');
	 public $timestamp = true;

	public function tb_m_gallery() {
		return $this->hasMany('App\tb_m_gallery', 'id_gallery');
	}
}
//tambah