<?php

namespace App\Http\Controllers\Api;

use App\Models\Academy;
use Illuminate\Http\Request;
use App\Models\Dormitory;
class GlobalController extends Controller
{
    public function dormitory(){
        $dormitory = Dormitory::all();
        return $this->response->array(['data'=>$dormitory->toArray()])->setStatusCode(200);
    }
    public function academy(){
        $academy = Academy::all();
        return $this->response->array(['data'=>$academy->toArray()])->setStatusCode(200);
    }
}
