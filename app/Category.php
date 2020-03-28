<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'tb_categories';	
    protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = ['id'];

	public function post()
    {
        return $this->hasMany('App\Post');
    }
}
