<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wx_users_info extends Model
{
    protected $table = 'wx_users_info';
    protected $guarded = ['wx_user_id'];
    public  function get_academy(){
        return $this->belongsTo('App\Models\Academy','academy','id');
    }
    public function get_dormitory(){
        return $this->belongsTo('App\Models\Dormitory','dormitory','id');
    }
}
