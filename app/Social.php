<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected $table = 'tb_social';    
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
}
