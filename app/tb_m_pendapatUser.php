<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_pendapatUser extends Model
{
    protected $table = 'tb_m_pendapat_users';
protected $fillable = array('pendapat','id_user');
public $timestamp = true;


    public function user()
	{
		return $this->belongsTo('App\User','id_user');
	}
}
