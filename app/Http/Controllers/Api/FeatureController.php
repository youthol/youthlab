<?php

namespace App\Http\Controllers\Api;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\Wx_user;
use Auth;
use App\Models\Hygiene;
use App\Transformers\HygieneTransformer;
use Carbon\Carbon;

class FeatureController extends Controller
{
    function __construct()
    {
        $this->middleware('api.auth');
    }
    public function hygiene()
    {
        $lroom = \request('lroom');
        $croom = intval(\request('croom'));
        $room = $lroom.$croom;
        $data = Hygiene::where('room','=',$room)->orderBy('week','asc')->get();
        if(count($data)>0){
            return $this->response->item($data[0],new HygieneTransformer())->setStatusCode(201);
        }else{
            return $this->response->errorUnauthorized('参数错误，未获取到宿舍信息');
        }
    }
}
