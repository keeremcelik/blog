<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'tb_comments';    
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
}
