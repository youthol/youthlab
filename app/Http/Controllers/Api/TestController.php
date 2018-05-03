<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Wx_user;
use Auth;
use App\Models\User;
//use Illuminate\Http\Request;
use Iwanli\Wxxcx\Wxxcx;
use App\Models\Dormitory;
use Carbon\Carbon;

class TestController extends Controller
{
    //
    public function index()
    {
        $lroom = \request('lroom');
        $croom = intval(\request('croom'));
        $room = $lroom.$croom;
        $data = Dormitory::where('room','=',$room)->get();
        if(count($data)>0){
            return $this->response->$data->setStatus(201);
        }else{
            return $this->response->errorUnauthorized('参数错误，未获取到宿舍信息');
        }
//        return response()->json([
//            'msg' => '9999999999999999'
//        ]);
    }
}
