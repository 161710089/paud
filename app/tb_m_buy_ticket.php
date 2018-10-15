<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_m_buy_ticket extends Model
{
    //
    protected $fillable = ['id_ticket', 'user_id', 'is_returned'];
    protected $casts = ['is_returned' => 'boolean',];

    public function tb_m_ticket()
	{
		return $this->belongsTo('App\tb_m_ticket','id_ticket');
	}

	public function user()
	{
		return $this->belongsTo('App\User');
	}

	public function scopeReturned($query)
	{
		return $query->where('is_returned', 1);
	}
	
	public function scopeBuy($query)
	{
		return $query->where('is_returned', 0);
	}
}
