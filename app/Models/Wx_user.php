<?php

namespace App\Models;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Zizaco\Entrust\Traits\EntrustUserTrait;
class Wx_user extends Authenticatable implements JWTSubject
{
    protected $table = "wx_users";

    protected $fillable = [
        'openid','nickname','avatar','province','city','gender',
    ];
    public function info(){
        return $this->hasOne('App\Models\Wx_users_info','wx_user_id','id');
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
