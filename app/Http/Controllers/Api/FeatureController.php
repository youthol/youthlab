<?php

namespace App\Http\Controllers\Api;

use App\Models\Exam_meta;
use App\Models\Exam_time;
use App\Models\Gkl;
use App\Models\Rongyu;
use Dotenv\Validator;
use GuzzleHttp\Client;
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
    //宿舍成绩
    public function hygiene()
    {
        $lroom = \request('lroom');
        $croom = intval(\request('croom'));
        $room = $lroom.$croom;
        $data = Hygiene::where('room','=',$room)->orderBy('week','asc')->get();
        if(count($data)>0){
            return $this->response->collection($data,new HygieneTransformer())->setStatusCode(200);
        }else{
            return $this->response->errorNotFound("参数错误，未获取到房间为{$room}宿舍卫生信息");
        }
    }
    //荣誉称号
    public function rongyu(){
//        $sdut_name = \request('sdut_name');
        $sdut_id = \request('sdut_id');
        $data = Rongyu::where('sdut_id',$sdut_id)->get();
        if(count($data)>0){
            return $this->response->array(['data'=>$data])->setStatusCode(200);
        }else{
            return $this->response->errorNotFound("对不起，未获取到学号为{$sdut_id}荣誉称号信息");
        }
    }
    //考试时间
    public function exam(){
//        dd(\request());
        $sdut_id = \request('sdut_id');
        $exam_times = Exam_time::where('sdut_id',$sdut_id)->get();
        $data = array();
        foreach ($exam_times as $exam_time){
            $exam_meta = Exam_meta::where('code',$exam_time->code)->where('classroom',$exam_time->classroom)->first();
            $gkl = Gkl::where('course',$exam_time->course)->first();
            $exam_time->meta = $exam_meta;
            $exam_time->gkl = $gkl->gkl;
            array_push($data,$exam_time->toArray());
        }
        if(count($exam_times)>0){
            return $this->response->array(['data'=>$exam_times])->setStatusCode(200);
        }else{
            return $this->response->errorNotFound("对不起，未获取到学号为{$sdut_id}考试时间信息");
        }
    }
    //
    public function elect(){
//        $http = new Client();
//        $url = ""
    }
}
