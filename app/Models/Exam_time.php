<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam_time extends Model
{
    //
    public function exam_meta(){
        return 1;
        //return Exam_meta::where('code',$this->code)->where('classroom',$this->classroom);
    }
    public function meta(){
        return $this->belongsTo('App\Models\Exam_meta','code','code');
    }
}
