<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wx_users_info extends Model
{
    protected $table = 'wx_users_info';
    protected $guarded = ['wx_user_id'];
}
