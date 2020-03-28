<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
  	protected $table = 'tb_users';    
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];

	protected $guard = 'admin';
	
    
}
