<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    protected $table = 'tb_abilities';	
    protected $fillable = ['name','rate','status'];
    protected $primaryKey = 'id';
	public $timestamps = false;
	protected $guarded = ['id'];
}
