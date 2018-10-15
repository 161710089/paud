<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_gallery extends Model
{
     protected $table = 'tb_m_galleries';
	 protected $fillable = array('judul','foto','id_kategori_gallery');
	 public $timestamp = true;

	 public function tb_m_kategori_gallery() {
		return $this->belongsTo('App\tb_m_kategori_gallery', 'id_kategori_gallery');
	}
}
