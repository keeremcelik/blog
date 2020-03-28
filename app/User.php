<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;	 

class User extends Model implements Authenticatable
{
	use AuthenticableTrait;
    protected $table = 'tb_users';    
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];

	protected $guard = 'admin';

    public function post()
    {
        return $this->hasMany('App\Post');
    }


}
