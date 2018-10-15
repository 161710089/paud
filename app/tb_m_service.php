<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_service extends Model
{
    protected $table = 'tb_m_services';
	protected $fillable = array('foto','judul','deskripsi');
	public $timestamp = true;

}
