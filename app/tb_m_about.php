<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_about extends Model
{
  protected $table = 'tb_m_abouts';
protected $fillable = array('about','foto','id_history_about');
public $timestamp = true;

public function tb_m_history_about() {
		return $this->belongsTo('App\tb_m_history_about', 'id_history_about');
	                       }
}
