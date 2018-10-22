<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Session;
use App\Exceptions\tb_m_ticketException;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function tb_m_artikel()
{
  // Setiap user akan memiliki banyak tb_m_artikel
  return $this->hasMany('App\tb_m_artikel','id_user');
}

public function tb_m_siswa()
{
  // Setiap user akan memiliki banyak absensi_siswa
  return $this->hasOne('App\tb_m_siswa','id_user');
}

public function buy(tb_m_ticket $tb_m_ticket)
{
    if ($tb_m_ticket->jumlah_tiket_tersedia < 1) {
        throw new tb_m_ticketException("Buku $tb_m_ticket->id_event sedang tidak tersedia.");
        }
        // cek apakah buku ini sedang dipinjam oleh user
        if($this->tb_m_buy_ticket()
                ->where('id_ticket',$tb_m_ticket->id)->where('is_returned', 0)->count() > 0) {
            throw new tb_m_ticketException("Buku $tb_m_ticket->id_event sedang Anda pinjam.");
        }
        
        $tb_m_buy_ticket = tb_m_buy_ticket::create(['user_id'=>$this->id, 'id_ticket'=>$tb_m_ticket->id]);
        return $tb_m_buy_ticket;
}
public function tb_m_buy_ticket()
    {
        return $this->hasMany('App\tb_m_buy_ticket');
    }
public function tb_m_pendapatUser()
    {
        return $this->hasMany('App\tb_m_pendapat');
    }

}
