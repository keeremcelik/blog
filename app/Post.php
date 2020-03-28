<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'tb_posts';	
    protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = ['id'];

	public function category()
    {
        return $this->belongsTo('App\Category','cat_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}

