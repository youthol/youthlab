<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
//    'middleware' => 'serializer:array'
], function($api) {
// 用户注册
    $api->post('authorization', 'AuthorizationsController@getWxUserInfo')
        ->name('api.users.getwxuserinfo');
    // 刷新token
    $api->put('authorizations/current', 'AuthorizationsController@update')
        ->name('api.authorizations.update');
    // 删除token
    $api->delete('authorizations/current', 'AuthorizationsController@destroy')
        ->name('api.authorizations.destroy');

    //宿舍成绩
    $api->post('hygiene','FeatureController@hygiene');
    //获取个人信息
    $api->get('user','Wx_UserController@index');
    //更新个人信息
    $api->put('user','Wx_UserController@update');
});
