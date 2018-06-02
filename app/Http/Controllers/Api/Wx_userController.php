<?php

namespace App\Http\Controllers\Api;

use App\Models\Wx_user;
use App\Models\Wx_users_info;
use Validator;
//use Dotenv\Validator;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Http\Response;

class Wx_userController extends Controller
{
    function __construct()
    {
        $this->middleware('auth:api');
    }

    public function update(Request $request){
        //数据验证
        $validators = Validator::make($request->all(),[
            'sdut_name'=> [
                'nullable',
                'max:20',
            ],
            'sdut_id'=>[
                'required',
                'digits:11'
            ],
            'academy'=>[
                'nullable',
                'exists:academy,id'
            ],
            'major'=>[
                'nullable',
                'max:50'
            ],
            'class_name'=>[
                'nullable',
                'max:20'
            ],
            'dormitory'=>[
                'nullable',
                'exists:dormitory,id'
            ],
            'room'=>[
                'nullable',
                'max:5'
            ],
            'phone'=>[
                'nullable',
                'regex:/^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$/',
            ]
        ]);
        if($validators->fails()){
            throw new \Dingo\Api\Exception\StoreResourceFailedException('Could not update user.', $validators->errors());
            //return Response::make(['error' => 'Hey, 你这是要干嘛!?'], 401);
        }
        $id = Auth::id();
        $userinfo = Wx_users_info::where('wx_user_id',$id)->update($request->all());
        if($userinfo){
            return $this->response->array(['msg'=>'修改成功'])->setStatusCode(200);
        }
        //错误处理
       /* if($validators->fails()){
            return Response::make([])
        }*/

    }
    public function index(){
        $user = Auth::guard('api')->user();
        $user->info;
        //$info = Wx_users_info::where('wx_user_id',$user->id)->get()[0];
        //$info->academy = $info->get_academy->name;
        //$info->dormitory = $info->get_dormitory->name;
        //$data = array_merge($user->toArray(),$info->toArray());
        return $this->response->array(['data'=>$user]);
    }
}
