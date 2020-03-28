<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  	protected $table = 'tb_projects';	
    protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = ['id'];
}
