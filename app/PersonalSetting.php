<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonalSetting extends Model
{
      protected $table = 'tb_personal_settings';    
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
}
