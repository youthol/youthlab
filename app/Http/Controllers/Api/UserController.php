<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'phone' => $verifyData['phone'],
            'last_actived_at' => Carbon::now(),
            'password' => bcrypt($request->password),
        ]);
    }
}
