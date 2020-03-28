<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
       protected $table = 'tb_mails';	
    protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = ['id'];

}
