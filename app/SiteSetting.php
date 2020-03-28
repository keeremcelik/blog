<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $table = 'tb_site_settings';    
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
}
