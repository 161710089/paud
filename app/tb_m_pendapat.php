<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_pendapat extends Model
{
    protected $table = 'tb_m_pendapats';
protected $fillable = array('nama','pendapat','foto','id_sosmed');
public $timestamp = true;

public function tb_s_sosmed() {
		return $this->belongsTo('App\tb_s_sosmed', 'id_sosmed');
	}
	
}
