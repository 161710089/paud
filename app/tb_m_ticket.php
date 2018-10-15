<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use Session;

class tb_m_ticket extends Model
{
	protected $table = 'tb_m_tickets';
	protected $fillable = array('id_event','jumlah_tiket_tersedia','harga','tersedia_tanggal','sampai_tanggal','tiket_terpesan');
	public $timestamp = false;

	public function tb_m_event() {
		return $this->belongsTo('App\tb_m_event', 'id_event');
	}

	public function tb_m_buy_ticket() {
		return $this->hasMany('App\tb_m_buy_ticket');
	}
	
	public function getRouteKeyName()
	{
	return 'slug';
	}

public function getStockAttribute()
	{
		$buy = $this->tb_m_buy_ticket()->buy()->count();
		$stock = $this->jumlah_tiket_tersedia - $buy;
		return $stock;
	}

	public static function boot()
	{
		parent::boot();
		// self::updating(function($tb_m_tickets)
		// {
		// 	if ($tb_m_tickets->jumlah_tiket_tersedia < $tb_m_tickets->buy) {
		// 		Session::flash("flash_notification", [
		// 		"level"=>"danger",
		// 		"message"=>"Jumlah $tb_m_tickets->id_event harus >= " . $tb_m_tickets->buy
		// 		]);
		// 		return false;
		// 	}
		// });
		self::deleting(function($tb_m_tickets)
		{
			if ($tb_m_tickets->tb_m_buy_ticket()->count() > 0) {
				Session::flash("flash_notification", [
				"level"=>"danger",
				"message"=>"Buku $tb_m_tickets->id_event sudah pernah dipinjam."
				]);
				return false;
			}
		});
	}
	public function getbuyAttribute()
	{
	return $this->tb_m_buy_ticket()->buy();
	}

}
 			