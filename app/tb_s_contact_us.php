<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tb_s_contact_us extends Model
{
public $table = 'tb_s_contact_uses';
 
public $fillable = ['name','email','message'];
}
