<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_s_sosmed extends Model
{
    protected $table = 'tb_s_sosmeds';
protected $fillable = array('Facebook','Instagram','Twitter','Email');
public $timestamp = false;

public function tb_s_sekolah() {
		return $this->hasOne('App\tb_s_sekolah', 'id_sekolah');
	}
}
