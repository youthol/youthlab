<?php

namespace App\Http\Controllers\Api;
use App\Models\Wx_user;
use App\Models\Wx_users_info;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Iwanli\Wxxcx\Wxxcx;
use App\Models\Dormitory;
use Carbon\Carbon;

class AuthorizationsController extends Controller
{
    protected $wxxcx;

    function __construct(Wxxcx $wxxcx)
    {
        $this->wxxcx = $wxxcx;
    }

    /**
     * 小程序登录获取用户信息
     * @author 晚黎
     * @date   2017-05-27T14:37:08+0800
     * @return [type]                   [description]
     */
    public function getWxUserInfo()
    {
        //code 在小程序端使用 wx.login 获取
        $code = \request('code');
        //encryptedData 和 iv 在小程序端使用 wx.getUserInfo 获取
        $encryptedData = \request('encryptedData');
        $iv = \request('iv');
        //根据 code 获取用户 session_key 等信息, 返回用户openid 和 session_key
        $userInfo = $this->wxxcx->getLoginInfo($code);
        $userinfo = json_decode($this->wxxcx->getUserInfo($encryptedData, $iv));
        //根据oepnid获取用户
        $user = Wx_user::where('openid',$userinfo->openId)->first();
        if(!$user){
            //未获取到用户创建用户
            $user = Wx_user::create([
               'openid'=>$userinfo->openId,
                'nickname'=>$userinfo->nickName,
                'avatar'=>$userinfo->avatarUrl,
                'province'=>$userinfo->province,
                'city'=>$userinfo->city,
                'gender'=>$userinfo->gender,
            ]);
            $userinfo  = new Wx_users_info();
            $userinfo->wx_user_id = $user->id;
            $userinfo->save();

        }else{
            $user->avatar = $userinfo->avatarUrl;
            $user->save();
        }
        $token = Auth::guard('api')->fromUser($user);
        return $this->respondWithToken($token)->setStatusCode(201);
        //$user = json_decode($user);
    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }
    public function update()
    {
        $token = Auth::guard('api')->refresh();
        return $this->respondWithToken($token);
    }

    public function destroy()
    {
        Auth::guard('api')->logout();
        return $this->response->noContent();
    }
    public function dormitory(){
        $lroom = \request('lroom');
        $croom = intval(\request('croom'));
        $room = $lroom.$croom;
        $data = Dormitory::where('room','=',$room)->get();
        if(count($data)>0){
            return $this->response->$data->setStatus(201);
        }else{
            return $this->response->errorUnauthorized('参数错误，未获取到宿舍信息');
        }
    }
}
