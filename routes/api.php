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

    //全局数据：
    //宿舍楼号
    $api->get('dormitory','GlobalController@dormitory');
    //各个学院
    $api->get('academy','GlobalController@academy');


    // 用户注册
    $api->post('authorization', 'AuthorizationsController@getWxUserInfo')
        ->name('api.users.getwxuserinfo');
    // 刷新token
    $api->put('authorizations/current', 'AuthorizationsController@update')
        ->name('api.authorizations.update');
    // 删除token
    $api->delete('authorizations/current', 'AuthorizationsController@destroy')
        ->name('api.authorizations.destroy');

    //获取个人信息
    $api->get('user','Wx_userController@index');
    //更新个人信息
    $api->put('user','Wx_userController@update');

    //宿舍成绩
    $api->get('hygiene','FeatureController@hygiene');
    //荣誉称号
    $api->get('rongyu','FeatureController@rongyu');
    //考试时间
    $api->get('exam','FeatureController@exam');
    //综测成绩
    $api->get('zongce','FeatureController@zongce');




    //api接口

    //电费查询
    $api->get('elect','FeatureController@elec');
});
